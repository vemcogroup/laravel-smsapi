<?php

namespace Vemcogroup\SmsApi;

use Smsapi\Client\Curl\SmsapiHttpClient;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;
use Smsapi\Client\Feature\Sms\Data\Sms;
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
            $serviceVersion = config('smsapi.version');

            if ('pl' === strtolower($serviceVersion)) {
                $service = (new SmsapiHttpClient())->smsapiPlService($apiToken);
            } else {
                $service = (new SmsapiHttpClient())->smsapiComService($apiToken);
            }

            return $service->smsFeature()->sendSms($sms);
        } catch(SmsApiException $e) {
            throw SmsApiException::communicationError($e->getMessage());
        }
    }
}
