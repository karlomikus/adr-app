<?php
namespace App\Providers;

use App\Category\Domain\CategoriesRepository;
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
        'categories' => CategoriesRepository::class,
        'users'      => UsersRepository::class,
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
