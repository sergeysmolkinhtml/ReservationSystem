<?php

use Illuminate\Support\Facades\File;

if (!function_exists('should_seed_demo_images')) {
    // This function determind when the demo images should seeded
    function should_seed_demo_images() : bool
    {
        // $driver = config('filesystems.disks.' . config('filesystems.default') . '.driver');
        // return $driver == 'local' && File::isDirectory(public_path('images/demo'));

        return config('filesystems.default') != 'google' && File::isDirectory(public_path('images/demo'));
    }
}

if (!function_exists('image_storage_dir')) {
    function image_storage_dir()
    {
        return config('image.dir');
    }
}

if (!function_exists('attachment_storage_dir')) {
    function attachment_storage_dir($dir = '') : string
    {
        return 'attachments';
        // return Str::finish("attachments/{$dir}", '/');
    }
}
