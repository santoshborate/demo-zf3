<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Router;
use Application\Form\RouterForm;
use Application\Hydrator\RouterHydrator;
use Application\Service\RouterService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
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

    public function indexAction()
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
        // Create the form.
        $form = new RouterForm();

        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {

            // Get POST data.
            $data = $this->params()->fromPost();

            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {

                // Get validated form data.
                $data = $form->getData();

                // Use service to add new router to database.
                $router = new Router();
                $router = $this->routerHydrator->hydrate($data, $router);
                $this->routerService->saveRouter($router);

                // Redirect the user to "index" page.
                return $this->redirect()->toRoute('router');
            }
        }

        // Render the view template.
        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction()
    {
        // Create the form.
        $form = new RouterForm();

        // Get router ID.
        $routerId = (int) $this->params()->fromRoute('id', 0);

        // Find existing router in the database.
        $router = $this->routerService->findOneById($routerId);
        if ($router == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {

            // Get POST data.
            $data = $this->params()->fromPost();

            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {

                // Get validated form data.
                $data = $form->getData();

                // Use post manager service to add new post to database.
                $router = $this->routerHydrator->hydrate($data, $router);
                $this->routerService->saveRouter($router);

                // Redirect the user to "router" page.
                return $this->redirect()->toRoute('router', ['action' => 'index']);
            }
        } else {
            $form->setData($this->routerHydrator->extract($router));
        }

        // Render the view template.
        return new ViewModel([
            'form' => $form,
            'router' => $router
        ]);
    }

    public function deleteAction()
    {
        // Get router ID.
        $routerId = (int) $this->params()->fromRoute('id', 0);

        // Find existing router in the database.
        $router = $this->routerService->findOneById($routerId);

        if ($router == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $this->routerService->deleteRouter($router);

        // Redirect the user to "index" page.
        return $this->redirect()->toRoute('router', ['action'=>'index']);
    }
}
