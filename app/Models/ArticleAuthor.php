<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleAuthor extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'article_authors';
    protected $primaryKey = 'article_author_id';
    protected $guarded = [];
}
