<?php

namespace RKW\RkwGraphs\ViewHelpers\Bars;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Class SeriesViewHelper
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class SeriesViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('data', 'string', 'The data to handle', true);
        $this->registerArgument('delimiter', 'string', 'The delimiter', false, '|');
    }


    /**
     * Build series from array data
     * each line is one series, the first item of each line is the label
     *
     * @param array $arguments
     * @param \Closure  $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): string {

        /** @var string $data */
        $data =  $arguments['data'];

        /** @var string $delimiter */
        $delimiter =  $arguments['delimiter'];

        $series = [];
        $lines = GeneralUtility::trimExplode(PHP_EOL, $data, true);
        foreach ($lines as $line) {

            // cleanup - floating values and slashes
            $line = addslashes(str_replace(',', '.', $line));

            $items = GeneralUtility::trimExplode($delimiter, $line, true);
            if (count($items) > 1) {

                $singleSeries = [];

                if (!is_numeric($items[0])) {
                    $singleSeries['name'] = array_shift($items);
                }

                $singleSeries['data'] = $items;

                $series[] = $singleSeries;

            }
        }

        return json_encode($series, JSON_NUMERIC_CHECK);
    }

}
