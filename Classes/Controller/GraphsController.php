<?php
namespace RKW\RkwGraphs\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "RKW Graphics" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Steffen Kroggel <developer@steffenkroggel.de>
 *
 ***/

/**
 * GraphsController
 */
class GraphsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action pie
     *
     * @return void
     */
    public function donutAction()
    {

        $colours = GeneralUtility::trimExplode(',', addslashes('#74b929, #006349, #333333'), true);
        $labels = GeneralUtility::trimExplode(',', addslashes("ja, teil's teils, nein"), true);
        $data = GeneralUtility::trimExplode(',', addslashes('65,8,27'), true);
        $contentUid = intval($this->configurationManager->getContentObject()->data['uid']);

        $colours = '#74b929|#006349|#333333';
        $labels = 'ja| teil\'s teils| nein';
        $series = '65|8|27';

        // Add rendering call to footer after lib
        $GLOBALS['TSFE']->additionalFooterData['txRkwGraphsElement' . $contentUid] = '
            <script type="text/javascript">
                var txRkwGraphsChart' . $contentUid . ' = new ApexCharts(
                    document.querySelector("#txRkwGraphsChart' . $contentUid . '"),
                    txRkwGraphsChartOptions' . $contentUid . '
                );
                txRkwGraphsChart' . $contentUid . '.render();
            </script>
        ';


        $this->view->assignMultiple(
            array(
                'contentUid' => $contentUid,
                'title' => 'test Graph',
                'colours' => $colours,
                'labels' => $labels,
                'series' => $series,
                'captionLabel' => 'Abbildung 1',
                'caption' => 'TESt beschreeibung am Fußende!',
                'type' => 'text/javascript'

            )
        );


    }

    /**
     * action bars
     *
     * @return void
     */
    public function barsAction()
    {

        $contentUid = intval($this->configurationManager->getContentObject()->data['uid']);

        $colours = $this->settings['colours'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];

        // Add rendering call to footer after lib
        $GLOBALS['TSFE']->additionalFooterData['txRkwGraphsElement' . $contentUid] = '
            <script type="text/javascript">
                var txRkwGraphsChart' . $contentUid . ' = new ApexCharts(
                    document.querySelector("#txRkwGraphsChart' . $contentUid . '"),
                    txRkwGraphsChartOptions' . $contentUid . '
                );
                txRkwGraphsChart' . $contentUid . '.render();
            </script>
        ';


        $this->view->assignMultiple(
            array(
                'contentUid' => $contentUid,
                'title' => 'test Graph',
                'colours' => $colours,
                'labels' => $labels,

                'series' => $series,
                'captionLabel' => 'Abbildung 1',
                'caption' => 'TESt beschreeibung am Fußende!',
                'type' => 'text/javascript',
                'stacked' => false,
                'stackedPercent' => true,
                'percentage' => true,
            )
        );
    }


}
