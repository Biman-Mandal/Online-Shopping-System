<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $fillable=['ProductName','BrandName','Price','Image1','Image2','Image3','Image4','Image5','Description','Token'];
    use HasFactory;
}
