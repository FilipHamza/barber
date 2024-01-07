<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function show(): Response
    {
        return response()->view('admin.homepage', ['section' => 'Home']);
    }
}
