<?php
namespace App\Http\Controllers;

use App\Models\RetailStoreInventory;
use Illuminate\Http\Request;

class RetailStoreInventoryController extends Controller
{
    public function index(Request $request)
    {
        // Fetch distinct years from the 'Date' field (extracting year)
        $years = RetailStoreInventory::selectRaw('YEAR(Date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Fetch distinct seasons
        $seasons = RetailStoreInventory::distinct()
            ->pluck('Seasonality');

        // Fetch distinct regions
        $regions = RetailStoreInventory::distinct()
            ->pluck('Region');

        // Set the selected year and season (default to the latest year if no year is provided)
        $selectedYear = $request->input('year', $years->first());
        $selectedSeason = $request->input('seasonality', $seasons->first());
        $selectedRegion = $request->input('region', $regions->first());

        // Initialize variables for units sold, units ordered, and inventory level
        $monthlyUnitsSold = [];
        $totalUnitsSold = 0;
        $totalUnitsOrdered = 0;
        $totalInventoryLevel = 0;
        $categoryCounts = [];

        // Fetch monthly units sold for the selected year
        if ($selectedYear) {
            $monthlyUnitsSold = RetailStoreInventory::selectRaw('MONTH(Date) as month, SUM(`Units Sold`) as total_units_sold')
                ->whereYear('Date', $selectedYear)
                ->groupByRaw('MONTH(Date)')
                ->orderBy('month')
                ->get();
        }

        // Fetch the total units sold, ordered, and inventory level for the selected season and year
        if ($selectedYear && $selectedSeason) {
            $data = RetailStoreInventory::selectRaw('SUM(`Units Sold`) as total_units_sold, SUM(`Units Ordered`) as total_units_ordered, SUM(`Inventory Level`) as total_inventory_level')
                ->whereYear('Date', $selectedYear)
                ->where('Seasonality', $selectedSeason)
                ->first();

            // Set the values for the totals
            $totalUnitsSold = $data->total_units_sold;
            $totalUnitsOrdered = $data->total_units_ordered;
            $totalInventoryLevel = $data->total_inventory_level;
        }

        // Fetch total category counts in the selected region for the selected year and season
        if ($selectedRegion) {
            $categories = RetailStoreInventory::selectRaw('Category, COUNT(*) as category_count')
                ->whereYear('Date', $selectedYear)
                ->where('Region', $selectedRegion)
                ->where('Seasonality', $selectedSeason)
                ->groupBy('Category')
                ->get();

            // Prepare the category data
            foreach ($categories as $category) {
                $categoryCounts[$category->Category] = $category->category_count;
            }
        }

        // Pass the data to the view
        return view('dashboard', compact(
            'years', 
            'seasons', 
            'regions', 
            'monthlyUnitsSold', 
            'totalUnitsSold', 
            'totalUnitsOrdered', 
            'totalInventoryLevel', 
            'categoryCounts', 
            'selectedYear', 
            'selectedSeason',
            'selectedRegion'
        ));
    }
}
