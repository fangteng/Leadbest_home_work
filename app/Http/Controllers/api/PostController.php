<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Repositories\ArticleAuthorRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $articleService;
    private $articleAuthorRepository;
    private $articleRepository;

    public function __construct(
        ArticleService $articleService,
        ArticleAuthorRepository $articleAuthorRepository,
        ArticleRepository $articleRepository
    )
    {
        $this->articleService = $articleService;
        $this->articleAuthorRepository = $articleAuthorRepository;
        $this->articleRepository = $articleRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/article_list",
     *     tags={"前台 - 文章列表"},
     *     summary="文章列表",
     *     description="文章列表",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="操作成功",
     *     )
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $articles = $this->articleService->getArticleList();

        $articleData = [];

        if(!empty($articles)){
            foreach($articles as $article){
                $articleData[] = $article;
            }
        }

        return response()->json([
            'status' => 200,
            'data' => $articleData
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/create",
     *     tags={"前台 - 建立文章"},
     *     summary="建立文章",
     *     description="建立文章",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="操作成功",
     *     )
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'author_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'article_type_id' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json('Bad Request', 400);
        }

        $checkAuthor = $this->articleAuthorService->checkAuthor($request->author_id);

        if(!$checkAuthor){
            return response()->json([
                'status' => 403,
                'message' => '該使用者無建立權限'
            ]);
        }

        $createArticleResponcce = $this->articleAuthorRepository->create([
            'article_author_id' => $request->article_author_id,
            'title' => $request->title,
            'content' => $request->content,
            'article_type_id' => $request->article_type_id,
            'start_date' => $request->start_date,
        ]);

        if($createArticleResponcce){
            return response()->json([
                'status' => 200,
                'message' => '文章建立成功'
            ]); 
        }

        return response()->json([
            'status' => 400,
            'message' => '文章建立失敗'
        ]); 

    }

    /**
     * @OA\Get(
     *     path="/api/article_show/{id}",
     *     tags={"前台 - 搜尋文章"},
     *     summary="搜尋文章",
     *     description="搜尋文章",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="操作成功",
     *     )
     * )
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $articles = $this->articleService->find($id);

        if($articles){
            return response()->json([
                'status' => 200,
                'message' => '成功',
                'data' => $articles,
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => '無資料'
        ]);
       
    }

    /**
     * @OA\PATCH(
     *     path="/api/article_update/{id}",
     *     tags={"前台 - 修改文章"},
     *     summary="修改文章",
     *     description="修改文章",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="操作成功",
     *     )
     * )
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'article_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'article_type_id' => 'required|integer',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json('Bad Request', 400);
        }

        $updateResponce = $this->articleRepository->update($request->article_id ,[
            'title' => $request->title,
            'content' => $request->content,
            'article_type_id' => $request->article_type_id,
            'start_date' => $request->start_date,
        ]);

        if($updateResponce){
            return response()->json([
                'status' => 200,
                'message' => '更新成功'
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => '更新失敗'
        ]);
    }

    /**
     * @OA\DELETE(
     *     path="/api/article_delete/{id}",
     *     tags={"前台 - 刪除文章"},
     *     summary="刪除文章",
     *     description="刪除文章",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="操作成功",
     *     )
     * )
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $responce = $this->articleRepository->destroy($id);

        if($responce){
            return response()->json([
                'status' => 200,
                'message' => '刪除成功'
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => '刪除失敗'
        ]);
    }
}
