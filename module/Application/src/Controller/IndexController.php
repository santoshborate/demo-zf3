<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Form\RouterForm;
use Application\Service\RouterService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /** @var RouterService */
    private $routerService;

    /**
     * @param RouterService $routerService
     */
    public function __construct(RouterService $routerService)
    {
        $this->routerService = $routerService;
    }

    public function indexAction()
    {
        return new ViewModel(
            [
                'active' => $this->routerService->getCountByStatus(0),
                'inactive' => $this->routerService->getCountByStatus(1)
            ]
        );
    }
}
