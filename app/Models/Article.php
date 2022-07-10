<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'articles';
    protected $primaryKey = 'article_id';
    protected $guarded = [];
}
