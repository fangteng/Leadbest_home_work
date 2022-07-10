<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleAuthorRepository;
use App\Repositories\ArticleTypeRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticleService
{
    private $articleRepository;
    private $articleAuthorRepository;
    private $articleTypeRepository;
    private $tagRepository;

    private $perPage = 10; 

    const CREDIT = 0;
    const DEBIT = 1;

    public function __construct(
        ArticleRepository $articleRepository,
        ArticleAuthorRepository $articleAuthorRepository,
        ArticleTypeRepository $articleTypeRepository,
        TagRepository $tagRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->articleAuthorRepository = $articleAuthorRepository;
        $this->articleTypeRepository = $articleTypeRepository;
        $this->tagRepository = $tagRepository;
    }

    public function getArticleList()
    {
        return $this->articleRepository->articleList();
    }

    public function find(int $id)
    {
        return $this->articleRepository->find($id);
    }

}
