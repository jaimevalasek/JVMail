<?php

namespace JVMail\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface,
    JVMail\Service\Mail as ServiceMail,
    Zend\Mail\Transport\SmtpOptions,
    Zend\Mail\Transport\Smtp;

class Mail implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
       return new ServiceMail($serviceLocator);
    }
}