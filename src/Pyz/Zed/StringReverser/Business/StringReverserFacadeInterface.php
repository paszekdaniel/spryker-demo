<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Generated\Shared\Transfer\StringReverserTransfer;

interface StringReverserFacadeInterface
{
    /**
     * @api
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
    public function reverseStringNew(StringReverserTransfer $helloSprykerTransfer): StringReverserTransfer;
}
