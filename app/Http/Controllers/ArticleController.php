<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollections;

class ArticleController extends Controller
{
    public function index()     {
        return new ArticleCollections(Article::paginate(25));
    }
    public function show(Article $article)     {
       // $this->authorize('view', $article);
        return response()->json(new ArticleResource($article), 200);
    }

    public function store(Request $request)     {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)     {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)     {
        $article->delete();

        return response()->json(null, 204);
    }
}
