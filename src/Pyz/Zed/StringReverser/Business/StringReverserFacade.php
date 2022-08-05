<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\StringReverser\Business\Reverser\StringReverser;
use Spryker\Zed\Kernel\Business\AbstractFacade;

class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * {@inheritDoc}
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return (new StringReverser())
            ->reverseString($helloSprykerTransfer);
    }
}
