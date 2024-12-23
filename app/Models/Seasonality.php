<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasonality extends Model
{
    use HasFactory;

    protected $table = 'seasonality';

    protected $fillable = ['seasonality'];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'seasonality_id');
    }
}
