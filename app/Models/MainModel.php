<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function objCreate($table, $data)
    {
        $this->db->table($table)
            ->insert($data);

        $result = array();
        if ($this->db->resultID) {
            $result['error'] = 0;
            $result['id'] = $this->db->connID->insert_id;
        } else
            $result['error'] = 1;

        return $result;
    } // ok

    public function objUpdate($table, $data, $id)
    {
        $query = $this->db->table($table)
            ->where('id', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
            $result['id'] = $id;
        } else
            $result['error'] = 1;

        return $result;
    } // ok

    public function objDelete($table, $id)
    {
        $return = array();

        $query = $this->db->table($table)
            ->where('id', $id)
            ->delete();

        if ($query == true) {
            $return['error'] = 0;
            $return['msg'] = 'success';
        } else {
            $return['error'] = 0;
            $return['msg'] = 'error on delete record';
        }

        return $return;
    } // ok

    public function obtainRegalo($link)
    {
        $return = array();

        $query = $this->db->table('regalos')
            ->where('link', $link)
            ->update(array('obtain' => 1));

        if ($query == true)
            $return['error'] = 0;
        else {
            $return['error'] = 0;
            $return['msg'] = 'error on delete record';
        }

        return $return;
    }

    public function deleteRegalo($link,$id)
    {
        $return = array();

        $query = $this->db->table('regalos')
            ->where('link', $link)
            ->where('id', $id)
            ->update(array('deleted' => 1));

        if ($query == true)
            $return['error'] = 0;
        else {
            $return['error'] = 0;
            $return['msg'] = 'error on delete record';
        }

        return $return;
    }

    public function objData($table, $field = null, $value = null, $field2 = null, $value2 = null)
    {
        $query = $this->db->table($table);

        if (!empty($field))
            $query->where($field, $value);
        if (!empty($field2))
            $query->where($field2, $value2);

        return $query->get()->getResult();
    } // ok


    public function getRegalos($link)
    {
        $query = $this->db->table('regalos')
            ->where('link', $link)
            ->where('obtain', 0)
            ->where('deleted', 0);

        return $query->get()->getResult();
    }

    public function objCheckDuplicate($table, $field, $value, $id = null)
    {
        $query = $this->db->table($table)
            ->where($field, $value);

        if (!empty($id))
            $query->whereNotIn('id', [0 => $id]);

        return $query->get()->getResult();
    } // ok

    public function uploadFile($table, $id, $field, $file)
    {
        $fileContent = file_get_contents($file['tmp_name']);

        $data = array(
            $field => $fileContent
        );

        $query = $this->db->table($table)
            ->where('id', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
        } else {
            $result['error'] = 1;
            $result['msg'] = 'fail upload file';
        }

        return $result;
    } // ok

    public function objVerifyCredentials($email, $password)
    {
        $query = $this->db->table('t_customer')
            ->where('email', $email);

        $data = $query->get()->getResult();

        if (!empty($data)) {
            if ($data[0]->status == 1) {
                if (password_verify($password, $data[0]->password)) {
                    $result = array();
                    $result['error'] = 0;
                    $result['msg'] = 'success';
                    $result['data'] = $data;
                } else {
                    $result['error'] = 1;
                    $result['msg'] = 'invalid password';
                }
            } else {
                $result = array();
                $result['error'] = 403;
                $result['msg'] = 'user disabled';
            }
        } else {
            $result = array();
            $result['error'] = 500;
            $result['msg'] = 'email not found';
        }

        return $result;
    } // ok

    public function employeeUpcomingAppointments($employeeID)
    {
        $query = $this->db->table('appointment')
            ->where('employeeID', $employeeID)
            ->where('date >=', date('Y-m-d'))
            ->orderBy('date ASC');

        $data = $query->get()->getResult();
        $return = array();

        foreach ($data as $d) {
            $currentDateTime = strtotime(date('Y-m-d g:ia'));
            $appointmentDateTime = strtotime($d->date . ' ' . $d->start);

            if ($currentDateTime <= $appointmentDateTime)
                $return[] = $d;
        }

        return $return;
    }
}
