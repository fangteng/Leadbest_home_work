<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleRepository
{
    public function articleList(): object
    {
        return Article::paginate($this->perPage);
    }

    public function find(int $id): object
    {
        return Article::findOrFail($id);
    }

    public function update(int $articleId, array $data): bool
    {
        return Article::where('article_id', $articleId)->update();
    }

    public function destroy(int $articleId)
    {
        return Article::destroy($articleId);
    }
}
