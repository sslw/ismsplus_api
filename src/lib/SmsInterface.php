<?php


namespace Ssl\Isms;


interface SmsInterface
{
    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return mixed
     */
    public function makeParams($msisdn, $messageBody, $csmsId);

    /**
     * @return mixed
     */
    public function callApi();

    /**
     * @param $apiKey
     * @return void
     */
    public function setApiToken($apiKey);

    /**
     * @return string
     */
    public function getApiToken();

    /**
     * @param $sid
     * @return void
     */
    public function setSid($sid);

    /**
     * @return mixed
     */
    public function getSid();

    /**
     * @param $url
     * @return void
     */
    public function setUrl($url);

    /**
     * @return mixed
     */
    public function getUrl();

}
