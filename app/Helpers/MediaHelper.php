<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class MediaHelper
{
    /**
     * Новая медиа-сущность
     *
     * @param HasMedia $model
     * @param UploadedFile $file
     * @param string $collection
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public static function new(HasMedia $model, UploadedFile $file, string $collection = '')
    {
        $model->addMedia($file)->toMediaCollection($collection);
    }
}
