<?php
/**
 * Plugin Name: MotilityLinkedIn
 * Description: LinkedIn API
 * Author: Mo
 * Version: 0.01
 * Author URI: http://www.cutearts.org
*/

//require( 'etc/LinkedIn.php' );

add_action('widgets_init', array('MotilityLinkedIn', 'registerMotilityLinkedIn'));

class MotilityLinkedIn extends WP_Widget 
{	
    public function __construct() 
    {
        $widget_options = array('description' => __('LinkedIn API', 'motility'));
        parent::WP_Widget( 'linkedin-api', __('LinkedIn API', 'motility'), $widget_options );        
    }
      
    public function form($instance) 
    {
        include( 'views/form-view.phtml' );   
    }	
	
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance; 
        $instance['apikey'] = strip_tags($new_instance['apikey']);
        $instance['secretkey'] = strip_tags($new_instance['secretkey']);
        $instance['oauthtoken'] = strip_tags($new_instance['oauthtoken']);
        $instance['oauthsecret'] = strip_tags($new_instance['oauthsecret']);
        $instance['feed'] = strip_tags($new_instance['feed']);
        
        $instance['apikey2'] = strip_tags($new_instance['apikey2']);
        $instance['secretkey2'] = strip_tags($new_instance['secretkey2']);
        $instance['oauthtoken2'] = strip_tags($new_instance['oauthtoken2']);
        $instance['oauthsecret2'] = strip_tags($new_instance['oauthsecret2']);
        $instance['feed2'] = strip_tags($new_instance['feed2']);
        
