<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\MenuItem;

class MenuItemRepository
{
    public function __construct()
    {
        $this->model = new MenuItem();
    }

    public function MenuCategory()
    {
        $categories = Menu::where('status', 1)->get();
        $arr = [];
        foreach ($categories as $category)
        {
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }
}
