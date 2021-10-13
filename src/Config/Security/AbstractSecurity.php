<?php
namespace App\Config\Security;

class AbstractSecurity 
{
    
   protected function getPost(array $receipted, array $args)
   {
       if (!empty($receipted)) {
        $args =  filter_input_array(INPUT_POST, $args);
        $args = array_filter($args);
        return $args;
       }
    return null;
   }
}
