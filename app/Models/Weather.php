<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $table = 'weather';

    protected $fillable = ['Weather Condition'];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'Weather ID');
    }
}
