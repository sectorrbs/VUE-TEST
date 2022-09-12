<?php

    namespace App\Http\Controllers\Core;

    use App\Libraries\AdminCreator;
    use App\Models\Admin_page;
    use App\Models\Setting;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;


    class AdminController extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public $data = [];

        public function __construct()
        {

        }

        public function init($page = null): array
        {
            return $this->data = [

            ];
        }

    }
