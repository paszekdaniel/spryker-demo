<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Generated\Shared\Transfer\StringReverserTransfer;
use Pyz\Zed\StringReverser\Business\Reverser\StringReverser;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method StringReverserBusinessFactory getFactory()
 */
class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * {@inheritDoc}
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->getFactory()->getReverser()
            ->reverseString($helloSprykerTransfer);
    }

    public function reverseStringNew(StringReverserTransfer $helloSprykerTransfer): StringReverserTransfer
    {
        return $this->getFactory()->getReverser()
            ->reverseStringNew($helloSprykerTransfer);
    }
}
