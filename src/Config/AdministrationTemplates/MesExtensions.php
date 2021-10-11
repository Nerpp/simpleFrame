<?php
namespace App\Config\AdministrationTemplates;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MesExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('activeClass', [$this, 'activeClass'], ['needs_context' => true])
        ];
    }

    public function activeClass(array $context, $page){

        if (isset($context['current_page']) && $context['current_page'] === $page ) {
            return ' active ';
        }

    }

    public function getFilters() { 
        return [ 
                new TwigFilter('html_decode', array($this, 'html_decode')), // base64_encode => name of custom filter, base64_en => name of function to execute when this filter is called.
               
        ];
        }
    
        public function html_decode($input)
        {
           return html_entity_decode($input, ENT_QUOTES);
        }
}
