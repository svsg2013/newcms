<?php

return [
    'lead' => [
        'URLCheckLead' => 'https://apipreprod.easycredit.vn/api/leadServices/v1/leadEligibilityChecking'
    ],
    'createLead' => [
        'URLCreateLead' => 'https://apipreprod.easycredit.vn/api/leadServices/v1/eligibleLeadInfo'
    ],
    'sendOTPUrl' => 'https://apipreprod.easycredit.vn/api/smsServices/v1/sendMessages',
    'checkOTP' => 'https://apipreprod.easycredit.vn/api/smsServices/v1/checkotp',
    'apiUrl' => 'https://apipreprod.easycredit.vn/api/',
    'Calculator' => [
        'PartnerCode' => 'ACT',
        'ScoreRange' => '0-0',
        'ProductCode' => 'SCL',
        'Source' => 'sms',
    ],
    'Personal' => [
        'PartnerCode' => 'ECD2',
        'ScoreRange' => '0-0',
        'ProductCode' => 'SCL',
        'Source' => 'sms'
    ],
    'ClientId' => 'landing_client',
    'ClientSecret' => 'veaYWPb8mDlfaY9TUUzX',
    'OTPClientId' => 'landing_client_sms',
    'OTPClientSecret' => '9nMtYjCqRlKBV7htUTQZXrlkCxlUTG',
    'token' => [
        'URLToken' => 'https://apipreprod.easycredit.vn/api/uaa/oauth/token'
    ],
    'CalculatorThree' => [
        'PartnerCode' => 'CHIN',
        'ScoreRange' => '0-0',
        'ProductCode' => 'SCL',
        'Source' => 'sms',
    ],
];