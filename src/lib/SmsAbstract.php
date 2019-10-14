<?php


namespace Ssl\Isms;


class SmsAbstract implements Isms
{
    private $params = '';
    private $url = '';
    private $sid;
    private $apiToken;

    /**
     * @param $msisdn
     * @param $messageBody
     * @param $csmsId
     * @return false|string
     */
    public function makeParams($msisdn, $messageBody, $csmsId)
    {

        $params = [
            "api_token" => $this->getApiToken(),
            "sid" => $this->getSid(),
            "msisdn" => $msisdn,
            "sms" => $messageBody,
            "csms_id" => $csmsId
        ];
        $this->params = json_encode($params);

        return $this->params;

    }

    /**
     * @param $msisdn
     * @param $batchId
     * @param $messageBody
     * @return false|string
     */
    public function makeBulkParams($msisdn, $batchId, $messageBody)
    {

        $params = [
            "api_token" => $this->getApiToken(),
            "sid" => $this->getSid(),
            "msisdn" => $msisdn,
            "sms" => $messageBody,
            "batch_csms_id" => $batchId
        ];

        $this->params = json_encode($params);

        return $this->params;

    }

    /**
     * @param $messageData
     * @return string
     */
    public function makeDynamicParams($messageData)
    {

        $params = [
            "api_token" => $this->getApiToken(),
            "sid" => $this->getSid(),
            "sms" => $messageData,
        ];

        $this->params = json_encode($params);

        return $this->params;
    }


    /**
     * @return string
     */
    public function callApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->params,
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
           $response =  "cURL Error #:" . $err;
        }

        return $response;
    }

    /**
     * @param $apiKey
     */
    public function setApiToken($apiKey)
    {
        $this->apiToken = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @param $sid
     */
    public function setSid($sid)
    {
        $this->sid = $sid;
    }

    /**
     * @return mixed
     */
    public function getSid()
    {
        return $this->sid;
    }


    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = rtrim(config('isms.url'), '/') . "/" . rtrim($url, "/");
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
