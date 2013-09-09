<?php

namespace JVMail\Options;

use Zend\Stdlib\Hydrator\ClassMethods;

use Zend\Mime\Mime;

class MailOptions implements MailOptionsInterface
{
    /**
     * @var string $type
     */
    protected $type;
    
    /**
     * @var Zend\Mime\Mime $htmlEncoding
     */
    protected $htmlEncoding;
    
    /**
     * @var string $messageEncoding
     */
    protected $messageEncoding;
    
    /**
     * @var array $bcc
     */
    protected $bcc = array();
    
    /**
     * @param array $valueOptions
     */
    public function __construct(array $valueOptions)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($valueOptions, $this);
    }

    /**
     * @see \JVMail\Options\MailOptionsInterface::getType()
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param String $type ex.: 'text' or 'text/html'
     * @see \JVMail\Options\MailOptionsInterface::setType()
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getHtmlEncoding()
    {
        return $this->htmlEncoding;
    }

    public function setHtmlEncoding($htmlEncoding)
    {
        $this->htmlEncoding = $htmlEncoding;
    }

    public function getMessageEncoding()
    {
        return $this->messageEncoding;
    }

    /**
     * @param string $messageEncoding
     */
    public function setMessageEncoding($messageEncoding)
    {
        $this->messageEncoding = $messageEncoding;
    }

    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param array $bcc
     */
    public function setBcc(array $bcc)
    {
        $this->bcc = $bcc;
    }
}