<?php

function active($path, $active = 'active')
{
    return Request::is($path) ? $active : null;
}