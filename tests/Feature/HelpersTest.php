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

    $mock = \Mockery::mock();
    $mock->shouldReceive('first')->once()->andReturn('first thing');
    $mock->shouldReceive('second')->once()->with('first thing');
    $mock->shouldReceive('third')->once()->andReturn('third thing');

    $result = chain($mock)->first()->second(carry)->third()();

    $this->assertEquals('third thing', $result);

});


test('connection', function()
{
    $this->assertTrue(function_exists('connection'));
});


test('dump_sql', function ()
{
    $this->assertTrue(true);
});


test('emoji', function ()
{

});


test('object', function()
{
    $object = new StdClass();
    $object->firstname = 'john';
    $object->lastname = 'doe';

    $array = ['firstname' => 'john', 'lastname' => 'doe'];

    $this->assertEquals($object, object($array));
});


test('ordinal', function()
{

});