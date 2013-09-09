<?php

namespace JVMail\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface,
    JVMail\Service\Template as ServiceTemplate;

class Template implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ServiceTemplate($serviceLocator);
    }
}