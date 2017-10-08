<?php
/**
 * Created by PhpStorm.
 * User: skyfire
 * Date: 17-10-8
 * Time: 上午10:06
 */
namespace Mu;
class HTTPClient{

    private $_instance = null;

    public function __construct($url = null)
    {
        $this->_instance = curl_init();
        if (is_null($url) == false) {
            $this->setUrl($url);
        }
    }

    public function setUrl($url)
    {
        curl_setopt($this->_instance, CURLOPT_URL, $url);
    }

    public static function getInstance($url = null)
    {
        return new HTTPClient($url);
    }

    public function setHeader($headers = array())
    {
        foreach ($headers as $header => $value) {
            curl_setopt($this->_instance, $header, $value);
        }
        return $this;
    }

    public function send()
    {
        return curl_exec($this->_instance);
    }

    public static function getContent($url)
    {
        $client = HTTPClient::getInstance($url);
        $client->setHeader(
            array(
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1
            )
        );
        return $client->send();
    }
}
