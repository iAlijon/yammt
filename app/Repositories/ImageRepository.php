<?php

namespace App\Repositories;

class ImageRepository
{
    public function upload( $file )
    {
        $filename = time().rand(10).'.'.$file->getClientOriginalExtension();

        dd($filename);
    }
}
