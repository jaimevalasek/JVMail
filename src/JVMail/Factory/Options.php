<?php

namespace JVMail\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface,
    JVMail\Options\MailOptions;

class Options implements FactoryInterface
{
    /**
     * @param $serviceLocator ServiceLocatorInterface
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        
        if (isset($config['JVMail']['options'])) {
            $valueOptions = $config['JVMail']['options'];
            $options = new MailOptions($valueOptions);
            
            return $options;
        } else {
            throw new Exception('Erro ao carregar o arquivo de configuração com as opções');
        }
    }
}