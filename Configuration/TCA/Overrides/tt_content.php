<?php
defined('TYPO3_MODE') || die('Access denied.');

//=================================================================
// Register Plugin
//=================================================================
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'RKW.RkwGraphs',
    'Graphs',
    'RKW Graphs'
);

//=================================================================
// Add Flexform
//=================================================================
$extKey = 'rkw_graphs';

$pluginSignature = str_replace('_', '', $extKey) . '_graphs';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:' . $extKey . '/Configuration/FlexForms/flexform_graphs.xml'
);

