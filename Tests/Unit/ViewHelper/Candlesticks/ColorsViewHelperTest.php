<?php
namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Candlesticks;

use RKW\RkwGraphs\ViewHelpers\Candlesticks\ColorsViewHelper;

class ColorsViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
    public function itParsesColorsToUseSameColorForUpwardAndDownward()
    {
        $string = '#3C90EB';

        $fixture = [
            'upward' => '#3C90EB',
            'downward' => '#3C90EB',
        ];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new ColorsViewHelper();

        $this->assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));

    }

}