# This is a fork!

From: https://github.com/backupbrain/php-email-open-tracking/

## Changes:
- Some minor issues solved
- Added suport for catch ip and user agent
- Change image to 1px*1px transparent


Email Open Tracking in PHP
=============================
This code shows how to use HTML emails and PHP/MySQL to track
email opens and clickthroughs

It is intended as a complement to my tutorial:
http://tonygaitatzis.tumblr.com/post/65647388814/big-data-email-open-tracking-in-php

Configuration
--------------
Set up your settings file to reflect your MySQL server settings.

    $settings['mysql']['server'] = 'localhost';
    $settings['mysql']['username'] = 'mysqluser';
    $settings['mysql']['password'] = 'mysqlpassword';
    $settings['mysql']['schema'] = 'tracker_example';

Now You should be good to go.
