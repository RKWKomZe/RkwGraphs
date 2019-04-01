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

    public $flexFormData = [];


    public function getFlexFormContent()
    {
        $ttContent = $this->configurationManager->getContentObject()->data;

        $flexFormData =[];

        if (is_array($ttContent)) {

            $xml = simplexml_load_string($ttContent['pi_flexform']);

            if (
                (isset($xml))
                && (isset($xml->data))
                && (is_object($xml->data->sheet))
            ) {
                foreach ($xml->data->sheet as $sheet) {
                    foreach ($sheet->language->field as $field) {
                        $flexFormData[str_replace('settings.flexform.', '', (string)$field->attributes())] = (string)$field->value;
                    }
                }
            }
        }

        $this->flexFormData = $flexFormData;
    }


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

        //  $colours = GeneralUtility::trimExplode(',', addslashes(', #006349, #333333'), true);

        //  $colours = '#ff0000|#e64415|#333333|#006349|#74b929';

        $labels = "Bedeutung#Einschätzung der volkswirtschaftlichen Bedeutung digitaler's Plattformen|Nutzungshäufigkeit#Nutzungshäufigkeit digitaler Plattformen durch Unternehmen und Organisationen|Absicherung#Gefährdung der sozialen Absicherung von Arbeitnehmern und Rentnern durch digitale Plattformen|Förderung#Förderung digitaler Plattformen durch die nationale Politik|Nutzung#Zukünftige Nutzung digitaler Plattformen durch Gründer";

        $contentUid = intval($this->configurationManager->getContentObject()->data['uid']);


        $this->getFlexFormContent();

        $colours = $this->flexFormData['colours'];


        $series = "
negativ|8.0|2.0|6.0|6.0|0.0
eher negativ|24.0|32.0|33.0|28.0|2.0
teils-teils|10.|13.0|15.0|19.0|2.0
eher positiv|46.0|40.0|37.0|44.0|37.0
positiv|12.0|13.0|9.0|3.0|59.0
";


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
