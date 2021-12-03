<?php

function object($data)
{
    return json_decode(
        json_encode($data), false
    );
}