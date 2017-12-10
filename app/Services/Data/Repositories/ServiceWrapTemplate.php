<?php
namespace App\Services\Data\Repositories;

use App\Services\Data\Repositories\ServiceTemplate;
use App\Services\Data\Repositories\ServiceWrapTemplateInterface;

class ServiceWrapTemplate implements ServiceWrapTemplateInterface
{
    protected $template;
    protected $filename;

    public function __construct(ServiceTemplate $template)
    {
        $this->template = $template;
    }
    public function setConfigFile($filename)
    {
        return $this->template->setConfigFile($filename);
    }
    public function generateFrom($filename = '', $node = array())
    {
        if (!empty($filename)) {
            $this->template->setConfigFile($filename);
        }
        if (!empty($node)) {
            $this->injectionNode($node);
        }
        return $this->template->generateInput();
    }
    public function injectionNode($node = array())
    {
        return $this->template->injectionNode($node);
    }
    public function setFormType($formtype = '')
    {
        return $this->template->setFormType($formtype);
    }
    public function recapValue($data = array())
    {
        return $this->template->recapValue($data);
    }
    public function initial($formtype = '', $config = '')
    {
        $this->template->setFormType($formtype);
        $this->template->setConfigFile($config);
        $this->template->recapValue(\Request::all());
        return $this;
    }

}
