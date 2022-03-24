<?php

namespace App\Common;

class Constants{
    const DISABLE = 0;
    const ENABLED = 1;
 
    const STATUS = [
        self::DISABLE ,
        self::ENABLED ,
    ];
    const STATUS_TEXT = [
        self::DISABLE => "Inactive",
        self::ENABLED => "Active",
    ];
 
}