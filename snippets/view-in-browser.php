<?php

    $is_in_web_environment = true;
    $utm_content = 'Test content';
    $utm_source = 'Test source';
    $utm_campaign = 'Test campaign';
    $mail_title = 'Test view in browser';

    /* Add Google Analytics javascript pixel, for the web version */
    if ( $is_in_web_environment ) {
        require_once('../emailTrack.php');
        $myJSPageviewTracker = new EmailTrack($utm_content, $utm_source, $utm_campaign, $mail_title);
        $myJSPageviewTracker->supporterID = '';
        $urlJSPixelPageview = $myJSPageviewTracker->getPageviewUrl();
        $JsTag = EmailTrack::getJsTag($urlJSPixelPageview);
        echo($JsTag);
    }
?>