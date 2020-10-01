<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['WebitDe\\DebugSettingsTask\\Task\\DebugSettingsTask'] = [
    'extension' => 'debug_settings_task',
    'title' => 'LLL:EXT:' . 'debug_settings_task' . '/Resources/Private/Language/locallang_db.xml:debug_settings_task.title',
    'description' => 'LLL:EXT:' . 'debug_settings_task' . '/Resources/Private/Language/locallang_db.xml:debug_settings_task.description',
];
