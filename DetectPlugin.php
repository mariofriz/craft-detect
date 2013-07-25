<?php

namespace Craft;

class DetectPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Detect');
    }

    function getVersion()
    {
        return '0.9.1';
    }

    function getDeveloper()
    {
        return 'Mario Friz';
    }

    function getDeveloperUrl()
    {
        return 'http://builtbysplash.com';
    }
}