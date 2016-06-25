<?php
namespace App\Project\Action;

use App\Project\Domain\ProjectsRepository;
use App\Project\Responder\ListProjectsResponder;
use Symfony\Component\HttpFoundation\Request;

class ListProjectsAction
{
    protected $responder;
    protected $projects;

    public function __construct(ListProjectsResponder $responder, ProjectsRepository $projects)
    {
        $this->responder = $responder;
        $this->projects = $projects;
    }

    public function __invoke(Request $request)
    {
        $data = $this->projects->getAll();

        return $this->responder->handle($data);
    }
}
