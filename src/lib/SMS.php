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
     * @return self
     */
    public function single($msisdn, $messageBody, $csmsId)
    {
        $this->makeParams($msisdn, $messageBody, $csmsId);
        $this->setUrl("/send-sms");
        return $this;
    }

    /**
     * @param $msisdns
     * @param $messageBody
     * @param $batchId
     * @return self
     */
    public function bulk($msisdns, $messageBody, $batchId)
    {
        $this->makeBulkParams($msisdns, $messageBody, $batchId);
        $this->setUrl("/send-sms/bulk");
        return $this;
    }

    /**
     * @param array $messageData
     * @return self
     */
    public function dynamic(array $messageData)
    {
        $this->makeDynamicParams($messageData);
        $this->setUrl("/send-sms/dynamic");
        return $this;
    }

    /**
     * @param array $messageData
     * @return string
     */

    public function send()
    {
        return $this->callApi();
    }
}
