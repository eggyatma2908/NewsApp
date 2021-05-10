<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class WriteArticleController extends Controller
{
    public function index() {
        return view('master');
    }

    public function __construct(Article $article) {
        $this->article = $article;
    }

    public function articlePost(Request $request) {

        $data = $request->except('_token');

        $validators = Validator::make($data, [
            'user_id'       => 'required',
            'title'         => 'required',
            'category'      => 'required',
            'description'   => 'required|min:5',
            'images'        => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status'  => false,
                'data'    => [],
                'message' => $validators->errors()->all()
            ], 400);
        }

        $saved = $this->article->create($data);

        if ($saved) {
            
            $imageName = time().'.'.$request->images->extension();
            $saved->images = $imageName;
            
            $saved->save();

            $request->images->move(public_path('images'), $imageName);

            return response()->json([
                'status'  => true,
                'message' => 'Article saved successfully'
            ]);
        }

        return response()->json([
            'status'  => false,
            'data'    => [],
            'message' => 'Something went wrong'
        ], 400);
    }
}
