<?php

namespace JVMail\Service;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Model\ViewModel;

class Template implements TemplateInterface
{
    protected $folderTemplate = 'mailtemplates';
    protected $view;
    
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->view = $serviceLocator->get('View');
    }
    
    public function render($mailTemplate, array $data)
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate("{$this->getFolderTemplate()}/{$mailTemplate}.phtml");
        $viewModel->setOption('has_parent', true);
        $viewModel->setVariables($data);
        
        return $this->view->render($viewModel);
    }

    public function getFolderTemplate()
    {
        return $this->folderTemplate;
    }

    public function setFolderTemplate($folderTemplate)
    {
        $this->folderTemplate = $folderTemplate;
    }
}