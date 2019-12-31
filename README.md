# laravel-inbox
This Laravel package will help you to create an inbox system and send messages between users easily.
This package was forked from https://github.com/LiliomLab/laravel-inbox.

## Changes
- Fix Inbox listing issue, Inbox now only list received massages
- Add default avatar from https://ui-avatars.com/
- Fix labels on Inbox & Sent Item tabs
- Add separate route and controller for sent items

## Installation

This package can be installed through Composer.

``` bash
composer require digitlimit/laravel-inbox
```

If you don't use Laravel 5.5+ you have to add the service provider manually

```php
// config/app.php
'providers' => [
    ...
    Digitlimit\Inbox\InboxServiceProvider::class,
    ...
];
```

You can publish migrations, config, views, lang files

``` bash
php artisan vendor:publish --provider="Digitlimit\Inbox\InboxServiceProvider" 
```

This is the contents of the published config file:

```php
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
```

## Usage

First, we need to use `HasInbox` trait so users can have their inbox:

```php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Digitlimit\Inbox\Traits\HasInbox;

class User extends Authenticatable
{
    use Notifiable, HasInbox;
}
```

#### Get user threads:

```php
$user->threads()
```

#### Get unread messages:

```php
$thread = $user->unread()
```

#### Get the threads that have been sent by a user:

```php
$thread = $user->sent()
```

#### Get the threads that have been sent to the user:

```php
$thread = $user->received()
```

#### Send new thread:

- `subject()`: your message subject
- `writes()`: your message body
- `to()`: array of users ID that you want them to receive your message
- `send()`: to send your message

```php
$thread = $user->subject($request->subject)
            ->writes($request->body)
            ->to($request->recipients)
            ->send();
```

#### Reply for thread:

- `reply()` an object for your thread

```php
$message = $user->writes($request->body)
                ->reply($thread);
```

#### Check if the thread has any unread messages:

```php
if ($thread->isUnread())
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
