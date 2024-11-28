<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->get();
        return view('articles.articles', compact('articles'));
    }
    // public function show($id)
    // {
    // $article = Article::with('user')->where('id', $id)->firstOrFail();
    //dd($article);
    //ddd($article);
    // return view('articles.show', compact('article'));
    // }
    // public function show(Article $article)
    // {
    //     return view('articles.show', compact('article'));
    // }
    public function show($id)
    {
        $article = Article::with('user')->with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);
        // dans la méthode show()
        $article = Article::with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);

        return view('articles.show', compact('article'));
    }
    public function create(){
        return view('articles.create');
    }
    public function store(Request $request){
        //verification des permissions plus tard
        $user = User::find(1);
        $request['user_id'] = $user->id;
        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
   
         $art = Article::create($validatedData);
    }
    public function edit(Article $article)
{
    return view('articles.edit', compact('article'));
}
}
