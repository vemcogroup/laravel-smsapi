<?php

namespace Vemcogroup\SmsApi;

use Smsapi\Client\Curl\SmsapiHttpClient;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use Vemcogroup\SmsApi\Exceptions\SmsApiException;

class SmsApi
{
    public static function send($to, $from, $message): Sms
    {
        try {
            $apiToken = config('smsapi.token');

            $sms = SendSmsBag::withMessage($to, $message);
            $sms->from = $from;
            $sms->normalize = true;

            $service = (new SmsapiHttpClient())->smsapiComService($apiToken);

            return $service->smsFeature()->sendSms($sms);
        } catch(SmsApiException $e) {
            throw SmsApiException::communicationError($e->getMessage());
        }
    }
}
