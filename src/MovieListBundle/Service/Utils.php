<?php

namespace MovieListBundle\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Utils {
    /**
     * Service to upload file
     *
     * @param $file
     */
    public function uploadFile($file)
    {
        $fs = new Filesystem();
        $fileDir = 'uploads/';
        $fs->mkdir($fileDir);

        $filename = md5 ( uniqid () ) . '.' . $file->guessExtension();
        $file->move($fileDir, $filename);

        return $filename;
    }
}