<?php

use Illuminate\Support\Str;

function read_duration($text)
{
    return Str::readDuration($text);
}