<?php

namespace App\Repositories;

use App\Http\Controllers\FileController;
use App\Models\MenuItem;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use MediaUploader;

class NewsRepository extends BaseRepository
{
    public $media = null;



    public function __construct()
    {
        $this->model = new News();
    }

    public function category()
    {
        $result = MenuItem::where('menu_id', 8)->get();
        return $result;
    }

    public function create($data)
    {
        $title = [
            'oz' => $data['title_oz'],
            'uz' => $data['title_uz']
        ];

        $fc = new FileController();
        $content = [
            'oz' => $fc->storeManual($data['content_oz']),
            'uz' => $fc->storeManual($data['content_uz'])
        ];
        $description = [
            'oz' => $data['description_oz'],
            'uz' => $data['description_uz']
        ];

        $item = $this->model->create([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'status' => $data['status'],
            'date' => $data['date'],
            'category_id' => $data['category_id']
        ]);
        if (isset($data['image'])){
            $this->logoUpload($data['image'], $item);
        }

        return $item;
    }

    public function update($request, $id)
    {
        $item = $this->model->find($id);

        $logo = null;
        if ($request['image']){
            $logo = MediaUploader::fromSource($request['image'])->useFilename(time())->toDirectory('news')->upload();
        }

        if (!is_null($logo)){
            $item->syncMedia($logo->id, ['image_news']);
            $this->model->where('id', $item->id)->update(
                [
                    'image' => '/storage/news/' . $item->getMedia('image_news')->first()->filename . '.' . $item->getMedia('image_news')->first()->extension
                ]
            );
        }

        $title = [
            'oz' => $request['title_oz'],
            'uz' => $request['title_uz']
        ];
        $description = [
            'oz' => $request['description_oz'],
            'uz' => $request['description_uz']
        ];
        $fc = new FileController();
        $content = [
            'oz' => $fc->updateMan($request['content_oz']),
            'uz' => $fc->updateMan($request['content_uz'])
        ];

        $item->update([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'date' => $request['date'],
            'status' => $request['status']
        ]);

        return $item;
    }

    public function logoUpload($image,$item)
    {
             $this->media = MediaUploader::fromSource($image)->useFilename(time())->toDirectory('news')->upload();
        if (!is_null($this->media))
        {
            $item->syncMedia($this->media->id, ['image_news']);
            return $this->model->where('id',$item->id)->update([
               'image' => '/storage/news/' . $item->getMedia('image_news')->first()->filename. '.' .$item->getMedia('image_news')->first()->extension
            ]);
        }
    }
}
