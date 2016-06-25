<?php
namespace App\Project\Responder;

use App\Common\BaseResponder;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowProjectResponder extends BaseResponder
{
    public function handle($payload)
    {
        return new JsonResponse($payload);
    }
}
