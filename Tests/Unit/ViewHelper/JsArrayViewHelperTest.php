<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\JsArrayViewHelper;

/**
 * Class JsArrayViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 * @todo IMO that's not the way to test a ViewHelper
 */
class JsArrayViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itParsesStringToArrayWithStrings()
    {
        $string = '25,0|30,0|Label';

        $fixture = ['25,0', '30,0', 'Label'];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new JsArrayViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}
