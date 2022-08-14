<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\BuyChapter;

class Manga extends Model {
    protected $table = 'mangas';
    protected $primaryKey = 'manga_id';

    public function chapters(){
        return $this->hasMany(Chapter::class, 'manga_id')->OrderBy('created_at','desc')->limit(3);
    }
    public function getFirstChapters(){
        return $this->hasMany(Chapter::class, 'manga_id')->OrderBy('chapter_slugs','asc')->take(1);
    }
    public function getLastChapters(){
        return $this->hasMany(Chapter::class, 'manga_id')->OrderBy('chapter_slugs','desc')->take(1);
    }
    public function chaptersv1(){
        return $this->hasMany(Chapter::class, 'manga_id')->orderByRaw('CONVERT(chapter_slugs,unsigned) asc');
    }
    public function buy()
    {
        return $this->hasOne(BuyChapter::class,'chapter_id');
    }
}