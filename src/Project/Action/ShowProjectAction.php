<?php
namespace App\Project\Action;

use App\Project\Domain\ProjectsRepository;
use App\Project\Responder\ShowProjectResponder;
use Symfony\Component\HttpFoundation\Request;

class ShowProjectAction
{
    protected $responder;
    protected $projects;

    public function __construct(ShowProjectResponder $responder, ProjectsRepository $projects)
    {
        $this->responder = $responder;
        $this->projects = $projects;
    }

    public function __invoke(Request $request, $id)
    {
        $data = $this->projects->getByID($id);

        return $this->responder->handle($data);
    }
}
