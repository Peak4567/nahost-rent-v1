<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $fillable = [
        'truemoney_status', 'truemoney_phone',
        'bank_status', 'bank_name', 'bank_account_number', 'bank_account_name', 'bank_qr_code'
    ];
}