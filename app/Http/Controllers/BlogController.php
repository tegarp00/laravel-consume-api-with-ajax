<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function Home() {
        return view("blogs.home");
    }

    public function index()
    {
        $article = Article::paginate(10);

        return view('blogs.home', [
            'article' => $article
        ]);
    }

    public function createArticle() {
        return view('blogs.create');
    }

    public function postArticle(Request $request) {
        $article = [
            "title" => $request->title,
            "article" => $request->input("article"),
            "file" => $request->file('file')->store('blog', 'public'),
        ];

        Article::query()->create($article);
        return redirect('/blog');
    }

    public function detailArticle($id)
    {
      $article = Article::query()->where("id", $id)->first();
      return view("blogs.detail", compact('article'));
    }

    public function editArticle($id)
    {
      $article = Article::query()->where("id", $id)->first();
      return view("blogs.update", compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $article = [
            "title" => $request->title,
            "article" => $request->article,
        ];

        if($request->hasFile("file")) {
            $query = Article::query()->where('id', $id)->first();
            Storage::disk('public')->delete($query->file);
            $article['file'] = $request->file('file')->store('blog', 'public');
        }

        Article::WHERE('id', $id)->update($article);
        return redirect()->back();
    }

    public function deleteArticle($id)
    {
      $article = Article::query()->where("id", $id)->first();

      Storage::disk('public')->delete($article->file);
      $article->delete();
      return redirect()->route('blog.index');
    }
}
