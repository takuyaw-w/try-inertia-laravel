<?php

namespace App\Enums;

Enum TodoStatus: string
{
    case Todo = 'Todo';
    case Doing = 'Doing';
    case Done = 'Done';
}
