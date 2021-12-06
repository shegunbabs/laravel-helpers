<?php

use Illuminate\Support\Carbon;
use Shegunbabs\LaravelHelpers\LaravelHelpersServiceProvider;

beforeEach(function (){
    (new LaravelHelpersServiceProvider(null))->boot();
});


test('carbon', function ()
{
    $this->assertInstanceOf(Carbon::class, carbon());
    $this->assertEquals(Carbon::parse('today'), carbon('today'));
});


test('chain', function()
{

});


test('connection', function()
{

});


test('dump_sql', function ()
{

});


test('emoji', function ()
{

});


test('object', function()
{

});


test('ordinal', function()
{

});