<?php

namespace Pyz\Zed\Application\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\IndexController as SprykerIndexController;

class IndexController extends SprykerIndexController
{
    public function indexAction()
    {
        return ['string' => "DE STORE"];
    }
}
