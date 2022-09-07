<?php
defined('TYPO3') || die();

// Register scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\WebitDe\DebugSettingsTask\Task\DebugSettingsTask::class] = [
    'extension' => 'debug_settings_task',
    'title' => 'LLL:EXT:debug_settings_task/Resources/Private/Language/locallang.xlf:task.debugSettingsTask.title',
    'description' => 'LLL:EXT:debug_settings_task/Resources/Private/Language/locallang.xlf:task.debugSettingsTask.description',
];
