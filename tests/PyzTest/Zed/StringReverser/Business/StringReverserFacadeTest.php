<?php

namespace PyzTest\Zed\StringReverser\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\StringReverserBuilder;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Zed
 * @group StringReverser
 * @group Business
 * @group Facade
 * @group StringReverserFacadeTest
 * Add your own group annotations below this line
 */
class StringReverserFacadeTest extends Unit
{
    /**
     * @var \PyzTest\Zed\StringReverser\StringReverserBusinessTester
     */
    protected $tester;

    public function testStringIsReversedCorrectly(): void {
        $stringReverserTransfer = (new StringReverserBuilder([
            'originalString' => 'Hello!'
        ]))->build();

        $stringReverserResultTransfer = $this->tester->getFacade()->reverseStringNew($stringReverserTransfer);

        $this->assertSame('!olleH', $stringReverserResultTransfer->getReversedString());

    }

}
