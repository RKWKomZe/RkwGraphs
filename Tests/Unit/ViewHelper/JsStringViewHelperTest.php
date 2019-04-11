<?php
namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\JsStringViewHelper;

class JsStringViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
    public function itReturnsStringAsJson()
    {
        $string = 'String';

        $fixture = 'String';
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new JsStringViewHelper();

        $this->assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}