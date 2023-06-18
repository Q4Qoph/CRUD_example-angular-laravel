<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Article::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Article::where('id',$id)->exists()){
            $article = Article::find($id);
            $article->title = $request->title;
            $article->body = $request->body;
            $article->author = $request->author;

            $article->save();
            return response()->json([
                "massage"=>"record update succesfully"
            ],200);
        }else{
            return response()->json([
                "massage"=>"Article not found"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Article::where('id',$id)->exists()){
            $article = Article::find($id);
            $article->delete();

            return response()->json([
                "massage"=>"record deleted"
            ], 202);
        }else{
            return response()->json([
                "message"=>"Article not found"
            ], 404);
        }
    }
}
