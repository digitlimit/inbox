<?php

namespace Digitlimit\Inbox\Helpers;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Helper
{
    public static function avatar($user)
    {
        $avatar = optional($user)->avatar;
        $name = optional($user)->name;
        $default_avatar = "https://ui-avatars.com/api/?name={$name}";

        return $avatar ? $avatar : $default_avatar;
    }
}


