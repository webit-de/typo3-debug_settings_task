<?php

namespace WebitDe\DebugSettingsTask\Task;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Marco Grahl <grahl@webit.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Controller\Action\Tool\Configuration;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Set Live-Setting if the System is in Production-Context
 *
 * @author    Grahl marco <grahl@webit.de>
 */
class DebugSettingsTask extends AbstractTask
{
    /**
     * Main method executed from scheduler.
     * Set live-settings-preset if system is in production-context
     *
     * @return boolean $success
     */
    public function execute()
    {
        $currentApplicationContext = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext();
        if ($currentApplicationContext->isProduction()) {
            /* @var \TYPO3\CMS\Install\Controller\Action\Tool\Configuration $configurationTool*/
            $configurationTool = GeneralUtility::makeInstance(Configuration::class);
            $configurationTool->setController('tool');
            $configurationTool->setAction('configuration');
            $configurationPostValues = array (
                'controller' => 'tool',
                'action' => 'configuration',
                'context' => 'backend',
                'values' =>
                    array (
                        'Context' =>
                            array (
                                'enable' => 'Live'
                            )
                    ),
                'set' =>
                    array (
                        'activate' => 'submit'
                    )
            );
            $configurationTool->setPostValues($configurationPostValues);
            $configurationTool->handle();

            $this->addNotification(
                'Live-Preset is set!',
                FlashMessage::INFO,
                true
            );
        }
        return true;
    }

    /**
     * Add a message to the internal queue and devLog
     *
     * @param string $message  The message itself
     * @param int    $severity Message level (see FlashMessage class constants)
     * @param bool   $devLog   Flag to set devlog or not (default = FALSE)
     *
     * @return void
     */
    public function addNotification($message, $severity = FlashMessage::ERROR, $devLog = false)
    {
        $flashMessageService = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessageService');
        $flashMessage = GeneralUtility::makeInstance(
            'TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
            $message,
            '',
            $severity,
            true
        );
        $flashMessageQueue = $flashMessageService->getMessageQueueByIdentifier();
        $flashMessageQueue->enqueue($flashMessage);

        if ($devLog) {
            GeneralUtility::devLog($flashMessage, 'DebugSetttingsTask', 1);
        }
    }
}
