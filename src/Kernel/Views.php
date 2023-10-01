<?php
namespace Benoi\GestionDeProjet\Kernel;

use Benoi\GestionDeProjet\Configuration\Config;

class Views
{
    public string $html;

    public function setHtml(string $html):self
    {
        $this->html = Config::VIEWS.$html;
        return $this;
    }

    public function render(array $vars = [], ?string $html=null)
    {
        if ($html !== null) {
            $this->html = $html;
        }        
        extract($vars);
        include(dirname(__FILE__)."/../".$this->html);
    }
}