<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\BuyChapter;
use App\Models\Chapter;
use App\Models\Manga;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class PaymentController extends Controller
{
    public function historyPay()
    {
        $checkPay           = Payment::where([
            'user_id' => auth::user()->user_id,
        ])->OrderBy('updated_at', 'desc')->get();

        return view(
            'history-pay',
            [
                'pay' => $checkPay
            ]
        );
    }

    public function create()
    {
        return view('payment');
    }

    public function pay(Request $request)
    {

        $rules = [
            'amount' => 'required',
            'payment_type' => 'required',
            'date_pay' => 'required',
            'payWho' => 'required',
        ];
        $request->validate($rules);

        $file                   = $request->file('payment_slips');
        $fileName               = $file->getClientOriginalName();
        $newPath3              = public_path() . '/slips/';
        File::isDirectory($newPath3)  or File::makeDirectory($newPath3, 0777, true, true);
        $uni = uniqid() . $fileName;
        $file->move($newPath3,   $uni);

        $pay = new Payment();
        $pay->payment_price     = $request->amount;
        $pay->payment_type      = $request->payment_type;
        $pay->payment_date      = $request->date_pay;
        $pay->user_id           = auth()->user()->user_id;
        $pay->payBy             = $request->payWho;
        $pay->payment_slips     = '/slips/' . $uni;
        $pay->save();

        return back()->with(['status' => 'ระบบได้รับการเติมเงินเรียบร้อย </br> ตรวจสอบภายใน 24 Hr!']);
    }
}
