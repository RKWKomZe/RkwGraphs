<?php

namespace RKW\RkwGraphics\ViewHelpers;

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
 * Class JsArrayViewHelper
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright Rkw Kompetenzzentrum
 * @package RKW_RkwGraphics
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class JsArrayViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Builds labels
     *
     * @param string $data
     * @param string $delimiter
     * @param bool $checkFloat
     * @return integer
     */
    public function render($data, $delimiter = '|', $checkFloat = false)
    {

        $finalStrings = [];
        $strings = GeneralUtility::trimExplode($delimiter, $data, true);
        foreach ($strings as $string) {
            if ($checkFloat) {
                $finalStrings[] = floatval(str_replace(',', '.', $string));
            } else {
                $finalStrings[] = addslashes($string);
            }
        }

        if (count($finalStrings) < 1) {
            return '[]';
            //===
        }

        if ($checkFloat) {
            return '[' . implode(',', $finalStrings) . ']';
            //===
        }

        return '[\'' . implode('\',\'', $finalStrings) . '\']';
        //===
    }

}
