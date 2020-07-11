<?php
declare(strict_types=1);

namespace Application\Service;

use Application\Entity\Router;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class RouterServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RouterService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): RouterService
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('doctrine.entitymanager.orm_default');

        /** @var ObjectRepository $routerRepository */
        $routerRepository = $entityManager->getRepository(Router::class);

        return new RouterService($routerRepository, $entityManager);
    }
}
