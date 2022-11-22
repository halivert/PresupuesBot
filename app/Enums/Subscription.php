<?php

namespace App\Enums;

enum Subscription: int
{
    case FREE = 0;
    case BASIC = 10;
    case PREMIUM = 20;
}
