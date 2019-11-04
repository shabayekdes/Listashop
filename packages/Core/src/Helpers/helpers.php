<?php

if (! function_exists('upload_image')) {
    function upload_image($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.show", $model);
    }
}
if (! function_exists('presentPrice')) {
    function presentPrice($price)
    {
        return '$' . number_format($price, 2);
    }
}
