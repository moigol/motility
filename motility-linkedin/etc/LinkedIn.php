<?php
/*
 * @author Mo
 */

class LinkedIn
{
    public function __construct() 
    {
        ;
    }
}

    $oauth = new OAuth("p6dcgicwhbrt", "giTF7t3MNE5Jpbqj", OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);      
    //$oauth->setToken("48da6ea5-cfd2-45c4-be2c-5bda57c6885b", "0960c75e-23fe-45a9-8469-abd9c0c8abae");    
    $oauth->setNonce(rand());    
    $oauth->disableSSLChecks();
    $params = array();
    $headers = array();
    $method = OAUTH_HTTP_METHOD_GET;
    $requestUrl = 'https://api.linkedin.com/uas/oauth/requestToken?scope=r_network+rw_nus';
    $accessUrl = 'https://api.linkedin.com/uas/oauth/accessToken';
    
    if(strpos($_SERVER['REQUEST_URI'], 'oauth_token') !== false )
    {
        $oauth->setToken($_REQUEST['oauth_token'], $_SESSION['motility_tsecret']);
        $accessTokenInfo = $oauth->getAccessToken($accessUrl);
        //$url = "http://api.linkedin.com/v1/people-search?company-name=Mo";
        //$url = "http://api.linkedin.com/v1/people/~/network/updates?scope=self";
        $url = "http://api.linkedin.com/v1/people/~/network/updates";

        $oauth->setToken($accessTokenInfo['oauth_token'], $accessTokenInfo['oauth_token_secret']);

        $oauth->setAuthType(OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauth->fetch($url, $params, $method, $headers);
        $res = $oauth->getLastResponse(); 
        var_dump($res);        
    }        
    else
    {
        $oauth->setToken("b072ccbf-330b-4e37-869e-1ea153efcfca", "fbcd4949-61af-41d8-8025-4f5ef26ffcf6");            
        $url = "http://api.linkedin.com/v1/people/~?format=json";        
                
        $oauth->setAuthType(OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauth->fetch($url, $params, $method, $headers);        
        return json_decode($oauth->getLastResponse());
        
        var_dump($res);
        exit;

        
//        $requestTokenInfo = $oauth->getRequestToken($requestUrl);
//        $oauth->setToken($requestTokenInfo['oauth_token'], $requestTokenInfo['oauth_token_secret']);    
//        $_SESSION['motility_tsecret'] = $requestTokenInfo['oauth_token_secret'];                
        
        
        //$var = file_get_contents($requestTokenInfo['xoauth_request_auth_url'].'?oauth_token='.$requestTokenInfo['oauth_token']);
        echo '<a href="'.$requestTokenInfo['xoauth_request_auth_url'].'?oauth_token='.$requestTokenInfo['oauth_token'].'">click here</a>';                
    }

