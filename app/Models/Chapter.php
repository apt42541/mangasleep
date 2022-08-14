<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use App\Models\Manga;
use App\Models\BuyChapter;

class Chapter extends Model {
    protected $table = 'chapters';
    protected $primaryKey = 'chapter_id';
    protected $foreignKey = 'manga_id';
    
    protected $touches = ['manga'];
   
    public function manga()
    {
        return $this->belongsTo(Manga::class,'manga_id');
    }
    public function buy()
    {
        return $this->hasOne(BuyChapter::class,'manga_id');
    }
}