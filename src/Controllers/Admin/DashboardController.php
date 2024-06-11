<?php

namespace Pc\DuAn\Controllers\Admin;

use Pc\DuAn\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {   
        $data = [];
        $this->renderViewAdmin(__FUNCTION__, $data);
    }
}