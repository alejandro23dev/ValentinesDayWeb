<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function loginUserGive($name, $link, $password)
    {
        $query = $this->db->table('usergive')
            ->where('name', $name)
            ->where('link', $link);

        $data = $query->get()->getResult();
        $result = array();

        if (empty($data)) {
            $result['error'] = 1;
            $result['msg'] = 'USER_NOT_FOUND';
            return $result;
        }

        if (password_verify($password, $data[0]->password)) {
            $result['error'] = 0;
            $result['data'] = $data[0];
        } else {
            $result['error'] = 1;
            $result['msg'] = 'INVALID_PASSWORD';
        }

        return $result;
    }

    public function verifyExistsUserGive($name, $link)
    {
        $query = $this->db->table('usergive')
            ->where('name', $name)
            ->where('link', $link);

        $data = $query->get()->getResult();
        $result = array();

        if (empty($data)) {
            $result['error'] = 0;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function loginUserObtain($name, $link, $password)
    {
        $query = $this->db->table('userobtain')
            ->where('name', $name)
            ->where('link', $link);

        $data = $query->get()->getResult();
        $result = array();

        if (empty($data)) {
            $result['error'] = 1;
            $result['msg'] = 'USER_NOT_FOUND';
            return $result;
        }

        if (password_verify($password, $data[0]->password)) {
            $result['error'] = 0;
            $result['data'] = $data[0];
        } else {
            $result['error'] = 1;
            $result['msg'] = 'INVALID_PASSWORD';
        }

        return $result;
    }
}
