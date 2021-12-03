<?php

use Spatie\Emoji\Emoji;

function emoji($name)
{
    $constant = "\Spatie\Emoji\Emoji::$name";
    return constant($constant);
}