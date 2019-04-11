<?php
namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\Bars\XAxisLabelHeightViewHelper;

class XAxisLabelHeightViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
    public function itCalculatesMinHeightOfLabelsBasedOnLongestLabel()
    {
        $string = 'Indien|Kasachstan|Madagaskar|Vietnam|Bulgarien';

        $fixture = 55;

        $viewHelper = new XAxisLabelHeightViewHelper();

        $this->assertEquals($fixture, $viewHelper->render($string));
    }
}