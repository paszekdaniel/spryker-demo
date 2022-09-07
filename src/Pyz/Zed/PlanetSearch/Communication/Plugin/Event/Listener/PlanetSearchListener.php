<?php

namespace Pyz\Zed\PlanetSearch\Communication\Plugin\Event\Listener;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\Planet\Dependency\PlanetEvents;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\PlanetSearch\Business\PlanetSearchFacadeInterface getFacade()
 */
class PlanetSearchListener extends AbstractPlugin implements EventHandlerInterface
{

    public function handle(TransferInterface $transfer, $eventName)
    {
        /**
         * @var EventEntityTransfer $transfer
         */
        if($eventName === PlanetEvents::ENTITY_PYZ_PLANET_CREATE) {
            $this->getFacade()->publish($transfer->getId());
        }
    }
}
