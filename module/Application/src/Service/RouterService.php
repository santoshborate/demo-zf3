<?php
declare(strict_types=1);

namespace Application\Service;

use Application\Entity\Router;
use Application\Repository\RouterRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;

class RouterService
{
    /** @var RouterRepository */
    private $routerRepository;

    /** @var EntityManager */
    private $entityManager;

    /**
     * @param RouterRepository $routerRepository
     * @param EntityManager $entityManager
     */
    public function __construct(RouterRepository $routerRepository, EntityManager $entityManager)
    {
        $this->routerRepository = $routerRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $status
     * @return int
     */
    public function getCountByStatus(int $status): int
    {
        $criteria = ['archive' => $status];

        return $this->routerRepository->count($criteria);
    }

    /**
     * @return Router[]
     */
    public function findAll(): array
    {
        return $this->routerRepository->findAll();
    }

    /**
     * @return Query
     */
    public function getPaginationQuery(): Query
    {
        return $this->routerRepository->getPaginationQuery();
    }

    /**
     * @param int $id
     * @return Router|null
     */
    public function findOneById(int $id): ?Router
    {
        return $this->routerRepository->find($id);
    }

    public function saveRouter(Router $router)
    {
        $this->entityManager->persist($router);
        $this->entityManager->flush();
    }

    public function deleteRouter(Router $router)
    {
        $this->entityManager->remove($router);
        $this->entityManager->flush();
    }
}
