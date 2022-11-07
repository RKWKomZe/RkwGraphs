<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Mix;

use \RKW\RkwGraphs\ViewHelpers\Mix\SeriesViewHelper;

/**
 * Class SeriesViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Mix
 */
class SeriesViewHelperTest extends \Nimut\TestingFramework\TestCase\UnitTestCase
{

    /**
     * @test
     */
    public function itParsesSeriesStringWithLabelAndType()
    {
        $string = 'negative|column|8,0|2,0|6,0
        positive|line|6,0|6,0|6,0';

        $fixture = [
            [
                'name' => 'negative',
                'type' => 'column',
                'data' => [8.0, 2.0, 6.0]
            ],
            [
                'name' => 'positive',
                'type' => 'line',
                'data' => [6.0, 6.0, 6.0]
            ]
        ];

        $fixture = json_encode($fixture, JSON_NUMERIC_CHECK);

        $viewHelper = new SeriesViewHelper();

        self::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}
