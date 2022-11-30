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

/**
 * Class OffsetXViewHelper
 *
 * @author Christian Dilger <c.dilger@addorange.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class OffsetXViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Build x axis offset for individual series from array data
     *
     * Each separated value corresponds to the offset of an individual serie
     *
     * @param string $data
     * @param string $delimiter
     * @return string
     */
    public function render($data, $delimiter = '|')
    {

        // cleanup - floating values and slashes
        $line = addslashes(str_replace(',', '.', $data));

        $series = GeneralUtility::trimExplode($delimiter, $line, true);

        return json_encode($series, JSON_NUMERIC_CHECK);
        //===
    }

}
