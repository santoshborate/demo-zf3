<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Hydrator\RouterHydrator;
use Application\Service\RouterService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class RouterControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RouterController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): RouterController
    {
        return new RouterController(
                $container->get(RouterService::class),
                $container->get(RouterHydrator::class)
            );
    }
}
