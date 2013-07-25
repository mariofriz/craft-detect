<?php
namespace Craft;

class DetectVariable
{
    public function display()
    {
        return implode(' ', craft()->detect->process());
    }
}