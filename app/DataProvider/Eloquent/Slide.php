<?php

namespace App\DataProvider\Eloquent;

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
     * @var mixed|string
     */
    private mixed $book_title;
    /**
     * @var int|mixed
     */
    private mixed $user_id;
    private mixed $id;

    /**
     * Slidesと紐づくUserレコードを取得
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
