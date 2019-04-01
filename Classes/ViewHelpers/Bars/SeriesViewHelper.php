<?php

namespace RKW\RkwGraphics\ViewHelpers\Bars;

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

/**
 * Class TypolinkViewHelper
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwGraphics
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class SeriesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Build series from array data
     *
     * each line is one series, the first item of each line is the label
     *
     * @param string $data
     * @param string $delimiter
     * @return string
     */
    public function render($data, $delimiter = '|')
    {

        $series = [];

        $lines = GeneralUtility::trimExplode(PHP_EOL, $data, true);
        foreach ($lines as $line) {

            // cleanup - floating values and slashes
            $line = addslashes(str_replace(',', '.', $line));

            $items = GeneralUtility::trimExplode($delimiter, $line, true);
            if (count($items) > 1) {

                $label = array_shift($items);
                $values = implode(',', $items);

                $series[] = '{ name: \'' . $label . '\', data: [' . $values . '] },';
            }
        }

        return '[' . implode('', $series) . ']';
        //===
    }

}
