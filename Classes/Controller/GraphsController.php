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

        $options = $this->setOptions();

        $this->addRenderCallToFooter($contentUid);

        $options = array_merge($options, [
            'contentUid' => $contentUid,
            'type' => 'text/javascript',
        ]);

        $this->view->assignMultiple($options);
    }

    /**
     * action bars
     *
     * @return void
     */
    public function barsAction()
    {

        $contentUid = $this->getContentUid();

        $options = $this->setOptions();

        $stacked = filter_var($this->settings['bars']['stacked'], FILTER_VALIDATE_BOOLEAN);
        $horizontal = filter_var($this->settings['bars']['horizontal'], FILTER_VALIDATE_BOOLEAN);

        $this->addRenderCallToFooter($contentUid);

        $options = array_merge($options, [
            'contentUid' => $contentUid,
            'horizontal' => $horizontal,
            'stacked' => $stacked,
            'stackedPercent' => true,
            'percentage' => true,
            'type' => 'text/javascript',
        ]);

        $this->view->assignMultiple($options);
    }

    /**
     * action candlesticks
     *
     * @return void
     */
    public function candlesticksAction()
    {
        $contentUid = $this->getContentUid();

        $options = $this->setOptions('candlesticks');

        $this->addRenderCallToFooter($contentUid);

        $options = array_merge($options, [
            'contentUid' => $contentUid,
            'type' => 'text/javascript',
        ]);

        $this->view->assignMultiple($options);
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

    /**
     * @return array
     */
    private function setOptions($type = null)
    {
        $title = $this->settings['title'];

        $colors = $this->settings['colors'];
        $labels = $this->settings['labels'];
        $series = $this->settings['series'];

        $xaxisLabel = $this->settings['xaxis']['label'];
        $yaxisLabel = $this->settings['yaxis']['label'];

        $yaxis2Show = $this->settings['bars']['yaxis2']['show'];
        $yaxis2Label = $this->settings['bars']['yaxis2']['label'];

        if ($type === 'candlesticks') {
            $series = (trim($this->settings['series']) !== '') ? $this->settings['series'] : $this->settings['candlesticks']['series']['value'];
        }

        $captionLabel = $this->settings['caption']['label'];
        $caption = $this->settings['caption']['text'];

        $legendShow = filter_var($this->settings['legend']['show'], FILTER_VALIDATE_BOOLEAN);

        return compact(
            'title',
            'xaxisLabel',
            'yaxisLabel',
            'yaxis2Show',
            'yaxis2Label',
            'colors',
            'labels',
            'series',
            'captionLabel',
            'caption',
            'legendShow'
        );
    }


}
