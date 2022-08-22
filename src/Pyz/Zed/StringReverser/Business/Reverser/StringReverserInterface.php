<?php
namespace Pyz\Zed\StringReverser\Business\Reverser;
use Generated\Shared\Transfer\HelloSprykerTransfer;
use Generated\Shared\Transfer\StringReverserTransfer;

interface StringReverserInterface
{
    /**
     * @param \Generated\Shared\Transfer\HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return \Generated\Shared\Transfer\HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
    public function reverseStringNew(StringReverserTransfer $helloSprykerTransfer): StringReverserTransfer;
}
