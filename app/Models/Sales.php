<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'date', 'store_id', 'product_id', 'inventory_level',
        'units_sold', 'units_ordered', 'demand_forecast', 'price',
        'discount', 'holiday_promotion', 'competitor_pricing',
        'weather_id', 'seasonality_id', 'region'
    ];

    public function weather()
    {
        return $this->belongsTo(Weather::class, 'weather_id');
    }

    public function seasonality()
    {
        return $this->belongsTo(Seasonality::class, 'seasonality_id');
    }
}
