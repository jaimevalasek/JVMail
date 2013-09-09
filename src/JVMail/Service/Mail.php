<?php

namespace JVMail\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Message;

class Mail implements MailInterface
{
    protected $transport;
    protected $options;
    protected $template;
    
    protected $subject;
    protected $to;
    protected $data;
    protected $viewTemplate;
    
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->transport = $serviceLocator->get('jvmail-transport');
        $this->options = $serviceLocator->get('jvmail-options');
        $this->template = $serviceLocator->get('jvmail-template');
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        
        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;
        
        return $this;
    }
    public function setViewTemplate($viewTemplate)
    {
        $this->viewTemplate = $viewTemplate;
        
        return $this;
    }
    
    public function execute() {
        $html = new MimePart($this->template->render($this->viewTemplate, $this->data));
        $html->type = $this->options->getType();
        $html->encoding = $this->options->getHtmlEncoding();
    
        $body = new MimeMessage();
        $body->setParts(array($html));
    
        $config = $this->transport->getOptions()->toArray();
    
        $message = new Message();
        $message->addFrom($config['connection_config']['from'])
            ->addTo($this->to)
            ->setSubject($this->subject)
            ->setBody($body)
            ->setEncoding($this->options->getMessageEncoding());
        
        if (count($this->options->getBcc())) {
            $message->addBcc($this->options->getBcc());
        }
            
        return $message;
    }
    
    public function send()
    {
        $this->transport->send($this->execute());
    }

}