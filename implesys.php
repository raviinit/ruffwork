<?php

$url = 'https://journals.sagepub.com/home/VRT';



echo file_get_contents($url); // ->plaintext;

exit;



# Use the Curl extension to query Google and get back a page of results
$url = 'https://journals.sagepub.com/home/VRT';
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('a') as $link) {
        # Show the <a href>
        echo $link->getAttribute('href');
        echo "<br />";
}


exit;

$url = 'https://journals.sagepub.com/home/VRT';
$page = @FOPEN($url, "r"); 
 
PRINT("Links at $url<BR?>\n"); 
 
PRINT("<ul>\n"); 
 
WHILE(!FEOF($page)) { 
 
     $line = FGETS($page, 255); 
 
     WHILE(EREGI("HREF=\"[^\"]*\"", $line, $match)) { 
          PRINT("<li>"); 
          PRINT($match[0]); 
          PRINT("<br />\n"); 
          $replace = EREG_REPLACE("\?", "\?", $match[0]); 
          $line = EREG_REPLACE($replace, "", $line); 
     } 
} 
 
PRINT("</li></ul>\n"); 
FCLOSE($page); 



exit;

function getAllLinks($url) {
$urlData = file_get_contents($url);
$dom = new DOMDocument();
@$dom->loadHTML($urlData);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
 for($i = 0; $i < $hrefs->length; $i++){
    $href = $hrefs->item($i);
    $url = $href->getAttribute('href');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    if(!filter_var($url, FILTER_VALIDATE_URL) === false){
        $urlList[] = $url;
    }
 }
	return array_unique($urlList);
}

$url = 'https://journals.sagepub.com/home/VRT';
//print_r(getAllLinks($url));
var_dump(getAllLinks($url));

exit;


$url = 'https://journals.sagepub.com/home/VRT';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
//curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.12) Gecko/20080201 Firefox/2.0.0.12');
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch,CURLOPT_TIMEOUT,120);
$html = curl_exec($ch);
curl_close($ch);
echo '<pre>' . print_r(linkExtractor($html, $url), true) . ' </pre>';

function linkExtractor($html, $url)
{
 $linkArray = array();
 //$regexp = "<a\s[^>]*href=(\"??)(http[^\" >]*?)\\1[^>]*>(.*)<\/a>";
 $regexp = '/<a>]*)[\"\']?[^>]*>(.*?)/i';
 if(preg_match_all("$regexp/siU", $url, $matches, PREG_SET_ORDER)){ // $regexp/siU
  foreach ($matches as $match) {
   //array_push($linkArray, array($match[1], $match[2]));
   array_push($linkArray, $match);
  }
 }
 return $linkArray;
}
echo '</a>';

exit;

//Get the page's HTML source using file_get_contents.
$html = file_get_contents('https://journals.sagepub.com/home/VRT');
 
//Instantiate the DOMDocument class.
$htmlDom = new DOMDocument;
 
//Parse the HTML of the page using DOMDocument::loadHTML
@$htmlDom->loadHTML($html);
 
//Extract the links from the HTML.
$links = $htmlDom->getElementsByTagName('a');
 
//Array that will contain our extracted links.
$extractedLinks = array();
 
//Loop through the DOMNodeList.
//We can do this because the DOMNodeList object is traversable.
foreach($links as $link){
 
    //Get the link text.
    $linkText = $link->nodeValue;
    //Get the link in the href attribute.
    $linkHref = $link->getAttribute('href');
 
    //If the link is empty, skip it and don't
    //add it to our $extractedLinks array
    if(strlen(trim($linkHref)) == 0){
        continue;
    }
 
    //Skip if it is a hashtag / anchor link.
    if($linkHref[0] == '#'){
        continue;
    }
 
    //Add the link to our $extractedLinks array.
    $extractedLinks[] = array(
        'text' => $linkText,
        'href' => $linkHref
    );
 
}
 
//var_dump the array for example purposes
var_dump($extractedLinks);


exit;


	$url = "https://journals.sagepub.com/home/VRT";
	$input = @file_get_contents($url) or die("Could not access file: $url");
	//$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
	$regexp = "<a\s[^>]*href=(\"??)(http[^\" >]*?)\\1[^>]*>(.*)<\/a>";
	//$regexp = '/<a>]*)[\"\']?[^>]*>(.*?)/i';
	$linkArray = [];
	//$matches[] = 'Thereapeutic Advances in Infectious Disease';

	//if(preg_match_all("/$regexp/siU", $input, $matches)) {	  
	if(preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)){
		// $matches[2] = array of link addresses
		// $matches[3] = array of link text - including HTML code
		//echo $matches['Thereapeutic Advances in Infectious Disease'];
		
		foreach ($matches as $match) {
			//array_push($linkArray, array($match[1], $match[2]));
			array_push($linkArray, array($match));
		}
	}
  
	/*
	if(preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)){
		foreach ($matches as $match) {
			array_push($linkArray, array($match[1], $match[2]));
		}
	}
	*/
	print_r( $linkArray);