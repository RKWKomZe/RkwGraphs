<?php
defined('TYPO3_MODE') || die('Access denied.');

//=================================================================
// Add TypoScript
//=================================================================
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'rkw_graphs',
    'Configuration/TypoScript',
    'RKW Graphs'
);