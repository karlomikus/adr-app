<?php
namespace App\Category\Responder;

use App\Common\BaseResponder;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowCategoryResponder extends BaseResponder
{
    public function handle($payload)
    {
        return new JsonResponse($payload);
    }
}
