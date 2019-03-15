<?php

class Curl
{
    public $response = null, $status = 0, $host = '', $url = '';
    protected $path = '/', $method = 'GET', $header = array(), $curl;
    function __construct($host = '', $method = 'GET', array $header = [])
    {
        $this->host = $host;
        $this->header = $header;
        $this->method = $method;
    }

    function set_header($name, $value)
    {
        return array_push($this->header, $name . ': ' . $value);
    }

    function send(string $path)
    {
        $this->path = $path;
        $this->url = $this->host . $this->path;
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        $this->response = curl_exec($this->curl);
        $this->status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        curl_close($this->curl);
    }
}