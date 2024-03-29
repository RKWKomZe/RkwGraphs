<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\Bars\XAxisLabelHeightViewHelper;

/**
 * Class XAxisLabelHeightViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 * @todo IMO that's not the way to test a ViewHelper
 */
class XAxisLabelHeightViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itCalculatesMinHeightOfLabelsBasedOnLongestLabel()
    {
        $string = 'Indien|Kasachstan|Madagaskar|Vietnam|Bulgarien';

        $fixture = 55;

        $viewHelper = new XAxisLabelHeightViewHelper();

        self::assertEquals($fixture, $viewHelper->render($string));
    }
}
