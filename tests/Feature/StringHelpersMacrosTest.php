<?php

use Illuminate\Support\Str;
use Shegunbabs\LaravelHelpers\LaravelHelpersServiceProvider;
use Shegunbabs\LaravelHelpers\StringHelpersMacros;


beforeEach(function (){
    (new LaravelHelpersServiceProvider(null))->boot();
});


it('can get read duration', function ()
{
    $words = str_repeat("word ", 420);
    $duration = Str::readDuration($words);

    $this->assertEquals(2, $duration);
});


it('can get between last', function()
{
    $var = Str::betweenLast('[', ']', 'sin[90]*cos[180]');

    $this->assertEquals($var, 180);
});


it('can take x amount of string', function ()
{
    $var = Str::take(6, 'I love cakes');

    $this->assertEquals($var, 'I love');
});


it('can take x amount of string with skip', function ()
{
    $var = Str::take(4, 'I love cakes', 2);

    $this->assertEquals($var, 'love');
});


it ('can reverse take', function()
{
    $var = Str::reverseTake(5, 'I love cakes');

    $this->assertEquals($var, 'cakes');
});


it ('can reverse take with skip', function()
{
    $var = Str::reverseTake(4, 'I love cakes', 1);

    $this->assertEquals($var, 'cake');
});