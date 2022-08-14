<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment_Type;
use App\Models\Payment_Status;
use App\Models\BuyChapter;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    protected $table = 'payment_record';

    protected $primaryKey = 'payment_id';
    public function type()
    {
        return $this->hasOne(Payment_Type::class, 'paymenttype_id','payment_type');
    }

    public function status()
    {
        return $this->hasOne(Payment_Status::class, 'paymentstatus_id','payment_status');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'user_id','user_id');
    }
}
