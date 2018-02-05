<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Debug Settings Task',
    'description' => 'Set live preset for debug settings by task, if system is in production context',
    'category' => 'misc',
    'author' => 'Marco Grahl',
    'author_email' => 'grahl@webit.de',
    'author_company' => 'webit! GmbH',
    'state' => 'beta',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'php' => '7.0.0-7.1.99',
            'typo3' => '7.6.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
