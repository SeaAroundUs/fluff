<?php

require __DIR__ . '/aws.phar';

use Aws\Ses\SesClient as Ses;

const SOURCE = 'feedback@seaaroundus.org';
const DEST = 'feedback@seaaroundus.org';

function sendSesMail($subject, $body) {
    // create the AWS SES client
    $sesClient = Ses::factory(array(
        'profile' => 'sea-around-us',
        'region'  => 'us-west-2'
    ));

    $result = $sesClient->sendEmail(array(
        'Source' => SOURCE,
        'Destination' => array(
            'ToAddresses' => array(DEST),
        ),
        'Message' => array(
            'Subject' => array('Data' => $subject),
            'Body' => array(
                'Html' => array('Data' => $body),
            ),
        ),
        'ReplyToAddresses' => array(SOURCE),
        'ReturnPath' => SOURCE
    ));
    return $result;
}
