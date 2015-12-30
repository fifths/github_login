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
        $this->connection_string();
        if ($this->client_id == '' || $this->client_secret == '' || $this->redirect_uri == '') {
            throw new \ErrorException('param is empty');
        }
    }

    private function connection_string()
    {
        $config = require('config.php');
        if (isset($config['client_id'])) {
            $this->client_id = $config['client_id'];
        }
        if (isset($config['client_secret'])) {
            $this->client_secret = $config['client_secret'];
        }
        if (isset($config['redirect_uri'])) {
            $this->redirect_uri = $config['redirect_uri'];
        }
    }

    public function buildUrl($data)
    {
        return empty($data) ? '' : '?' . urldecode(http_build_query($data));
    }

    public function getAuthorizeUrl($state)
    {
        $data = array();
        $data['client_id'] = $this->client_id;
        $data['state'] = $state;
        $data['redirect_uri'] = $this->redirect_uri;
        $url = 'https://github.com/login/oauth/authorize' . $this->buildUrl($data);
        return $url;
    }

    public function authorize($state = '')
    {
        $url = $this->getAuthorizeUrl($state);
        header("location:$url");
    }

    public function get_access_token($code)
    {
        $data = array();
        $token = array();
        $url = 'https://github.com/login/oauth/access_token';
        $data['client_id'] = $this->client_id;
        $data['client_secret'] = $this->client_secret;
        $data['code'] = $code;
        $curl = new Curl();
        $getData = $curl->post($url, $data);
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