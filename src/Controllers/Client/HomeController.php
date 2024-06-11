<?php 

namespace  Pc\DuAn\Controllers\Client;

use Pc\DuAn\Commons\Controller;

class HomeController extends Controller
{
    public function index() {
        $name = 'Hunglt37585';

        $this->renderViewClient('home', [
            'name' => $name
        ]);
    }
}