<?php

namespace CGBG\Http\Controllers\Page;

use CGBG\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    /**
     * Show the home page to the user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('pages.index');

    }

    /**
     * Show the about page to the user.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the site frequently asked questions to the user.
     *
     * @return \Illuminate\View\View
     */
    public function help()
    {
        return view('pages.site-help');
    }

}
