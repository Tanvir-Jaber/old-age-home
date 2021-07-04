<?php


namespace App\Registration;

use App\Model\DatabaseConnection as DB;
class Registration extends DB
{
    public
        $fullname,
        $email,
        $member_id,
        $pass,
        $type;
    public function registrationSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("type",$data))
        {
            if ($data["type"] == "moderator"){
                $this->type = $data["type"];
            }
            else
            {
                $this->type = $data["type"];
            }
        }
    }
    public function insertModerator()
    {
        $array = array($this->fullname,$this->email,$this->pass,$this->type);
        $sql = "insert into moderator (fullname,email,pass,type) VALUE (?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function insertUser()
    {
        $array = array($this->fullname,$this->email,$this->pass,$this->type);
        $sql = "insert into user (fullname,email,pass,type) VALUE (?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function isExistEmail()
    {
        $sql = "select email from moderator where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function isExistEmailUser()
    {
        $sql = "select email from user where email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    /////end//////

    public function authSetData($data)
    {
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
    }
    public function admin()
    {
        $sql = "select * from admin where pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function moderator()
    {
        $sql = "select * from moderator where approved = 'yes' && pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function user()
    {
        $sql = "select * from user where activate = 'yes' && pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function userEmail($email)
    {
        $sql = "select * from user where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function moderatorApprovedNo()
    {
        $sql = "select * from moderator where approved = 'no'&& pass = '".$this->pass."' && email ='".$this->email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function member_idSetData($data)
    {
        if (array_key_exists("member_id",$data))
        {
            $this->member_id = $data['member_id'];
        }
    }
    public function isExistMemberId($member_id){
        $sql = "select * from member WHERE member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateUser($email)
    {
        $array = array($this->member_id);
        $sql = "update user set activate = 'yes', member_id =? WHERE email='".$email."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

}