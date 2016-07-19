<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Configuration;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public $key, $route, $fields, $CUSTOMREQUEST;
    public function __construct(Configuration $configuration)
    {    
        $this->key = $configuration->find(1)->key;
    }
    function api_objects(){
        $curl = curl_init('https://api.blockscore.com/'.$this->route);
        curl_setopt($curl,CURLOPT_USERPWD, $this->key);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        	"Api-Key: ".$this->key,
            "Accept: application/vnd.blockscore+json;version=4"));
        if (!empty($this->CUSTOMREQUEST)){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->CUSTOMREQUEST );
        }
        if (!empty($this->fields)) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->fields);
            $resul=curl_exec($curl);
            $data = $resul;
            return $data;
        }else{
            
            $resul=curl_exec($curl);
            $data = (object) json_decode($resul);
            return $data;
        }
    }
}
