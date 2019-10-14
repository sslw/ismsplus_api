<?php


namespace lib;


interface Isms
{
    public function makeParams($msisdn, $messageBody, $csmsId);
    public function callApi();
    public function setApiToken($apiKey);
    public function getApiToken();
    public function setSid($sid);
    public function getSid();
    public function setUrl($url);
    public function getUrl();

}
