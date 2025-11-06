<?php


if(!function_exists('get_cloudinary_url')){
    function get_cloudinary_url($path)
    {
        return env('CLOUDINARY_BASE_URL') . '/' . ltrim($path, '/');
    }
}
