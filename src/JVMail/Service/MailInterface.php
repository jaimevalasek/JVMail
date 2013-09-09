<?php

namespace JVMail\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

interface MailInterface
{
    public function setSubject($subject);
    public function setTo($to);
    public function setData($data);
    public function setViewTemplate($viewTemplate);
    public function execute();
    public function send();
}