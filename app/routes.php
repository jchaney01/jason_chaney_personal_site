<?php

Route::get('/', array('uses' => 'SiteController@index','as' => 'home'));
Route::post('/', array('uses' => 'SiteController@contactForm','as' => 'contact'));
Route::get('/resume', array('uses' => 'SiteController@resume','as' => 'resume'));
Route::get('/tweets', function()
{
    return Twitter::getUserTimeline(array('screen_name' => 'jchaney01', 'count' => 20));
});
Route::get('/data', function()
{
    $path = app_path().'/data/data.xml';
    $xml=simplexml_load_file($path);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    return $array;
});

