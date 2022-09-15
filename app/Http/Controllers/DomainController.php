<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Iodev\Whois\Factory;

class DomainController extends Controller
{
    public function index(Request  $request){

        $domain = $request->domainName;
      
        $whois = Factory::get()->createWhois();

        $info = $whois->loadDomainInfo($domain);
       
        if(isset($info)){
            $domainCreated = date("Y-m-d", $info->creationDate);
            $domainOwner = $info->owner;
            return response()->json([
                'domainCreated' => $domainCreated,
                'isFredom'=> 'no',
            ]);
        }else{
            return response()->json([
                'domainCreated' => 'none',
                'isFredom'=> 'yes',
            ]);
        }

        return $info->owner;

    }

}
