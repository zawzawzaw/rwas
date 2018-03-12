<?php

namespace App\Http\Controllers\V1;

use Cookie;
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

        if(isset($result->errCode)){
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
            $request->session()->put('drsUserID', $input['id']);
            Cookie::queue("drsUserID", $input['id'], 172000);
            return redirect()->route('user.account');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->pull('drsAuth', 'default');
        $request->session()->pull('drsUserID', 'default');
        Cookie::queue("drsUserID", "1", -172000);
        return redirect()->route('user.account');
    }

    public function account(Request $request)
    {
        $info = app('App\Http\Controllers\V1\Api\UserController')->get_user($request, true, true);
        return view('pages/account/dashboard')->withInfo($info['data'])->withRaw($info['raw']);
    }

    public function editProfile(Request $request)
    {
        app('App\Http\Controllers\V1\Api\UserController')->setPreferenceFlag($request, true);
        $info = app('App\Http\Controllers\V1\Api\UserController')->get_user($request, true, true);
        // print_r($info); exit();
        return view('pages/account/edit-profile')->withInfo($info['data']);
    }
}
