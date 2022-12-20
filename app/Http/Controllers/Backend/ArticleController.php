<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $artikel = Article::query()->get();
        if (!$artikel) {
            return response()->json([
                "status" => 404,
                "message" => "Article not found",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $artikel
        ]);
    }

    public function show($id)
    {
        $artikel = Article::query()->where('id', $id)->first();
        if (!$artikel) {
            return response()->json([
                "status" => 404,
                "message" => "Article not found",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $artikel
        ]);
    }

    public function store(Request $request)
    {
        $payload = [
            "title" => $request->title,
            "article" => $request->article,
            "file" => $request->file->store('article', 'public'),
        ];
        
        Article::query()->create($payload);
        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $payload
        ]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->except(['file']);
        $artikel = Article::find($id);
        if (isset($request->file)) {
            Storage::disk('public')->delete($artikel->file);
            $payload['file'] = $request->file->store('article', 'public');
        }

        $artikel->update($payload);
        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $artikel
        ]);
    }

    public function destroy($id)
    {
        $artikel = Article::query()->find($id);
        if (!$artikel) {
            return response()->json([
                "status" => 404,
                "message" => "Article not found",
                "data" => []
            ]);
        }

        $artikel->delete();
        return response()->json([
            "status" => 200,
            "message" => "Article berhasil dihapus",
        ]);
    }
}
