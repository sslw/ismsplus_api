<?php


namespace Ssl\Isms;


class SMS extends SmsAbstract
{

    public function __construct()
    {
        $this->setApiToken(config('isms.api_token'));
        $this->setSid(config('isms.sid'));
    }

    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return string
     */
    public function single($msisdn, $messageBody, $csmsId)
    {
        $this->makeParams($msisdn, $messageBody, $csmsId);
        $this->setUrl("/send-sms");
        return $this->callApi();
    }

    /**
     * @param $msisdns
     * @param $messageBody
     * @param $batchId
     * @return string
     */
    public function bulk($msisdns, $messageBody, $batchId)
    {
        $this->makeBulkParams($msisdns, $messageBody, $batchId);
        $this->setUrl("/send-sms");
        return $this->callApi();
    }

    /**
     * @param array $messageData
     * @return string
     */
    public function dynamic(array $messageData)
    {
        $this->makeDynamicParams($messageData);
        $this->setUrl("/send-sms");
        return $this->callApi();
    }

}
