<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index(){
        $articles = Article::all();
        return view("article.index", compact("articles"));
    }

    public function create(){
        return view("article.create");
    }


    public function store(Request $request){
        // On valide les donnée
        $validate = $request->validate([
            'title' => 'required|min:1|max:255',
            'content' => 'required|min:1',
        ]);

        Article::create($validate);

        return redirect()->route("article.index");
    }

    public function destroy(Request $request, Int $id){

        Article::destroy($id);
        return redirect()->back()->with('success', 'Article supprimé avec succès.');
    }
}
