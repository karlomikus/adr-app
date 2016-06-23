<?php
namespace App\User\Action;

use App\User\Domain\UsersRepository;
use App\User\Responder\LoginResponder;
use Symfony\Component\HttpFoundation\Request;

class LoginAction
{
    protected $responder;
    protected $users;

    public function __construct(LoginResponder $responder, UsersRepository $users)
    {
        $this->responder = $responder;
        $this->users = $users;
    }

    public function __invoke(Request $req)
    {
        $payload = json_decode($req->getContent(), true);

        $user = $this->users->getByEmail($payload['email']);

        if ($payload['pass'] == $user['password']) {
            return $this->responder->handle($user);
        }

        return $this->responder->handle(['errors' => ['msg' => 'Login failed']]);
    }
}
