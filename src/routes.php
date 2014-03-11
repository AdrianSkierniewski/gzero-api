<?php

Route::group(
    array('prefix' => 'api/v1', 'before' => 'auth|admin'),
    function () {
        Route::resource('block', 'Gzero\Api\Controllers\BlockController');
        Route::resource('content', 'Gzero\Api\Controllers\ContentController');
        Route::resource('content.uploads', 'Gzero\Api\Controllers\UploadController');
    }
);
