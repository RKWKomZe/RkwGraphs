<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\JsStringViewHelper;

/**
 * Class JsStringViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 * @todo IMO that's not the way to test a ViewHelper
 */
class JsStringViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itReturnsStringAsJson()
    {
        $string = 'String';

        $fixture = 'String';
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new JsStringViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}
