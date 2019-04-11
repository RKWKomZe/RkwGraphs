<?php
namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\JsArrayViewHelper;

class JsArrayViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
    public function itParsesStringToArrayWithStrings()
    {
        $string = '25,0|30,0|Label';

        $fixture = ['25,0','30,0','Label'];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new JsArrayViewHelper();

        $this->assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}