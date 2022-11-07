<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Candlesticks;

use \RKW\RkwGraphs\ViewHelpers\Candlesticks\SeriesViewHelper;

/**
 * Class SeriesViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Candlesticks
 */
class SeriesViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itParsesSeriesStringWithLabel()
    {
        $string = 'Indien|7,95|10,5|7,5|8,05
Kasachstan|9,95|11,5|8,5|10,05';

        $fixture = [
            [
                'data' => [
                    [
                        'x' => 'Indien',
                        'y' => [7.95, 10.5, 7.5, 8.05]
                    ],
                    [
                        'x' => 'Kasachstan',
                        'y' => [9.95, 11.5, 8.5, 10.05]
                    ]
                ]
            ]
        ];
        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new SeriesViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));

    }

}
