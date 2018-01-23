<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// scheduler task - create extension list
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Webit\\LiveSettingsTask\\Task\\LiveSettingsTask'] = [
    'extension' => $_EXTKEY,
    'title' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:live_settings_in_production_context_task.title',
    'description' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:live_settings_in_production_context_task.description',
];
