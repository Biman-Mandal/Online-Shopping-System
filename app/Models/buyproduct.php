<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyproduct extends Model
{
    protected $fillable=['ProfileID','ProductID1','ProductID2','ProductID3','ProductID4','ProductID5','PaymentType','TotalAmount','BuyProductToken','PaymentDocument','FinalPayment'];
    use HasFactory;
}

