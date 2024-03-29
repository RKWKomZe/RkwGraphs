<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\Bars\SeriesViewHelper;

/**
 * Class SeriesViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 * @todo IMO that's not the way to test a ViewHelper
 */
class SeriesViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itParsesSeriesStringWithLabel()
    {
        $string = 'negativ|8,0|2,0|6,0';

        $fixture = [
            [
                'name' => 'negativ',
                'data' => [8.0, 2.0, 6.0]
            ]
        ];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new SeriesViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

    /**
     * @test
     */
    public function itParsesSeriesStringWithoutLabel()
    {
        $string = '8,0|2,0|6,0';

        $fixture = [
            [
                'data' => [8.0, 2.0, 6.0]
            ]
        ];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new SeriesViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}
