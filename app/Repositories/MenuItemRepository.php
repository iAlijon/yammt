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
        foreach ($categories as $category) {
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }

    public function create($request)
    {
        $title = [
            'oz' => $request['title_oz'],
            'uz' => $request['title_uz']
        ];

        $params = $this->model->create([
            'title' => $title,
            'status' => $request['status'],
            'menu_id' => $request['menu_id']
        ]);

        return $params;
    }

    public function update($id, $request)
    {
        $item = $this->model->find($id);
        $title = [
            'oz' => $request['title_oz'],
            'uz' => $request['title_uz']
        ];

        $model = $item->update([
            'title'   => $title,
            'menu_id' => $request['menu_id'],
            'status'  => $request['status']
        ]);

        return $model;
    }
}
