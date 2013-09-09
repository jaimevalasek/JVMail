<?php

namespace JVMail\Factory;

use JVMail\Service\Mail;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface,
    Zend\Mail\Transport\SmtpOptions,
    Zend\Mail\Transport\Smtp;

class Mail implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
       return new Mail($serviceLocator);
    }
}