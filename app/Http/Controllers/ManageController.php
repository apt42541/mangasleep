<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Manga;
use App\Models\BuyChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManageController extends Controller
{
    public function index()
    {
        $manga = Manga::OrderBy('created_at', 'desc')->get();
        return view("manage.manga.index", [
            'mangas' => $manga
        ]);
    }
    public function add()
    {
        return view("manage.manga.add");
    }

    public function edit($id = null)
    {
        $manga = Manga::findOrFail($id);
        return view('manage.manga.edit', [
            'manga' => $manga
        ]);
    }

    public function update($id = null, Request $request)
    {


        $rules = [
            'manga_name' => 'required|max:255',
            'manga_description' => 'required',
            'manga_slugs' => 'required',
            'manga_hot' => 'required',
        ];
        $request->validate($rules);

        $file                   = $request->file('manga_cover');
        $fileName               = $file->getClientOriginalName();
        $newPath                = public_path() . '/cover/' . $request->manga_slugs;
        $newPath2               = public_path() . '/images/' . $request->manga_slugs;
        $with                   =  '/cover/' . $request->manga_slugs . '/';
        File::isDirectory($newPath)  or File::makeDirectory($newPath, 0777, true, true);
        File::isDirectory($newPath2) or File::makeDirectory($newPath2, 0777, true, true);
        $destinationPath        = $newPath;
        $file->move($destinationPath, $fileName);

        $manga = Manga::findOrFail($id);
        $manga->manga_cover         = $with . $fileName;
        $manga->manga_name          = $request->manga_name;
        $manga->manga_description   = $request->manga_description;
        $manga->manga_slugs         = $request->manga_slugs;
        $manga->manga_hot           = $request->manga_hot;
        $manga->manga_rating           = $request->manga_rating;
        $manga->update();


        return redirect('/systemPanel/')->with('status', 'ดำเนินการสำเร็จ');;
    }
    public function store(Request $request)
    {


        $rules = [
            'manga_name' => 'required|unique:mangas|max:255',
            'manga_description' => 'required',
            'manga_slugs' => 'required',
            'manga_hot' => 'required',
        ];
        $request->validate($rules);

        $file                   = $request->file('manga_cover');
        $fileName               = $file->getClientOriginalName();
        $newPath                = public_path() . '/cover/' . $request->manga_slugs;
        $newPath2               = public_path() . '/images/' . $request->manga_slugs;
        $with                   =  '/cover/' . $request->manga_slugs . '/';
        File::isDirectory($newPath)  or File::makeDirectory($newPath, 0777, true, true);
        File::isDirectory($newPath2) or File::makeDirectory($newPath2, 0777, true, true);
        $destinationPath        = $newPath;
        $file->move($destinationPath, $fileName);

        $manga = new Manga();
        $manga->manga_cover         = $with . $fileName;
        $manga->manga_name          = $request->manga_name;
        $manga->manga_description   = $request->manga_description;
        $manga->manga_slugs         = $request->manga_slugs;
        $manga->manga_hot           = $request->manga_hot;
        $manga->manga_rating           = $request->manga_rating;
        $manga->save();

        return redirect('/systemPanel/')->with('status', 'ดำเนินการสำเร็จ');;
    }
    public function singleManga($id = null)
    {
        $manga = Manga::findOrFail($id);
        return view('manage.manga.view', [
            'manga' => $manga
        ]);
    }
    public function addChapter($id = null)
    {
        $manga = Manga::findOrFail($id);
        return view("manage.chapter.add", [
            'manga' => $manga
        ]);
    }
    public function editChapter($id = null)
    {
        $c = Chapter::findOrFail($id);
        return view("manage.chapter.edit", [
            'chapter' => $c
        ]);
    }
    public function storeChapter(Request $request, $id = null)
    {
        $rules = [
            'chapter_slugs' => 'required',
            'chapter_post' => 'required',
            'isFree' => 'required',
        ];
        $request->validate($rules);

        $chapter = new Chapter();
        $chapter->manga_id                 = $request->manga_id;
        $chapter->chapter_slugs            = $request->chapter_slugs;
        $chapter->chapter_post             = $request->chapter_post;
        $chapter->isFree                   = $request->isFree;
        $chapter->chapter_price            = $request->chapter_price;

        $chapter->save();
        $chapter->touch();

        return back()->with('status', 'ดำเนินการสำเร็จ');
    }
    public function updateChapter(Request $request, $id = null)
    {
        $rules = [
            'chapter_post' => 'required',
            'isFree' => 'required',
        ];
        $request->validate($rules);

        $chapter =  Chapter::findOrFail($id);
        $chapter->manga_id                 = $request->manga_id;
        $chapter->chapter_slugs            = $request->chapter_slugs;
        $chapter->chapter_post             = $request->chapter_post;
        $chapter->isFree                   = $request->isFree;
        $chapter->chapter_price            = $request->chapter_price;
        $chapter->update();
        $chapter->touch();

        $path = '/systemPanel/manga/' . $request->manga_id . '/view';
        return redirect($path)->with('status', 'ดำเนินการสำเร็จ');
    }
    public function isFree($id = null)
    {
        $chapter            = Chapter::findorFail($id);
        $chapter->isFree    = 0;
        $chapter->update();

        return back()->with('status', 'ดำเนินการสำเร็จ');
    }

    public function isSell($id = null)
    {
        $chapter            = Chapter::findorFail($id);
        $chapter->isFree    = 1;
        $chapter->update();

        return back()->with('status', 'ดำเนินการสำเร็จ');
    }
    public function isDelete($manga = null, $id = null)
    {
        $buychap = BuyChapter::where([
            'chapter_id' => $id,
            'manga_id' => $manga,
        ])->first();
        if (empty($buychap)) {
            $chap = Chapter::where([
                'chapter_id' => $id,
                'manga_id' => $manga,
            ])->delete();
            return back()->with('status', 'ดำเนินการสำเร็จ');
        }
        return back()->with('status', 'ล้มเหลวมีการซื้อตอนไปแล้ว ลบไม่ได้');
    }
}
