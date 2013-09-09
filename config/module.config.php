<?php

return array(
    'JVMail' => array(
        'transport' => array(
            'smtpOptions' => array(
                'host' => 'smtp.domain.com',
                'port' => 587,
                'connection_class' => 'plain',
                'connection_config' => array(
                    'username' => 'user@domain.com',
                    'password' => 'password',
                    'from' => 'anyemail@domain.com'
                ),
            ),
            'transportSsl' => array(
                'use_ssl' => false,
                'connection_type' => 'tls' // ssl, tls
            ),
        ),
        'options' => array(
            'type' => 'text/html',
            'html_encoding' => \Zend\Mime\Mime::ENCODING_8BIT,
            'message_encoding' => 'UTF8'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'jvmail-transport' => 'JVMail\Factory\SmtpTransport',
            'jvmail-template'  => 'JVMail\Factory\Template',
            'jvmail-options'  => 'JVMail\Factory\Options',
        )
    )
);