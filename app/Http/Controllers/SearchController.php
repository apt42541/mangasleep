<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Manga;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $manga = Manga::where('manga_name', 'LIKE', '%' . $request->search_value . '%')->first();
        $data2 = Manga::where('manga_hot', 1)->orderBy('updated_at', 'desc')->get();
        return view('search', ['search' => $manga,'data2'=>$data2]);
    }
}
