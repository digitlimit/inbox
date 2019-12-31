<?php

return [

    'paginate' => 10,

    /*
    |--------------------------------------------------------------------------
    | Inbox Route Group Config
    |--------------------------------------------------------------------------
    |
    | ..
    |
    */

    'route' => [
        'prefix' => 'inbox',
        'middleware' => ['web', 'auth'],
        'name' => null
    ],

    /*
    |--------------------------------------------------------------------------
    | Inbox Tables Name
    |--------------------------------------------------------------------------
    |
    | ..
    |
    */

    'tables' => [
        'threads' => 'threads',
        'messages' => 'messages',
        'participants' => 'participants',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want to overwrite any model you should change it here as well.
    |
    */

    'models' => [
        'thread' => Digitlimit\Inbox\Models\Thread::class,
        'message' => Digitlimit\Inbox\Models\Message::class,
        'participant' => Digitlimit\Inbox\Models\Participant::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Inbox Notification
    |--------------------------------------------------------------------------
    |
    | Via Supported: "mail", "database", "array"
    |
    */

    'notifications' => [
        'via' => [
            'mail',
        ],
    ],
];
