<?php

/**
 * @file Class to create a Google Analytics email tracking pixel.
 *       It will be used to integrate our html email generator "Fabricador"
 */

class EmailTrack {
    
    public $GAtrackingID = 'UA-7467053-1'; // Replace by your Google Analytics Tracking ID
    public $supporterID = '{user_data~cp_supporter_id}'; // Engaging Networks tag to insert user ID. Shoud be a tag that's unique for every user. You can't use information that allows others to identify the user. (No phone, email, full name, id number...)
    
    public $medium = 'email'; // Utm medium
    
    public $category = 'email'; // Analytics event category
    public $action = 'open'; // Analytics event action
    
    /**
     * Creates a new email pixel with all defaults
     * @param string [$content = 'DefaultContent']   Short string to identify the email
     * @param string [$source = 'DefaultSource']     Utm source that identifies the segment you are emailing too
     * @param string [$campaign = 'DefaultCampaign'] Utm campaign that identifies the main campaign of the email
     * @param string [$title = 'DefaultTitle']       The email title
     */
    function __construct($content = 'DefaultContent', $source = 'DefaultSource', $campaign = 'DefaultCampaign', $title = 'DefaultTitle') {
        $this->content = $content;
        $this->source = $source;
        $this->campaign = $campaign;
        $this->title = $title;
    }
    
    /**
     * Calculates the path from some object proprieties
     * @return string Path string
     */
    private function getPath() {
        return '%2F' . urlencode($this->source) . '%2F' . urlencode($this->campaign) .'%2F' . urlencode($this->content);
    }
    
    /**
     * Returns a pageview URL pixel
     * @return string URL of the pixel
     */
    public function getPageviewUrl () {
        $urlPixel = 'https://www.google-analytics.com/collect?v=1'
        . '&tid=' . $this->GAtrackingID
        . '&t=pageview'
        . '&dp=' . $this->getPath()
        . '&dt=' . urlencode($this->title)
        . '&cn=' . urlencode($this->campaign)
        . '&cs=' . urlencode($this->source)
        . '&cm=' . urlencode($this->medium)
        . '&cc=' . urlencode($this->content)
        . '&cid=' . $this->supporterID; 
        return $urlPixel;
    }
    
    /**
     * Returns an event URL pixel
     * @return string URL of the pixel
     */
    public function getEventUrl () {
        $urlPixel = 'https://www.google-analytics.com/collect?v=1'
        . '&tid=' . $this->GAtrackingID
        . '&t=event'
        . '&ec=' . urlencode($this->category)
        . '&ea=' . urlencode($this->action)
        . '&cn=' . urlencode($this->campaign)
        . '&cs=' . urlencode($this->source)
        . '&cm=' . urlencode($this->medium)
        . '&cc=' . urlencode($this->content)
        . '&cid=' . $this->supporterID;
        return $urlPixel;
    }
    
    /**
     * Transforms an url segment in an image tag
     * @param  string $urlPixel URL of the pixel
     * @return string Html image tag to put in the email
     */
    public static function getImageTag ($urlPixel) {
        return '<img src="' . $urlPixel . '" />';
    }
    
    /**
     * Creates a JavaScript pixel for the web version
     * @param  string $urlPixel URL of the pixel
     * @return string Javascript code
     */
    public static function getJsTag ($urlPixel) {
        $jsPixel = '<!-- Analytics JS pixel -->' . "\n"
        . '<script id="anpix">' . "\n"
        . '(function () {' . "\n"
        . 'var uid,' . "\n"
        . 'cid = window.location.hash.substr(1,12),' . "\n"
        . 'randNumber = parseInt(Math.random() * 9000000000 + 500000000, 10);' . "\n"
        . 'if ( /^\d{5,11}$/.test(cid) ) {' . "\n"
        . 'uid = cid;' . "\n"
        . '} else {' . "\n"
        . 'uid = randNumber;' . "\n"
        . '}' . "\n"
        . 'var u = "' . $urlPixel . '";' . "\n"
        . 'var d = document,' . "\n"
        . 'g = d.createElement("img"),' . "\n"
        . 's = d.getElementById("anpix");' . "\n"
        . 'g.src = u + uid ;' . "\n"
        . 'g.style.display = "none";' . "\n"
        . 'g.width = 1;' . "\n"
        . 'g.height = 1;' . "\n"
        . 's.parentNode.insertBefore(g, s);' . "\n"
        . '})();' . "\n"
        . '</script>' . "\n"
        . '<!-- /Analytics JS pixel -->' . "\n";
        return $jsPixel;
    }
    
    /**
     * Show the html code on the page, instead of interpreting it
     * @param  string $htmlString Invisible html code
     * @return string Visible html code
     */
    public static function displayHtmlTags ($htmlString) {
        $htmlString = str_replace ('<', '&lt;', $htmlString);
        $htmlString = str_replace ('>', '&gt;', $htmlString);
        return $htmlString;
    }
    
}

?>
