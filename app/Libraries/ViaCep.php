

<?php

namespace App\Libraries;

use App\Libraries\GuzzleRequests;

class ViaCep{
    public $cep;

    public function sendAPIRequest($type){
        $apiRequest = new GuzzleRequests();
        $apiRequest->uri         = $this->endpoint;

        switch($type){
            case 'get':
                return $apiRequest->getRequest();
            break;
        }
    }

    public function checkCep(){
        $this->endpoint = "https://viacep.com.br/ws/".$this->cep."/json";
        $request = $this->sendAPIRequest('get');
        switch($request->status_code){
            case 200:
                return (object) $request->body;
            break;
            default:
                return null;
            break;
        }
    }

}

