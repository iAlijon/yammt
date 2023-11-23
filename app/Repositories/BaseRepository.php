<?php
namespace App\Repositories;

use App\Models\Status;

class BaseRepository
{
    public $limit = 10;

    public function status()
    {
        $staties = Status::all();
        return $staties;
    }
}
