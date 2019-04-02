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

        $contentUid = $this->getContentUid();

        $colors = $this->settings['colors'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];

        $this->addRenderCallToFooter($contentUid);

        $this->view->assignMultiple(
            array(
                'contentUid' => $contentUid,
                'title' => 'test Graph',
                'colors' => $colors,
                'labels' => $labels,
                'series' => $series,
                'captionLabel' => 'Abbildung 1',
                'caption' => 'TESt beschreeibung am Fußende!',
                'type' => 'text/javascript',
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

        $contentUid = $this->getContentUid();

        $colors = $this->settings['colors'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];
        $stacked = (bool) $this->settings['bars']['stacked'];

        $this->addRenderCallToFooter($contentUid);

        $this->view->assignMultiple(
            array(
                'contentUid' => $contentUid,
                'title' => 'test Graph',
                'colors' => $colors,
                'labels' => $labels,

                'series' => $series,
                'stacked' => $stacked,
                'captionLabel' => 'Abbildung 1',
                'caption' => 'TESt beschreeibung am Fußende!',
                'type' => 'text/javascript',
                'stackedPercent' => true,
                'percentage' => true,
            )
        );
    }

    /**
     * @param $contentUid
     */
    private function addRenderCallToFooter($contentUid)
    {
        $GLOBALS['TSFE']->additionalFooterData['txRkwGraphsElement' . $contentUid] = '
            <script type="text/javascript">
                var txRkwGraphsChart' . $contentUid . ' = new ApexCharts(
                    document.querySelector("#txRkwGraphsChart' . $contentUid . '"),
                    txRkwGraphsChartOptions' . $contentUid . '
                );
                txRkwGraphsChart' . $contentUid . '.render();
            </script>
        ';
    }

    /**
     * @return int
     */
    private function getContentUid()
    {
        return intval($this->configurationManager->getContentObject()->data['uid']);
    }


}
