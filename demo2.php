<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('emailTrack.php');


/**
 * INSTANTIATE EVENT TACKER
 * @params Special name to identify the email, traffic source (utm), campaign (utm) and email title
 */
$myEventTracker = new EmailTrack('Add special name here', 'newsletter-socios', 'Campaign', 'Just a title'); 

$myEventTracker->supporterID = '0318378733912'; // Should be unique for each user

$urlPixelEvent = $myEventTracker->getEventUrl(); // Get a URL with the pageview type

EmailTrack::sendAnalytics($urlPixelEvent); // Get an html tag with the URL


/**
 * TRIGGER THE TRACKER
 */
echo("<html>\n\n<head><meta charset='utf-8' /><title>Example for the emailTrack class - Trigger Analytics from PHP</title></head>\n\n<body>\n\n");
echo('<h1>Example for the <code>emailTrack</code> class - Trigger Analytics from PHP</h1>');

// DISPLAY EVENT TRACKER
echo('<h2>Event for email</h2>');
echo("URL of the event pixel: \n");
echo("<pre>\n");
echo($urlPixelEvent);
echo ("</pre>\n\n");
echo("Analytics was called from PHP. \n");
echo("\n\n</body>\n</html>");

?>