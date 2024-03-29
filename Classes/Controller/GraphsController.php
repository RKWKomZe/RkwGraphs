<?php
namespace RKW\RkwGraphs\Controller;

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

use RKW\RkwGraphs\Domain\Model\Bar;
use RKW\RkwGraphs\Domain\Model\Graph;
use RKW\RkwGraphs\Domain\Model\Mix;
use RKW\RkwGraphs\Domain\Model\Donut;
use RKW\RkwGraphs\Domain\Model\Candlestick;

/**
 * Class CodeController
 *
 * @author Christian Dilger <c.dilger@addorange.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwGraphs
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class GraphsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var \RKW\RkwGraphs\Domain\Model\Graph|null
     */
    protected  ?Graph $graph = null;


    /**
     * @var int
     */
    protected int $contentUid = 0;


    /**
     * action donut
     *
     * @return void
     */
    public function donutAction(): void
    {
        $this->graph = new Donut($this->settings, $this->contentUid);
        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();
    }


    /**
     * action bars
     *
     * @return void
     */
    public function barsAction(): void
    {

        $this->graph = new Bar($this->settings, $this->contentUid);
        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();
    }


    /**
     * action candlesticks
     *
     * @return void
     */
    public function candlesticksAction(): void
    {
        $this->graph = new Candlestick($this->settings, $this->contentUid);
        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();
    }


    /**
     * action mix
     *
     * @return void
     */
    public function mixAction(): void
    {

        $this->graph = new Mix($this->settings, $this->contentUid);
        $this->view->assignMultiple($this->graph->process());

        $this->addRenderCallToFooter();

    }


    /**
     * @return void
     */
    protected function initializeAction(): void
    {
        $this->getContentUid();
    }


    /**
     * @return void
     */
    protected function getContentUid(): void
    {
        // @extensionScannerIgnoreLine
        $this->contentUid = (int)$this->configurationManager->getContentObject()->data['uid'];
    }


    /**
     * @return void
     * @todo Put this into the layout file of the extension. IMO this is where it belongs
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
