<?php


namespace core;


class Request
{

    private $realUrl = '';
    private $formattedUrl = '';
    private $method = '';
    private $parameters = [];

    public function __construct() {
        $this->realUrl = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function setFormattedUrl($url) {
        $url = str_replace('/mvc/public/', '', $url);
        if (strlen($url) === 0) $request_url = '/';
        return $url;
    }

    public function getRealUrl() {
        return $this->realUrl;
    }

    public function setParams($params) {
        $this->parameters = $params;
    }
    
    public function getParams() {
        return $this->parameters;
    }

    public function getParam($name) {
        return $this->parameters[$name];
    }

    public function getFormattedUrl() {
        return $this->formattedUrl;
    }

    public function getMethod() {
        return $this->method;
    }

}