<?php 

    $is_in_mail_environment = true;
    $utm_content = 'Test content';
    $utm_source = 'Test source';
    $utm_campaign = 'Test campaign';
    $mail_title = 'Test view in mail';

    /* Add Google Analytics pixel, for the mail version */
    if ( $is_in_mail_environment ) {
        require_once('../emailTrack.php');
        $myPageviewTracker = new EmailTrack($utm_content, $utm_source, $utm_campaign, $mail_title); 
        $urlPixelPageview = $myPageviewTracker->getPageviewUrl();
        $imageTag = EmailTrack::getImageTag($urlPixelPageview);
        echo ($imageTag);       
    }
?>