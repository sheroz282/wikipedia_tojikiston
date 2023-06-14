<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articlesFalse = Article::query()
            ->where('status', '=', 0)
            ->paginate(5); //Список не подтвержденные статье
        $articlesTrue = Article::query()
            ->where('status', '=', 1)
            ->paginate(5); //Список подтвержденные статье
        $categoriesTrue = Category::query()
            ->where('status', '=', 1)
            ->paginate(5); //Список всех категория
        $categoriesFalse = Category::query()
            ->where('status', '=', 0)
            ->orWhere('status', '=', 7)
            ->paginate(5); //Список всех категория

        return view('articles/index', compact('articlesFalse', 'articlesTrue', 'categoriesTrue','categoriesFalse'));
    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $subcategories = Subcategory::get();
        return view('admin.post.create', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->storeAs('images', $request->file('image')->hashName(),'public');

            $post = new Article();
            $post->title = $request->input('title');
            $post->img = $filename;
            $post->description = $request->input('description');
            $post->status = 0;
            $post->created_by = Auth::user()->name;
            $post->category_id = $request->input('category_id');
            $post->save();
        }
        return redirect()->back()->withSuccess('Пост была успешно добавлена!');
    }

    public function editFalse($id)
    {
        $categories = Category::query()->get();
        $articleFalse = Article::query()->findOrFail($id);
        return view('articles/editFalse', compact('articleFalse', 'categories'));
    }

    public function editTrue($id)
    {
        $categories = Category::query()->get();
        $articleTrue = Article::query()->findOrFail($id);
        return view('articles/editTrue', compact('articleTrue', 'categories'));
    }

    public function updateFalse(Request $request, $id)
    {
//        dd($request);
        $article = Article::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->storeAs('images', $request->file('image')->hashName(), 'public');
            $article->update([
                'img' => $filename,
            ]);
        }
        $article->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'updated_by' => Auth::user()->name,
        ]);
        $article->save();
        return redirect('articles')->withSuccess('Пост была успешно обнавлена!');
    }

    public function destroy($id)
    {
        $article = Article::query()
            ->findOrFail($id);
        $article->deleted_at = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');
        $article->deleted_by = Auth::user()->name;
        $article->status = 7;
        $article->save();

        return redirect('articles')->withSuccess('Пост была успешно удалено!');
    }
}
