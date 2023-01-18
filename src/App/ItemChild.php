<?php

namespace App;

class ItemChild extends Item
{
    public function getID()
    {
        return parent::getID();
    }

    public function getToken()
    {
        return parent::getToken();
    }
}