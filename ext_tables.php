<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'RKW.RkwGraphs',
            'Graphs',
            'Graphs'
        );

        $pluginSignature = str_replace('_', '', $extKey) . '_graphs';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $extKey . '/Configuration/FlexForms/flexform_graphs.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'RKW Graphs');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rkwgraphs_domain_model_graphs', 'EXT:rkw_graphics/Resources/Private/Language/locallang_csh_tx_rkwgraphics_domain_model_graphs.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rkwgraphics_domain_model_graphs');

    },
    $_EXTKEY
);
