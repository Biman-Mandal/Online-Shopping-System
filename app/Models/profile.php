<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
	protected $fillable=['CustomerName','CustomerPhone','CustomerPhoneToken','PhoneActive',
	'CustomerEmail','CustomerEmailToken','CustomerEmailActive',	'CustomerPass'];
    use HasFactory;
}
