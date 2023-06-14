<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticlePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::all();
        return view('Frontend/article/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $subcategories = Subcategory::get();
        return view('admin.post.create', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $subcategories = Subcategory::orderBy('created_at', 'DESC')->get();
        return view('admin.post.edit', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->img = $request->img;
        $post->video = $request->video;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->sub_cat_id = $request->sub_cat_id;
        $post->save();
        return redirect()->back()->withSuccess('Пост была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Категория была успешно удалена!');
    }
}
