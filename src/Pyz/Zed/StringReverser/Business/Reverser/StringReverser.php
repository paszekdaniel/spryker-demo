<?php

namespace Pyz\Zed\StringReverser\Business\Reverser;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Generated\Shared\Transfer\StringReverserTransfer;

class StringReverser implements StringReverserInterface
{
    /**
     * @param \Generated\Shared\Transfer\HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return \Generated\Shared\Transfer\HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $reversedString = strrev($helloSprykerTransfer->getOriginalString());
        $helloSprykerTransfer->setReversedString($reversedString);
        return $helloSprykerTransfer;
    }

    public function reverseStringNew(StringReverserTransfer $helloSprykerTransfer): StringReverserTransfer
    {
        $reversedString = strrev($helloSprykerTransfer->getOriginalString());
        $helloSprykerTransfer->setReversedString($reversedString);
        return $helloSprykerTransfer;
    }
}
