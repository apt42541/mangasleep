<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BuyChapter;
use App\Models\Chapter;
use App\Models\Manga;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class ReportMonthlyPayController extends Controller
{
    public function index()
    {
        return view('sumPayment');
    }
    public function buy()
    {
        $manga = Manga::all();
        return view('sumBuy', ['manga' => $manga]);
    }

    public function buyStore(Request $request)
    {
        $manga = Manga::all();
        $buy = count(BuyChapter::where('manga_id', $request->manga_id)
            ->whereBetween('created_at', [$request->start, $request->end])->get());

        $m = DB::table('mangas')
            ->join('buychapter_record', 'buychapter_record.manga_id', '=', 'mangas.manga_id')
            ->select('buychapter_record.created_at', 'mangas.manga_name')
            ->get();
        return view('sumBuy', ['buy' => $m, 'manga' => $manga]);
    }
    public function store(Request $request)
    {
        $pay = Payment::where('payment_status', '3')->whereBetween('created_at', [$request->start, $request->end])->sum('payment_price');
        return view('sumPayment', ['pay' => $pay]);
    }
}
