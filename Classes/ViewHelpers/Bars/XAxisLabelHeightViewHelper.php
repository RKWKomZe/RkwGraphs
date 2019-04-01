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
 * Class XAxisLabelHeightViewHelper
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwGraphics
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class XAxisLabelHeightViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Calculates min-height of x-axis labels based on longest label
     *
     * @param string $data
     * @param string $delimiter
     * @param string $delimiterShort
     * @param float $multiplier
     * @return integer
     */
    public function render($data, $delimiter = '|', $delimiterShort = '#', $multiplier = 5.5)
    {

        $maxStringLength = 0;
        $labels = GeneralUtility::trimExplode($delimiter, $data, true);
        foreach ($labels as $label) {

            $labelSplit = GeneralUtility::trimExplode($delimiterShort, $label, true);
            $labelShort = array_shift($labelSplit);
            if (strlen($labelShort) > $maxStringLength) {
                $maxStringLength = strlen($labelShort);
            }

        }

        return intval($maxStringLength * $multiplier);
        //===
    }

}
