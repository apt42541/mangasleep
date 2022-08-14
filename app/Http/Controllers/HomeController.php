<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BuyChapter;
use App\Models\Chapter;
use App\Models\Manga;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Manga::orderBy('updated_at', 'desc')->get();
        $data2 = Manga::where('manga_hot', 1)->orderBy('updated_at', 'desc')->get();
        return view('home', [
            'data' => $data,
            'data2' => $data2
        ]);
    }
    public function singleManga($name = null)
    {
        $m = Manga::where('manga_slugs', $name)->first();
        return view('singleManga', [
            'data' => $m
        ]);
    }
    public function readManga($name = null, $slugs = null)
    {
        $m = Manga::where('manga_slugs', $name)->first();
        $c = Chapter::where('manga_id', $m->manga_id)->where('chapter_slugs', $slugs)->first();

        $prev_data =    Chapter::where([
            ['manga_id', $m->manga_id],
            ['chapter_slugs', '<', (int)$slugs]

        ])->orderByRaw('CONVERT(chapter_slugs,unsigned) desc')->first();

        $next_data =  Chapter::where([
            ['manga_id', $m->manga_id],
            ['chapter_slugs', '>', (int)$slugs]
        ])->orderByRaw('CONVERT(chapter_slugs,unsigned) asc')->first();

        $prev = $prev_data == "" ? '/' : $prev_data;

        $next = $next_data  == "" ? '/' : $next_data;

        if (!Auth::check()) {
            $buychap = null;
            return view('readManga', [
                'm' => $m,
                'c' => $c,
                'prev' => $prev,
                'next' => $next,
                'buyed' => $buychap
            ]);
        }
        $buychap = BuyChapter::where([
            'chapter_id' => $c->chapter_id,
            'manga_id' => $c->manga_id,
            'user_id' => Auth::user()->user_id
        ])->first();



        return view('readManga', [
            'm' => $m,
            'c' => $c,
            'prev' => $prev,
            'next' => $next,
            'buyed' => $buychap
        ]);
    }
}
