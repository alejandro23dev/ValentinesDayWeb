<?php

namespace App\Controllers;

use App\Models\MainModel;
use App\Models\LoginModel;

class Login extends BaseController
{
    protected $objSession;
    protected $objMainModel;
    protected $objLoginModel;
    protected $objRequest;

    public function __construct()
    {
        // SESSION
        $this->objSession = session();
        $this->objSession->set('user', []);

        //MODELS
        $this->objMainModel = new MainModel;
        $this->objLoginModel = new LoginModel;

        //REQUEST
        $this->objRequest = \Config\Services::request();
    }

    public function index()
    {
        $session = $this->request->getGet('session');

        $data = array();
        $data['uniqid'] = uniqid();
        $data['page'] = 'login/index';
        $data['session'] = $session;
        return view('home/header', $data);
    }

    public function registerUser()
    {
        $data = array();
        #params
        $name = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $link =  COMPANY_MARK . $this->objRequest->getPost('link');

        $verifyUser = $this->objLoginModel->loginUserGive($name, $link);

        if ($verifyUser['error'] == 0)
            return json_encode('EXISTS_LINK');
        elseif ($verifyUser['error'] == 1) {
            $verifyLinks = $this->objMainModel->objData('usergive', 'link', $link);
            if (empty($verifyLinks)) {
                $data['name'] =  $name;
                $data['link'] =  $link;
                $this->objMainModel->objCreate('usergive', $data);
                $this->objMainModel->objCreate('userobtain', array('name' => $name, 'link' => $link));
                # Create Session
                $session = array();
                $session['name'] = $name;
                $session['link'] = $link;
                $this->objSession->set('user', $session);
            } else
                return json_encode('EXISTS_LINK');
        }
        return json_encode(0);
    }

    public function loginUserGive()
    {
        #params
        $name = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $link = COMPANY_MARK . $this->objRequest->getPost('link');

        $verifyUser = $this->objLoginModel->loginUserGive($name, $link);

        if ($verifyUser['error'] == 0) {
            # Create Session
            $session = array();
            $session['name'] = $name;
            $session['link'] = $link;
            $this->objSession->set('user', $session);
            return json_encode(0);
        } else
            return json_encode('USER_NOT_FOUND');
    }

    public function loginUserObtain()
    {
        #params
        $name = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $link = COMPANY_MARK . $this->objRequest->getPost('link');

        $verifyUser = $this->objLoginModel->loginUserObtain($name, $link);

        if ($verifyUser['error'] == 0) {
            # Create Session
            $session = array();
            $session['name'] = $name;
            $session['link'] = $link;
            $this->objSession->set('user', $session);
            return json_encode(0);
        } else
            return json_encode('USER_NOT_FOUND');
    }
}
