<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\ArticleAuthor;

class ArticleAuthorRepository
{
    public function find(int $authorId): bool
    {
        return ArticleAuthor::findOrFail($authorId);
    }

    public function create(array $data)
    {
        return ArticleAuthor::create($data);
    }
}
