<?php

namespace RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars;

use \RKW\RkwGraphs\ViewHelpers\JsStringViewHelper;

/**
 * Class JsStringViewHelperTest
 *
 * @package RKW\RkwGraphs\Tests\Unit\ViewHelper\Bars
 */
class JsStringViewHelperTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
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

        static::assertJsonStringEqualsJsonString($fixture, $viewHelper->render($string));
    }

}