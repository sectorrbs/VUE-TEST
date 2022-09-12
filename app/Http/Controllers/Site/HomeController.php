<?php

    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Core\SiteController;

    class HomeController extends SiteController
    {

        public function index(): string
        {
            return view('site.common.index', $this->data);
        }

    }
