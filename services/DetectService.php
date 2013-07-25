<?php
namespace Craft;

require __DIR__.'/../vendor/autoload.php';

use Sail\UserAgent;
use Sail\Parser\Simple;

class DetectService extends BaseApplicationComponent
{
    public function process()
    {
        $classes = array();

        // Get segments and add them to the class
        $segments = craft()->request->getSegments();
        $classes = array_merge($classes, $segments);

        // Get user if there is one
        if ($user = craft()->userSession->getUser())
        {
            $groups = $user->getGroups();
            if (is_array($groups))
            {
                $classes = array_merge($classes, $groups);
            }
            if ($user->admin == true)
            {
                $classes[] = 'admin';
            }
        }
        else
        {
            $classes[] = 'guest';
        }

        // Get user agent info
        $ua = new UserAgent($_SERVER['HTTP_USER_AGENT']);
        $ua->pushParser(new Simple());

        $info = $ua->getInfo();

        // Get browser
        if (isset($info['browser']))
        {
            $browser = $info['browser']['id'];
            if ($browser == 'IE' && isset($info['browser']['version']))
            {
                $browser .= round($info['browser']['version']);
            }
            $classes[] = $browser;
        }

        // Get OS
        if (isset($info['os']))
        {
            $os = $info['os']['id'];
            $classes[] = $os;
        }

        // Check for mobile
        if (isset($info['is_mobile']) && $info['is_mobile'] == 'yes')
        {
            $classes[] = 'is-mobile';
        }

        return $classes;
    }
}