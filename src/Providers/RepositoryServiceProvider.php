<?php
namespace App\Providers;

use App\Project\Domain\ProjectsRepository;
use App\User\Domain\UsersRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Repository Service Provider
 *
 * @package Providers
 */
class RepositoryServiceProvider implements ServiceProviderInterface
{
    protected $repositories = [
        'projects' => ProjectsRepository::class,
        'users'    => UsersRepository::class,
    ];

    public function register(Container $app)
    {
        foreach ($this->repositories as $key => $class) {
            $app['repository.' . $key] = function() use ($app, $class) {
                return new $class($app['db']);
            };
        }
    }
}
