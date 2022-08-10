<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Debug Settings Task',
    'description' => 'Set live preset for debug settings by task, if system is in production context',
    'category' => 'misc',
    'author' => 'Marco Grahl',
    'author_email' => 'grahl@webit.de',
    'author_company' => 'webit! GmbH',
    'state' => 'beta',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-8.1.99',
            'typo3' => '9.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