        $instance['filters'] = strip_tags($new_instance['filters']);
        return $instance;        
    }
	  
    public function widget($args, $instance)
    {
        try
        {
            $data1 = $this->getINShareData($instance['apikey'],$instance['secretkey'],$instance['oauthtoken'],$instance['oauthsecret'],$instance['feed']);
            $data2 = $this->getINShareData($instance['apikey2'],$instance['secretkey2'],$instance['oauthtoken2'],$instance['oauthsecret2'],$instance['feed2']);
        } 
        catch(Exception $e) 
        {
            //echo $e->getMessage();
        }
        
        $filters = array();
        $filtersArray = explode("\r\n", $instance['filters']);
        foreach($filtersArray as $filtersArr)
        {
            $filters[] = explode(",", $filtersArr);
        }
        
 
        
        //$datas = $this->getINShareData('78ssaoekc2e8','CFz0YT1k9iJR9RFT','b2f78c38-21d1-47e8-8238-1a8d02e21b0a','bd924630-8508-4e81-94cc-630a88ad3c31','SHAR');
        //$datas = $this->getINShareData('tl8yfsfh4oel','aXC1zy0O90MW6U4j','891aff21-0ba7-46cf-8168-09d58b7b414a','cee62607-e189-47a4-89a8-d8d3d2fd691a','SHAR');
        //$datas = $this->getINShareData('gcz9n34xazc7','vG1bjwyvplT3uFeM','c1af6105-15bc-47d2-a3bc-26ec3bc1e67d','79764f11-9251-4d98-8543-872ce91d30e6','SHAR');
        //$datas = $this->getINShareData($instance['apikey'],$instance['secretkey'],$instance['oauthtoken'],$instance['oauthsecret'],$instance['feed']);
        //$datas = $this->getINShareData('gcz9n34xazc7','vG1bjwyvplT3uFeM','c1af6105-15bc-47d2-a3bc-26ec3bc1e67d','79764f11-9251-4d98-8543-872ce91d30e6','SHAR');
        $datas = $this->shuffleArrayAssoc($this->filterINShareData(array_merge($data1, $data2), $filters));
        
        foreach($datas as $data) 
        { 
            if(!empty($data->updateContent->person->currentShare) > 0)
            {
                $person = $data;
                break; // get one
            }
        }
        
        if(isset($_GET['motilityAction']) && $_GET['motilityAction'] == 'doLike')
        {
            $theUrl = 'https://www.linkedin.com/uas/oauth2/accessToken?grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.get_option('siteurl').'/?motilityAction=doLike&client_id='.$instance['apikey'].'&client_secret='.$instance['secretkey'];
            
            $theResponse = motility_get_contents_curl($theUrl);
            $theResult = json_decode($theResponse);
            
            $theRequestUrl = 'https://api.linkedin.com/v1/people/~/network/updates/key='.$person->updateKey.'/is-liked'; 
                        
            if($theResult->access_token)
            {
                try
                {
                    $oauth->fetch($theRequestUrl.'?format=json&oauth2_access_token='.$theResult->access_token, "<?xml version='1.0' encoding='UTF-8'?>
<is-liked>true</is-liked>", OAUTH_HTTP_METHOD_PUT, array("Content-Type" => "text/xml"));
                    
                }
                catch(Exception $e) 
                {
                    echo $e->getMessage() . $oauth->getLastResponse();
                }
                
                echo '<script>window.opener.location.reload(true);window.close();</script>';
            }
        }
        
        require( 'views/linked-view.phtml' );        
    }  
    
    public function registerMotilityLinkedIn()
    {        
        if(session_id() == "")
        {
            session_start();
        }
        
        register_widget('MotilityLinkedIn'); 
        wp_enqueue_script('jquery');
    }    
    
    public function loadTextDomain()
    {
        load_plugin_textdomain('minmaveArticles', false, dirname(plugin_basename( __FILE__ )));         
    }
    
    public function getINShareData($ak, $sk, $ot, $os, $feed="SHAR")
    {
        $oauth = new OAuth($ak, $sk, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);      
        $oauth->setToken($ot, $os);
        $oauth->setNonce(rand());    
        $oauth->disableSSLChecks();
        $params = array();
        $headers = array();
        $method = OAUTH_HTTP_METHOD_GET;
        
        $oauth->setAuthType(OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauth->fetch("http://api.linkedin.com/v1/people/~/network/updates?type=".$feed."&count=100&format=json", $params, $method, $headers);        
        $data =  json_decode($oauth->getLastResponse()); 
        
        $return = array();
        
        foreach($data->values as $values) 
        { 
            if(!empty($values->updateContent->person->currentShare))
            {
                $return[$values->updateContent->person->currentShare->id] = $values;
            }
        }

        return $this->shuffleArrayAssoc($return);
    }
    
    public function filterINShareData($data=array(), $cond=array())
    {
        $return = array();
        foreach($data as $d)
        {
            $fn = strtolower($d->updateContent->person->firstName);
            $ln = strtolower($d->updateContent->person->lastName);
            
            //Sylwia|Gospodarczyk
            //Michael|Callisen
            //Claus|Larsson
            
            foreach($cond as $c)
            {
                if($fn == strtolower($c[0]) && $ln == strtolower($c[1]))
                {
                    $return[$d->updateContent->person->id] = $d;
                }
            }
        }
        
        return $return;
    }
    
    public function shuffleArrayAssoc($list) 
    { 
        if (!is_array($list)) return $list; 

        $keys = array_keys($list); 
        shuffle($keys); 
        $random = array(); 
        foreach ($keys as $key) { 
          $random[$key] = $list[$key]; 
        }
        return $random; 
    } 
}

/*
 * Utility Functions
 */

function motility_smartdate($timestamp)
{
	$diff = time() - $timestamp;
 
	if ($diff <= 0) {
		return 'Now';
	}
	else if ($diff < 60) {
		return motility_grammar_date(floor($diff), ' second(s) ago');
	}
	else if ($diff < 60*60) {
		return motility_grammar_date(floor($diff/60), ' minute(s) ago');
	}
	else if ($diff < 60*60*24) {
		return motility_grammar_date(floor($diff/(60*60)), ' hour(s) ago');
	}
	else if ($diff < 60*60*24*30) {
		return motility_grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
	}
	else if ($diff < 60*60*24*30*12) {
		return motility_grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
	}
	else {
		return motility_grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
	}
}
 
 
function motility_grammar_date($val, $sentence) 
{
	if ($val > 1) {
		return $val.str_replace('(s)', 's', $sentence);
	} else {
		return $val.str_replace('(s)', '', $sentence);
	}
}

function motility_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function motility_get_meta($url)
{
    $html = motility_get_contents_curl($url);

    //parsing begins here:
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $nodes = $doc->getElementsByTagName('title');

    //get and display what you need:
    $title = $nodes->item(0)->nodeValue;

    $metas = $doc->getElementsByTagName('meta');
    $metaInfo =array();
    for ($i = 0; $i < $metas->length; $i++)
    {
        $meta = $metas->item($i);
        if($meta->getAttribute('property') == 'og:title')
        {
            $metaInfo['title'] = $meta->getAttribute('content');
            
            if($metaInfo['title'] == "")
            {
                $metaInfo['title'] = $title;
            }
        }
        if($meta->getAttribute('property') == 'og:image')
        {
            $metaInfo['image'] = $meta->getAttribute('content');
        }
        if($meta->getAttribute('property') == 'og:description')
        {
            $metaInfo['description'] = $meta->getAttribute('content');
            if($metaInfo['description'] == "" && $meta->getAttribute('name') == 'description')
            {
                $metaInfo['description'] = $meta->getAttribute('content');
            }
        }
    }

    return $metaInfo;
}