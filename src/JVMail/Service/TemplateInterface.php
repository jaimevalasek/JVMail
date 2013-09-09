<?php

namespace JVMail\Service;

interface TemplateInterface
{
    /**
     * @param string $mailTemplate mailtemplate.phtml
     * @param array $data data contents
     */
    public function render($mailTemplate, array $data);
    public function getFolderTemplate();
    public function setFolderTemplate($folderTemplate);
}