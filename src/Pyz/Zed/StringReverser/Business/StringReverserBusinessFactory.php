<?php

namespace Pyz\Zed\StringReverser\Business;

use Pyz\Zed\StringReverser\Business\Reverser\StringReverser;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class StringReverserBusinessFactory extends AbstractBusinessFactory
{
    public function getReverser(): StringReverser
    {
        return new StringReverser();
    }
}
