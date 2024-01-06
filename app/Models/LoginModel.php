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

    public function loginUserGive($name, $link)
    {
        $query = $this->db->table('usergive')
            ->where('name', $name)
            ->where('link', $link);

        $data = $query->get()->getResult();
        $result = array();

        if (empty($data))
            $result['error'] = 1;
        else
            $result['error'] = 0;

        return $result;
    }

    public function loginUserObtain($name, $link)
    {
        $query = $this->db->table('userobtain')
            ->where('name', $name)
            ->where('link', $link);

        $data = $query->get()->getResult();
        $result = array();

        if (empty($data))
            $result['error'] = 1;
        else
            $result['error'] = 0;

        return $result;
    }

}
