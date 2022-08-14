<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

use App\Models\Payment;

class Payment_Status extends Model {

    protected $table = 'payment_status';

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}