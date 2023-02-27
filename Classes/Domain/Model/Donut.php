<?php

namespace RKW\RkwGraphs\Domain\Model;

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

/**
 * Class Donut
 *
 * @author Christian Dilger <c.dilger@addorange.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Donut extends Graph
{

    /**
     * Donut constructor.
     *
     * @param $settings
     * @param $contentUid
     * @todo that is not the proper way to handle this in TYPO3.Settings shouldn't be handled in models
     */
    public function __construct($settings, $contentUid)
    {
        parent::__construct($settings, $contentUid);
        $this->chartType = 'donut';
    }

}
