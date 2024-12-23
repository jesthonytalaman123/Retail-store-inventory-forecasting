<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Seasonality;
use App\Models\Weather;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        // Get the filter values
        $selectedYear = $request->input('year');
        $selectedSeason = $request->input('seasonality');
        $selectedWeather = $request->input('weather');

        // Get the distinct values for dropdown
        $years = Sales::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        $seasons = Seasonality::select('seasonality')
            ->distinct()
            ->orderBy('seasonality')
            ->pluck('seasonality');
        
        $weatherConditions = Weather::select('Weather Condition')
            ->distinct() 
            ->orderBy('Weather Condition')
            ->pluck('Weather Condition');

        // Fetch the data based on the selected filters
        $unitSoldData = [];
        $unitOrderedData = [];
        
        if ($selectedYear && $selectedSeason && $selectedWeather) {
            // Query for unit sold data, unit ordered data, and inventory level
            $salesData = Sales::selectRaw('SUM(unit_sold) as unit_sold, SUM(unit_ordered) as unit_ordered')
                ->whereYear('date', $selectedYear)
                ->whereHas('seasonality', function ($query) use ($selectedSeason) {
                    $query->where('seasonality', $selectedSeason);
                })
                ->whereHas('weather', function ($query) use ($selectedWeather) {
                    $query->where('weather_condition', $selectedWeather);
                })
                ->groupBy('seasonality', 'weather_condition') // Group by seasonality and weather for different chart sections
                ->get();

            foreach ($salesData as $data) {
                $unitSoldData[] = $data->unit_sold;
                $unitOrderedData[] = $data->unit_ordered;
            }
        }

        // Return the data to the view
        return view('dashboard', compact('unitSoldData', 'unitOrderedData', 'years', 'seasons', 'weatherConditions'));
    }
}
