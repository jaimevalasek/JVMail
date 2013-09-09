<?php

namespace JVMail\Factory;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\FactoryInterface,
    Zend\Mail\Transport\SmtpOptions,
    Zend\Mail\Transport\Smtp;

class SmtpTransport implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        
        if (isset($config['JVMail']['transport']['smtpOptions'])) {
            $valuesOptions = $config['JVMail']['transport']['smtpOptions'];
            $transportSslOptions = $config['JVMail']['transport']['transportSsl'];
            
            if ($transportSslOptions['use_ssl'])
                $valuesOptions['connection_config']['ssl'] = $transportSslOptions['connection_type'];
            
            $smtpOptions = new SmtpOptions($valuesOptions);
            $transport = new Smtp($smtpOptions);
        } else {
            throw new \Exception('Você precisa configurar o STMP Options no module.config.php');
        }
        
        return $transport;
    }
}