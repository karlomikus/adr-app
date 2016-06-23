<?php
namespace App\User\Responder;

use App\Common\BaseResponder;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginResponder extends BaseResponder
{
    public function handle($payload)
    {
        return new JsonResponse($payload);
    }
}
