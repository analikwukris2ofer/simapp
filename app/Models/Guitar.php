<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'year_made'];
    //This gives the green light for eloquent to mass assign this fields to the database.
}
