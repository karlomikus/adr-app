<?php
namespace App\Category\Action;

use App\Category\Domain\CategoriesRepository;
use App\Category\Responder\ListCategoriesResponder;
use Symfony\Component\HttpFoundation\Request;

class ListCategoriesAction
{
    protected $responder;
    protected $categories;

    public function __construct(ListCategoriesResponder $responder, CategoriesRepository $categories)
    {
        $this->responder = $responder;
        $this->categories = $categories;
    }

    public function __invoke(Request $request)
    {
        $data = $this->categories->getAll();

        return $this->responder->handle($data);
    }
}
