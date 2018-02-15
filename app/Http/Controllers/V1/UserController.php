<?php

namespace App\Http\Controllers\V1;

use Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->only('id', 'password', 'cid', 'pin', 'showErr');
        $validator = Validator::make($input, [
            'id' => 'required',
            'password' => 'required',
            'showErr' => 'nullable'
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }

        $parameter = [
            'paraDrsID' => 'MANIC',
            'paraDrsPwd' => 'MANIC',
            'paraCid' => $input['id'],
            'paraPIN' => $input['password']
        ];

        $result = $this->curlRequest($this->buildDrsXMLContent($parameter), $this->drsUrl.'API_AutoUA_PINVerify', true);

        if($result->errCode){
            if(isset($input['showErr']) && is_null($input['showErr'])==false){
                echo "<pre>";
                print_r($result);
                echo "</pre>";
                die();
            }
            $validator->errors()->add('customErr', 'Wrong id, password, cid or pin!');
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $request->session()->put('drsAuth', 1);
            return redirect()->route('user.account');
        }
    }
}
