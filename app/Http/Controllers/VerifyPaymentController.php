<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class VerifyPaymentController extends Controller
{
    public function index()
    {
        return view('verifyPayment',[
            'payrec'=> Payment::where([
                'payment_status' => '1'
            ])->OrderBy('payment_status','desc')->get()
        ]);
    }
    public function store($id = null,$stat = null)
    {
        $pay = Payment::where([
            ['payment_id','=' ,$id]
        ])->first();
        $pay->payment_status = $stat;
        $pay->update();

        if($stat == '3')
        {
            $user = User::findORFail($pay->user_id);
            $user->point = $user->point + $pay->payment_price;
            $user->update();
        }
        return back();
    }
}
