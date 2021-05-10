<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index() {
        return view('master');
    }

    public function readArticle($id) {
        $article = $this->article->findOrFail($id);
        return view('master');
    }

    public function editArticle($id) {
        $article = $this->article->findOrFail($id);
        return view('master');
    }

    public function __construct(Article $article) {
        $this->article = $article;
    }

    public function getAllArticle() {
        $articles = $this->article->get();
        return response()->json($articles);
    }
    
    public function getArticleById($id) {
        $article = $this->article->findOrFail($id);
        return response()->json($article);
    }

    public function updateArticleById($id, Request $request) {

        $data = $request->all();

        $validators = Validator::make($data, [
            'user_id'       => 'required',
            'title'         => 'required',
            'category'      => 'required',
            'description'   => 'required|min:5'
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status'  => false,
                'data'    => [],
                'message' => $validators->errors()->all()
            ], 400);
        }

        Article::where('id', $id)
        ->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description
            
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Article updated successfully'
        ]);

        return response()->json([
            'status'  => false,
            'data'    => [],
            'message' => 'Something went wrong'
        ], 400);
    }

    public function deleteArticleById($id) {
        $article = $this->article->find($id);
        $article->delete();
        return response()->json([
            'status' => true,
            'message' => 'Article deleted successfully'
        ]);
    }
}
