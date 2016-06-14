<?php
namespace App\Common;

use Symfony\Component\HttpFoundation\Response;

abstract class BaseResponder
{
    abstract function handle($payload);

    public function error($payload = '')
    {
        return new Response($payload, 403);
    }
}
