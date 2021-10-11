<?php
namespace App\Config\Security;

class Filter
{
    private $_aParameters = [];

    public function __setParameters()
    {
        return $this->_aParameters;
    }

    // public function __construct()
    // {
        // $valueReceived = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        // $path = ltrim($valueReceived, '/');
        // $elements = explode('/', $path);

        // $cleanedUrl[] = $elements[1]; 
        // var_dump(INPUT_POST);
        // // $this->_aParameters = $cleanedUrl;
        // $this->listen($cleanedUrl);
        // $this->listen();
      
    // }


    public function stringFilter(string $filter)
    {
       return filter_var($filter, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    }

    public function cleanPost()
    {
       // $args = array(
        //     'p'    => FILTER_SANITIZE_STRING,
        //     'fname'    => FILTER_SANITIZE_STRING,
        //     'nom'    => FILTER_SANITIZE_STRING,
        //     'prenom'    => FILTER_SANITIZE_STRING,
        //     'token'    => FILTER_SANITIZE_STRING,
        //     'telephone'    => FILTER_SANITIZE_STRING,
        //     'reponse'    => FILTER_SANITIZE_STRING,
        //     'message'    => FILTER_SANITIZE_STRING,
        //     'mail'    => FILTER_SANITIZE_EMAIL,
        //     'mail'    => FILTER_VALIDATE_EMAIL,
        // );   

        // foreach ($_POST as $post) {
            // $postParam[] = filter_input(INPUT_POST,FILTER_SANITIZE_ENCODED,FILTER_REQUIRE_ARRAY);
        // }
    
    }
    private function listen( $requestType)
    {
       
        //  $this->_aParameters = $requestType;

        

        // $args = array(
        //     'p'    => FILTER_SANITIZE_STRING,
        //     'fname'    => FILTER_SANITIZE_STRING,
        //     'nom'    => FILTER_SANITIZE_STRING,
        //     'prenom'    => FILTER_SANITIZE_STRING,
        //     'token'    => FILTER_SANITIZE_STRING,
        //     'telephone'    => FILTER_SANITIZE_STRING,
        //     'reponse'    => FILTER_SANITIZE_STRING,
        //     'message'    => FILTER_SANITIZE_STRING,
        //     'mail'    => FILTER_SANITIZE_EMAIL,
        //     'mail'    => FILTER_VALIDATE_EMAIL,
            
        // );

        // $test =  filter_input_array(INPUT_POST, $args);

        // var_dump($test);

        // switch ($requestType) {
        //     case 'GET':
        //         $this->_aParameters =  filter_input_array(INPUT_GET, $args);
        //         if (!empty($this->_aParameters)) {
        //             //je netttoie les variables non utilisé avec array_filter
        //             $this->_aParameters = array_filter($this->_aParameters);
        //             var_dump($this->_aParameters['p']);
        //             return;
        //         }
        //         $this->_aParameters = [];
        //         break;

        //     case 'POST':
        //         $this->_aParameters =  filter_input_array(INPUT_POST, $args);
        //         if (!empty($this->_aParameters)) {
        //             //je netttoie les variables non utilisé avec array_filter
        //             $this->_aParameters = array_filter($this->_aParameters);
        //             var_dump($this->_aParameters['p']);
        //             return;
        //         }
        //         $this->_aParameters = [];
        //         break;

        //     default:
        //         $this->_aParameters = [];
        //         break;
        // }
    }
}
