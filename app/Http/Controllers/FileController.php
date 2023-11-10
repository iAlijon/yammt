<?php

namespace App\Http\Controllers;

use App\Services\Admin\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $sevice;

    public function __construct()
    {
        $this->sevice = new FileService();
    }

    public function storeManual($detail, $directory = 'news')
    {
        return $this->sevice->storeManual($detail, $directory);
    }

    public function updateMan($detail, $directory = 'news')
    {
        return $this->sevice->updateManual($detail, $directory);
    }
}
