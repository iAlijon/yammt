<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $repo;
    public function __construct(MenuRepository $repo)
    {
        $this->repo = $repo;
    }

    public function display()
    {
        $params = Menu::query()->where('status', 1)->with('menu')->orderBy('id', 'asc')->get();
        return view('header', compact('params'));
    }

    public function show($id)
    {
        $result = MenuItem::find($id);
        return view('front.page.show', $result);
    }

}
