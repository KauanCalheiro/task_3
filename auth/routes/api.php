<?php

Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});

