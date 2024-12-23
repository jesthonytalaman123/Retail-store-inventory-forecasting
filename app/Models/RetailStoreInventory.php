<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailStoreInventory extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'retail_store_inventory';

    // Define the primary key
    protected $primaryKey = 'retail_id';

    // If the primary key is not an auto-incrementing integer, set this
    public $incrementing = true;

    // Set the data types for columns that aren't in the default format
    protected $casts = [
        'Demand Forecast' => 'decimal:2',
        'Price' => 'decimal:2',
        'Competitor Pricing' => 'decimal:2',
    ];

    // Define the fillable columns
    protected $fillable = [
        'Date',
        'Store ID',
        'Product ID',
        'Category',
        'Region',
        'Inventory Level',
        'Units Sold',
        'Units Ordered',
        'Demand Forecast',
        'Price',
        'Discount',
        'Weather Condition',
        'Holiday/Promotion',
        'Competitor Pricing',
        'Seasonality',
    ];
}

