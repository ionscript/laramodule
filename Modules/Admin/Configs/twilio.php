<?php
declare(strict_types=1);

return [
    'applications' => [
        'applications' => [
            'FriendlyName' => null,
            'ApiVersion' => null,
            'VoiceUrl' => null,
            'VoiceMethod' => null,
            'VoiceFallbackUrl' => null,
            'VoiceFallbackMethod' => null,
            'StatusCallback' => null,
            'StatusCallbackMethod' => null,
            'VoiceCallerIdLookup' => null,
            'SmsUrl' => null,
            'SmsMethod' => null,
            'SmsFallbackUrl' => null,
            'SmsFallbackMethod' => null,
            'SmsStatusCallback' => null,
            'MessageStatusCallback' => null,
        ],
        'connect_apps' => [
            'AuthorizeRedirectUrl' => null,
            'CompanyName' => null,
            'DeauthorizeCallbackMethod' => null,
            'DeauthorizeCallbackUrl' => null,
            'Description' => null,
            'FriendlyName' => null,
            'HomepageUrl' => null,
            'Permissions' => null,
        ],
        'authorized_connect_apps' => [

        ],
        'api_keys' => [

        ],
        'signing_keys' => [

        ]
    ],

    'accounts' => [
        'accounts' => [
            'friendlyName' => null,
            'status' => null
        ]
    ],
    'phone_numbers' => [
        'incoming_phone_numbers' => [
            'PhoneNumber' => null,
            'AreaCode' => null,
            'ApiVersion' => null,
            'FriendlyName' => null,
            'SmsApplicationSid' => null,
            'SmsFallbackMethod' => null,
            'SmsFallbackUrl' => null,
            'SmsMethod' => null,
            'SmsUrl' => null,
            'StatusCallback' => null,
            'StatusCallbackMethod' => null,
            'VoiceApplicationSid' => null,
            'VoiceCallerIdLookup' => null,
            'VoiceFallbackMethod' => null,
            'VoiceFallbackUrl' => null,
            'VoiceMethod' => null,
            'VoiceUrl' => null,
            'EmergencyStatus' => null,
            'EmergencyAddressSid' => null,
            'TrunkSid' => null,
            'IdentitySid' => null,
            'AddressSid' => null,
            'VoiceReceiveMode' => null,
            'BundleSid' => null,
        ],
        'available_phone_numbers' => [
            'countryCode' => null,
            'areaCode' => null,
            'contains' => null,
            'smsEnabled' => null,
            'mmsEnabled' => null,
            'voiceEnabled' => null,
            'excludeAllAddressRequired' => null,
            'excludeLocalAddressRequired' => null,
            'excludeForeignAddressRequired' => null,
            'beta' => null,
            'nearNumber' => null,
            'nearLatLong' => null,
            'distance' => null,
            'inPostalCode' => null,
            'inRegion' => null,
            'inRateCenter' => null,
            'iinLata' => null,
            'inLocality' => null,
            'faxEnabled' => null,
        ],
        'addresses' => [
            'customerName' => null,
            'street' => null,
            'city' => null,
            'region' => null,
            'postalCode' => null,
            'isoCountry' => null,
            'friendlyName' => null,
            'emergencyEnabled' => null,
            'autoCorrectAddress' => null
        ],
        'short_codes' => [
            'friendlyName' => null,
            'apiVersion' => null,
            'smsUrl' => null,
            'smsMethod' => null,
            'smsFallbackUrl' => null,
            'smsFallbackMethod' => null
        ],
        'outgoing_caller_ids' => [
            'phoneNumber' => null,
            'friendlyName' => null,
            'callDelay' => null,
            'extension' => null,
            'statusCallback' => null,
            'statusCallbackMethod' => null
        ],
    ],
    'voice' => [
        'calls' => [
            'Url' => null,
            'Twiml' => null,
            'ApplicationSid' => null,
            'Method' => null,
            'FallbackUrl' => null,
            'FallbackMethod' => null,
            'StatusCallback' => null,
            'StatusCallbackEvent' => null,
            'StatusCallbackMethod' => null,
            'SendDigits' => null,
            'Timeout' => null,
            'Record' => null,
            'RecordingChannels' => null,
            'RecordingStatusCallback' => null,
            'RecordingStatusCallbackMethod' => null,
            'SipAuthUsername' => null,
            'SipAuthPassword' => null,
            'MachineDetection' => null,
            'MachineDetectionTimeout' => null,
            'RecordingStatusCallbackEvent' => null,
            'Trim' => null,
            'CallerId' => null,
            'MachineDetectionSpeechThreshold' => null,
            'MachineDetectionSpeechEndThreshold' => null,
            'MachineDetectionSilenceTimeout' => null,
            'AsyncAmd' => null,
            'AsyncAmdStatusCallback' => null,
            'AsyncAmdStatusCallbackMethod' => null,
            'Byoc' => null,
            'CallReason' => null
        ]
    ],
    'fax' => [
        'fax' => [
            'to' => null,
            'mediaUrl' => null,
            'quality' => null,
            'statusCallback' => null,
            'from' => null,
            'sipAuthUsername' => null,
            'sipAuthPassword' => null,
            'storeMedia' => null,
            'ttl' => null
        ],
        'media' => [
            'faxSid' => null,
            'sid' => null
        ],
    ],
    'sms' => [
        'messages' => [
            'to' => null,
            'statusCallback' => null,
            'applicationSid' => null,
            'maxPrice' => null,
            'provideFeedback' => null,
            'attempt' => null,
            'validityPeriod' => null,
            'forceDelivery' => null,
            'contentRetention' => null,
            'addressRetention' => null,
            'smartEncoded' => null,
            'persistentAction' => null,
            'from' => null,
            'messagingServiceSid' => null,
            'body' => null,
            'mediaUrl' => null
        ]
    ],
    'video' => [
        'rooms' => [
            'sid' => null,
            'status' => null,
            'enableTurn' => null,
            'type' => null,
            'uniqueName' => null,
            'statusCallback' => null,
            'statusCallbackMethod' => null,
            'maxParticipants' => null,
            'recordParticipantsOnConnect' => null,
            'videoCodecs' => null,
            'mediaRegion' => null
        ],
        'recordings' => [
            'status' => null,
            'sourceSid' => null,
            'groupingSid' => null,
            'dateCreatedAfter' => null,
            'dateCreatedBefore' => null,
            'mediaType' => null
        ],
    ],
    'sip' => [
        'domains' => [
            'domainName' => null,
            'friendlyName' => null,
            'voiceUrl' => null,
            'voiceMethod' => null,
            'voiceFallbackUrl' => null,
            'voiceFallbackMethod' => null,
            'voiceStatusCallbackUrl' => null,
            'voiceStatusCallbackMethod' => null,
            'sipRegistration' => null,
            'emergencyCallingEnabled' => null,
            'secure' => null,
            'byocTrunkSid' => null,
            'emergencyCallerSid' => null,
        ],
        'credential_lists' => [
            'friendlyName' => null
        ]
    ],
];
