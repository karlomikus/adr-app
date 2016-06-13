<?php
namespace App\Common;

abstract class BaseResponder
{
    abstract function handle($payload);
}
