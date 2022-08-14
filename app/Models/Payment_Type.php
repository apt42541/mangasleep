<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

use App\Models\Manga;
use App\Models\Payment;

class Payment_Type extends Model {

    protected $table = 'payment_type';

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}