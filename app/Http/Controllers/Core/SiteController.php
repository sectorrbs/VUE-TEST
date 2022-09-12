<?php


    namespace App\Http\Controllers\Core;

    use App\Http\Controllers\Controller;

    class SiteController extends Controller
    {
        public $data = [];

        public function init($page = null): array
        {
            return $this->data = [
                'site_info' => [],
                'page_info' => [],
                'nav_header' => [],
                'nav_footer' => [],
                'nav_mobile' => [],
                'error' => false,
                'version' => [],
                'styles' => [],
                'scripts' => [],
            ];
        }
    }
