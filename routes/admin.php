<?php

use Pc\DuAn\Controllers\Admin\DashboardController;
use Pc\DuAn\Controllers\Admin\ProductController;
use Pc\DuAn\Models\Product;


$router->before('GET|POST', '/admin/*.*', function() {

    if (!is_logged()) {
        header('location: ' . url('auth/login') );
        exit();
    } 

    if (!is_admin()) {
        header('location: ' . url() );
        exit();
    }
    
});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');
    // CRUD USER
    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');  // Danh sách
        $router->get('/create',         ProductController::class . '@create'); // Show form thêm mới
        $router->post('/store',         ProductController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',           ProductController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      ProductController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   ProductController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',   ProductController::class . '@delete'); // Xóa
    });
});

// $router->get('/admin/users/',               UserController::class . '@index');
// $router->get('/admin/users/create',         UserController::class . '@create');
// $router->post('/admin/users/store',         UserController::class . '@store');
// $router->get('/admin/users/{id}',           UserController::class . '@show');
// $router->get('/admin/users/{id}/edit',      UserController::class . '@edit');
// $router->post('/admin/users/{id}/update',   UserController::class . '@update');
// $router->post('/admin/users/{id}/delete',   UserController::class . '@delete');