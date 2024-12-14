<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voltage extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'time', 'voltage'
    ];
}
