<?php

Route::group(
    array('prefix' => 'api/v1', 'before' => 'auth|admin'),
    function () {
        Route::resource('content', 'Gzero\Api\Controllers\ContentController');
    }
);
