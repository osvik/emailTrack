<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('emailTrack.php');

/**
 * INSTANTIATE PAGEVIEW TACKER
 * @params Special name to identify the email, traffic source (utm), campaign (utm) and email title
 */
$myPageviewTracker = new EmailTrack('Add special name here', 'newsletter-socios', 'Campaign', 'Just a title'); 

$urlPixelPageview = $myPageviewTracker->getPageviewUrl(); // Get a URL with the pageview type

$imageTag = EmailTrack::getImageTag($urlPixelPageview); // Get an html tag with the URL


/**
 * INSTANTIATE EVENT TACKER
 * @params Special name to identify the email, traffic source (utm), campaign (utm) and email title
 */
$myEventTracker = new EmailTrack('Add special name here', 'newsletter-socios', 'Campaign', 'Just a title'); 

$urlPixelEvent = $myEventTracker->getEventUrl(); // Get a URL with the pageview type

$imageTagOther = EmailTrack::getImageTag($urlPixelEvent); // Get an html tag with the URL


/**
 * INSTANTIATE PAGEVIEW TACKER for JS
 * @params Special name to identify the email, traffic source (utm), campaign (utm) and email title
 */
$myJSPageviewTracker = new EmailTrack('Add special name here', 'newsletter-socios', 'Campaign', 'Just a title'); 

$myJSPageviewTracker->supporterID = ''; // Supporter ID will be added trough JavaScript

$urlJSPixelPageview = $myJSPageviewTracker->getPageviewUrl(); // Get a URL with the pageview type

$JsTag = EmailTrack::getJsTag($urlJSPixelPageview); // Get an html/js tag with the URL


/**
 * DISPLAY THE PREVIOUS TRACKERS
 */
echo("<html>\n\n<head><meta charset='utf-8' /><title>Examples for the emailTrack class</title></head>\n\n<body>\n\n");
echo('<h1>Examples for the <code>emailTrack</code> class</h1>');


// DISPLAY PAGEVIEW TRACKER
echo('<h2>Pageview for email</h2>');
echo("URL of the pageview pixel: \n");
echo("<pre>\n");
echo($urlPixelPageview);
echo ("</pre>\n\n");
echo("Html tag with the pageview pixel: \n");
echo("<pre>\n");
echo( EmailTrack::displayHtmlTags($imageTag) ); // Displaying the html tag instead of inserting it in the html doc
echo ("\n\n");
echo("</pre>");


// DISPLAY JS PAGEVIEW TRACKER
echo('<h2>Pageview for web</h2>');
echo("URL of the JS pageview pixel: \n");
echo("<pre>\n");
echo($urlJSPixelPageview);
echo ("</pre>\n\n");
echo("Html/js tag with the pageview pixel: \n");
echo ("\n\n");
echo ("<pre>\n");
echo( EmailTrack::displayHtmlTags($JsTag) ); // Displaying the html tag instead of inserting it in the html doc
echo ("\n");
echo("</pre>");


// DISPLAY EVENT TRACKER
echo('<h2>Event for email</h2>');
echo("URL of the event pixel: \n");
echo("<pre>\n");
echo($urlPixelEvent);
echo ("</pre>\n\n");
echo("Html tag with the event pixel: \n");
echo("<pre>\n");
echo( EmailTrack::displayHtmlTags($imageTagOther) ); // Displaying the html tag instead of inserting it in the html doc
echo ("\n\n");
echo("</pre>");


echo("\n\n</body>\n</html>");

?>