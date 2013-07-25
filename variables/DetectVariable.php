<?php
namespace Craft;

class DetectVariable
{
    public function display()
    {
        return strtolower(implode(' ', craft()->detect->process()));
    }
}