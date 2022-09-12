<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Core\AdminController;


    class HomeController extends AdminController
    {
        public $page = 'home';

        public function index(): string
        {
            return view('admin.common.index', $this->init($this->page));
        }
    }
