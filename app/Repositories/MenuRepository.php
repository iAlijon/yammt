<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository
{
    public function __construct()
    {
        $this->model = new Menu();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        $title = [
            'oz' => $data['title_oz'],
            'uz' => $data['title_uz']
        ];
        $this->model->create([
           'title' => $title,
            'status' => $data['status']
        ]);

        return $this->model;
    }

    public function update($data, $id)
    {
        $model = $this->model->find($id);
        $title = [
            'oz' => $data['title_oz'],
            'uz' => $data['title_uz']
        ];

        $model->update([
           'title' => $title,
           'status' => $data['status']
        ]);

        return $model;
    }
}

