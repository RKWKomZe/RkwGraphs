<?php

namespace RKW\RkwGraphs\Controller;

use RKW\RkwGraphs\Domain\Model\Bar;
use RKW\RkwGraphs\Domain\Model\Mix;
use RKW\RkwGraphs\Domain\Model\Donut;
use RKW\RkwGraphs\Domain\Model\Candlestick;

/***
 *
 * This file is part of the "RKW Graphs" Extension for TYPO3 CMS.
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
     * @var \RKW\RkwGraphs\Domain\Model\Graph
     */
    protected $graph;

    /**
     * @var
     */
    protected $contentUid;

    /**
     * action donut
     *
     * @return void
     */
    public function donutAction()
    {
        $this->initializeAction();

        $this->graph = new Donut($this->settings, $this->contentUid);

        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();

    }

    /**
     * action bars
     *
     * @return void
     */
    public function barsAction()
    {
        $this->initializeAction();

        $this->graph = new Bar($this->settings, $this->contentUid);

        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();

    }

    /**
     * action candlesticks
     *
     * @return void
     */
    public function candlesticksAction()
    {
        $this->initializeAction();

        $this->graph = new Candlestick($this->settings, $this->contentUid);

        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();
    }

    /**
     * action mix
     *
     * @return void
     */
    public function mixAction()
    {
        $this->initializeAction();

        $this->graph = new Mix($this->settings, $this->contentUid);

        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();

    }

    /**
     * @return void
     */
    protected function initializeAction()
    {
        $this->getContentUid();
    }

    /**
     * @return void
     */
    protected function getContentUid()
    {
        $this->contentUid = (int)$this->configurationManager->getContentObject()->data['uid'];
    }

    /**
     * @return void
     */
    protected function addRenderCallToFooter()
    {

        $txRkwGraphsChart = 'txRkwGraphsChart' . $this->contentUid;
        $txRkwGraphsChartOptions = 'txRkwGraphsChartOptions' . $this->contentUid;
        $txRkwGraphsElement = 'txRkwGraphsElement' . $this->contentUid;
        $txRkwGraphsChartInit = 'txRkwGraphsChartInit' . $this->contentUid;

        $GLOBALS['TSFE']->additionalFooterData[$txRkwGraphsElement] = '
            <script type="text/javascript">
                
                if (typeof ' . $txRkwGraphsChartOptions . '.dataLabels !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.dataLabels.formatter = function(val) {
                        return Math.abs(val) + ' . $txRkwGraphsChartInit . '.unit;
                    };
                }
                
                if (typeof ' . $txRkwGraphsChartOptions . '.tooltip.y !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.tooltip.y.formatter = function(val) {
                        return Math.abs(val) + ' . $txRkwGraphsChartInit . '.unit;
                    }
                }
                
                 if ("' . $this->graph->getChartType() . '" !== "candlesticks" && typeof ' . $txRkwGraphsChartOptions . '.yaxis !== "undefined") {
                    ' . $txRkwGraphsChartOptions . '.yaxis[0].labels.formatter = function(val) {
                        if (isNaN(val)) {
                            var strArray = val.toString().split("#");
                            if (typeof strArray[0] !== "undefined") {
                                return strArray[0]
                            }
                            return val
                        }
                        return Math.abs(Math.round(val)) + ' . $txRkwGraphsChartInit . '.unit;
                    }
                 }

                var ' . $txRkwGraphsChart . ' = new ApexCharts(
                    document.querySelector("#' . $txRkwGraphsChart . '"),
                    ' . $txRkwGraphsChartOptions . '
                );
                ' . $txRkwGraphsChart . '.render();

            </script>
        ';
    }

}
