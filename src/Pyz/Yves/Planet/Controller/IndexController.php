<?php

namespace Pyz\Yves\Planet\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\Planet\PlanetClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(string $name)
    {
        $planet = $this->getClient()->getPlanetByName($name);
        if($planet === []) {
            $planet['name'] = "NOT FOUND";
            $planet['interesting_fact'] = '404';
        }
        return $this->view(
            [
                'planet' => $planet,
            ],
            [],
            '@Planet/views/index/index.twig'
        );
    }

}
