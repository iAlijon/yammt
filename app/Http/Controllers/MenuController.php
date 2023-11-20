<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $params = Menu::query()->where('status', 1)->get();
        return view('home', compact('params'));
    }
}
