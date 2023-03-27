<?php

namespace RKW\RkwGraphs\ViewHelpers;

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
 * Class JsArrayViewHelper
 *
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class JsArrayViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('data', 'string', 'The data to handle', true);
        $this->registerArgument('delimiter', 'string', 'The delimiter', false, '|');
        $this->registerArgument('checkFloat', 'bool', 'Check for float values and correct them', false, false);

    }


    /**
     * Parses strings to arrays
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

        /** @var string $checkFloat */
        $checkFloat =  $arguments['checkFloat'];

        $parsedData = [];
        $strings = GeneralUtility::trimExplode($delimiter, $data, true);
        foreach ($strings as $string) {
            if ($checkFloat) {
                $parsedData[] = (float)str_replace(',', '.', $string);
            } else {
                $parsedData[] = addslashes($string);
            }
        }

        if (count($parsedData) < 1) {
            $parsedData = [];
        }

        return json_encode($parsedData, JSON_NUMERIC_CHECK);
    }

}
