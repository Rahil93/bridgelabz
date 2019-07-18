<?php

// Create Interface Internet with abstract connectTo method
interface Internet
{
    public function connectTo($url);
}

// Create class InternetImpl that implement interface Internet
class InternetImpl  implements Internet
{
    public function connectTo($url)
    {
        echo "Connecting to $url.....\n";
    }
}

// Create Class ProxyInternet that implement interface Internet
class ProxyInternet implements Internet
{
    // This are the list of the bannned sites
    private $bannedSites = ["facebook.com","insta.com","socialmedia.com","movies.com"];
    
    // This method check that the client url matches the url with BannedSites if matches it will 
    // throw an Access Denied message otherwise it will establish your connection with Internet
    public function connectTo($url)
    {
        foreach ($this->bannedSites as $key => $value) {
            if (strcmp($value,strtolower($url)) == 0) {
                throw new Exception("Access Denied to ".$value."\n");
            }
        }
        return InternetImpl::connectTo($url);
    }
}

try {
    // Here we are creating object of ProxyInternet
    $obj = new ProxyInternet();
    // Here url goes through proxy class if the url doesnot comes in BannedSites list then it establish
    // connection through Class InternetImpl
    $obj->connectTo("google.com");
    $obj->connectTo("socialmedia.com");
} catch (Exception $e) {
    echo $e->getMessage();
}

?>