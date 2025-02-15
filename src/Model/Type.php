<?php

namespace Src\Model;

enum Type: string 
{
    case sedan = 'sedan';
    case grande = '4x4';
    public function getValue(): string{
        return $this -> name;
    }

}