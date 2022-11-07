<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\Bars\OffsetXViewHelper;

/**
 * Class OffsetXViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 */
class OffsetXViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itParsesString()
    {
        $string = '-25|-30|75';

        $fixture = [-25, -30, 75];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new OffsetXViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }
}
