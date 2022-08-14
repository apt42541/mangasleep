<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BuyChapter;
use App\Models\Chapter;
use App\Models\Manga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{

    public function buy($id = null)
    {
        $user               = User::findorFail(auth::user()->user_id);

        $c                  = Chapter::findorFail($id);

        $checkBuy           = BuyChapter::where([
            'user_id' => auth::user()->user_id,
            'chapter_id' => $c->chapter_id,
        ])->first();
        
        if($c->isFree == "0")   return back()->with(['msg' => 'ตอนนี้ไม่ได้ขาย ทางระบบปล่อยให้อ่านฟรีแล้วครับ']);

        $buy                = new BuyChapter();
        $buy->buy_price     = $c->chapter_price;
        $buy->user_id       = auth::user()->user_id;
        $buy->chapter_id    = $c->chapter_id;
        $buy->manga_id      = $c->manga_id;

        if ($user->point < $buy->buy_price) {

            return back()->with(['msg' => 'แต้มไม่เพียงพอกรุณาเติมเงิน']);
        }

        if ($checkBuy == null) {

            $user->point    = $user->point - $buy->buy_price;
            $user->update();
            $buy->save();

            return back()->with(['msg' => 'ซื้อตอนสำเร็จขอให้อ่านให้สนุกครับผม']);
        } else {

            return back()->with(['msg' => 'ตอนนี้คุณได้ทำการซื้อไปแล้ว']);
        }
    }

    public function historyBuy()
    {
        $checkBuy           = BuyChapter::where([
            'user_id' => auth::user()->user_id,
        ])->get();

        return view('history-buy',
        [
            'buy' => $checkBuy
        ]);
    }
}
