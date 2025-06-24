<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'tags',
        'read_time',
    ];

    /**
     * Get the counsellor that owns the article.
     */
    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class);
    }

    /**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class);
    }
}
