<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\Bars\XAxisLabelHeightViewHelper;

/**
 * Class XAxisLabelHeightViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 */
class XAxisLabelHeightViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @test
     */
    public function itCalculatesMinHeightOfLabelsBasedOnLongestLabel()
    {
        $string = 'Indien|Kasachstan|Madagaskar|Vietnam|Bulgarien';

        $fixture = 55;

        $viewHelper = new XAxisLabelHeightViewHelper();

        static::assertEquals($fixture, $viewHelper->render($string));
    }
}