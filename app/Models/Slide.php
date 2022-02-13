<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slide
 *
 * @property int $id
 * @property int $user_id
 * @property string $book_title
 * @property string|null $book_detail
 * @property string|null $book_author
 * @property string|null $book_publishedDate
 * @property string|null $output
 * @property string|null $image_path
 * @property string|null $slides_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\SlideFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBookAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBookDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBookPublishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBookTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereOutput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereSlidesPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUserId($value)
 * @mixin \Eloquent
 */
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
