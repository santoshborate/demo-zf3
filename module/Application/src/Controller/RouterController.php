<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Router;
use Application\Form\RouterForm;
use Application\Hydrator\RouterHydrator;
use Application\Service\RouterService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Laminas\Paginator\Paginator;

class RouterController extends AbstractActionController
{
    /** @var RouterService */
    private $routerService;

    /** @var RouterHydrator */
    private $routerHydrator;

    /**
     * @param RouterService $routerService
     * @param RouterHydrator $routerHydrator
     */
    public function __construct(RouterService $routerService, RouterHydrator $routerHydrator)
    {
        $this->routerService = $routerService;
        $this->routerHydrator = $routerHydrator;
    }

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        $page = $this->params()->fromQuery('page', 1);
        $pageSize = $this->params()->fromQuery('pageSize', 5);
        $query = $this->routerService->getPaginationQuery();

        $adapter = new DoctrineAdapter(new ORMPaginator($query, false));

        /** @var Paginator $paginator */
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage($pageSize);
        $paginator->setCurrentPageNumber($page);

        return new ViewModel(
            [
                'routers' => $paginator,
                'page' => $page,
                'pageSize' => $pageSize,
               // 'routers' => $this->routerService->findAll();
            ]
        );
    }

    public function addAction()
    {
        $form = new RouterForm();

        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            if ($form->isValid()) {
                $data = $form->getData();
                $router = new Router();
                $router = $this->routerHydrator->hydrate($data, $router);
                $this->routerService->saveRouter($router);

                return $this->redirect()->toRoute('router');
            }
        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction()
    {
        $form = new RouterForm();
        $routerId = (int) $this->params()->fromRoute('id', 0);

        $router = $this->routerService->findOneById($routerId);
        if ($router == null) {
            $this->getResponse()->setStatusCode(404);

            return;
        }

        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);

            if ($form->isValid()) {
                $data = $form->getData();
                $router = $this->routerHydrator->hydrate($data, $router);
                $this->routerService->saveRouter($router);

                return $this->redirect()->toRoute('router', ['action' => 'index']);
            }
        } else {
            $form->setData($this->routerHydrator->extract($router));
        }

        return new ViewModel([
            'form' => $form,
            'router' => $router
        ]);
    }

    public function deleteAction()
    {
        $routerId = (int) $this->params()->fromRoute('id', 0);
        $router = $this->routerService->findOneById($routerId);

        if ($router == null) {
            $this->getResponse()->setStatusCode(404);

            return;
        }

        $this->routerService->deleteRouter($router);

        return $this->redirect()->toRoute('router', ['action'=>'index']);
    }
}
