<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Manga;

class BuyChapter extends Model
{
    protected $table = 'buychapter_record';
    protected $primaryKey = 'buyid';

    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

    public function manga()
    {
        return $this->belongsTo(Manga::class,'manga_id');
    }
}
