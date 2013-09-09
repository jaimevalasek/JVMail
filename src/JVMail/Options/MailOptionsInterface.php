<?php

namespace JVMail\Options;

interface MailOptionsInterface
{
    public function getType();
    public function getHtmlEncoding();
    public function getMessageEncoding();
    public function getBcc();

    public function setType($type);
    public function setHtmlEncoding($htmlEncoding);
    public function setMessageEncoding($messageEncoding);
    public function setBcc(array $bcc);
}