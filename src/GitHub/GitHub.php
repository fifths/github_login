<?php

namespace GitHub;

use Curl\Curl;

/**
 * User: lee
 */
class GitHub
{
    private $client_id = '';
    private $client_secret = '';
    private $redirect_uri = '';

    public function __construct()
    {
        if($this->client_id==''||$this->client_secret=''||$this->redirect_uri){
            throw new \ErrorException('param is empty');
        }
    }

    public function buildUrl($data)
    {
        return empty($data) ? '' : '?' . urldecode(http_build_query($data));
    }

    public function authorize($state = '')
    {
        $data = array();
        $data['client_id'] = $this->client_id;
        $data['state'] = $state;
        $data['redirect_uri'] = $this->redirect_uri;
        $url = 'https://github.com/login/oauth/authorize' . $this->buildUrl($data);
        header("location:$url");
    }

    public function get_access_token($code)
    {
        $url = 'https://github.com/login/oauth/access_token';
        $data = array();
        $data['client_id'] = $this->client_id;
        $data['client_secret'] = $this->client_secret;
        $data['code'] = $code;
        $curl = new Curl();
        $getData = $curl->post($url, $data);
        $token = array();
        parse_str($getData, $token);
        return $token;
    }

    public function get_user_info($access_token)
    {
        $data = array();
        $data['access_token'] = $access_token;
        $url = 'https://api.github.com/user';
        $curl = new Curl();
        $curl->setHeader('User-Agent', 'https://api.github.com/meta');
        $getData = $curl->get($url, $data);
        return $getData;
    }

}