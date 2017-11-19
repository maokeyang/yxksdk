<?php
Route::get('/yxksdk', function(){
    echo 'Hello from the yxksdk package!';
});


Route::get('add/{a}/{b}', 'Maokeyang\Yxksdk\YxksdkController@add');
Route::get('subtract/{a}/{b}', 'Maokeyang\Yxksdk\YxksdkController@subtract');
