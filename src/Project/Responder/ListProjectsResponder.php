<?php
namespace App\Project\Responder;

use App\Common\BaseResponder;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProjectsResponder extends BaseResponder
{
    public function handle($payload)
    {
        return new JsonResponse($payload->toArray());
    }
}
