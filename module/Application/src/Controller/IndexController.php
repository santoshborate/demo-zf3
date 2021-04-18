<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Service\RouterService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

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

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        return new ViewModel(
            [
                'active' => $this->routerService->getCountByStatus(0),
                'inactive' => $this->routerService->getCountByStatus(1)
            ]
        );
    }
}
