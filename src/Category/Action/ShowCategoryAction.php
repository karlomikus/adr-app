<?php
namespace App\Category\Action;

use App\Category\Domain\CategoriesRepository;
use App\Category\Responder\ShowCategoryResponder;
use Symfony\Component\HttpFoundation\Request;

class ShowCategoryAction
{
    protected $responder;
    protected $categories;

    public function __construct(ShowCategoryResponder $responder, CategoriesRepository $categories)
    {
        $this->responder = $responder;
        $this->categories = $categories;
    }

    public function __invoke(Request $request, $id)
    {
        $data = $this->categories->getByID($id);

        return $this->responder->handle($data);
    }
}
