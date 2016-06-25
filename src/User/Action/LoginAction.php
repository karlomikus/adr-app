<?php
namespace App\User\Action;

use App\User\Domain\UsersRepository;
use App\User\Responder\LoginResponder;
use Symfony\Component\HttpFoundation\Request;
use Firebase\JWT\JWT;

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

            $issuedAt   = time();
            $notBefore  = $issuedAt + 10;
            $expire     = $notBefore + 60;

            $token = [
                "iss" => 'adr.dev',
                "exp" => $expire,
                "iat" => $issuedAt,
                "nbf" => $notBefore,
                "data" => [
                    'user' => [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'last_name' => $user['last_name'],
                    ]
                ]
            ];

            $jwt = JWT::encode($token, getenv('API_KEY'), 'HS256');

            return $this->responder->handle(['token' => $jwt]);
        }

        return $this->responder->handle(['errors' => ['msg' => 'Login failed']]);
    }
}
