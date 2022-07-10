<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'article_types';
    protected $primaryKey = 'article_type_id';
    protected $guarded = [];
}
