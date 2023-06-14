<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('Frontend/articles/index', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function getInfoMountain(): View
    {
        return view('Frontend/informationAboutTajikistan/mountain');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function getInfoHissar(): View
    {
        return view('Frontend/informationAboutTajikistan/hissarFortress');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function getInfoChilDuhtaron(): View
    {
        return view('Frontend/informationAboutTajikistan/chilDuhtaron');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function getInfoChaihona(): View
    {
        return view('Frontend/informationAboutTajikistan/сhaihona');
    }

}
