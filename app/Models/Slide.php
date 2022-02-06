<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'book_detail',
        'book_author',
        'book_publishedDate',
        'output',
        'image_path',
        'slides_path',
    ];

    /**
     * Slidesと紐づくUserレコードを取得
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
