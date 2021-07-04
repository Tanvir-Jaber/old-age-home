<?php


namespace App\DataManipulation;

use App\Model\DatabaseConnection as DB;
use PDO,PDOException;
class DataManipulation extends DB
{
    public
        $fullname,
        $amount,
        $date,
        $transaction,
        $reference,
        $member_id,
        $cost,
        $age,
        $gender,
        $gurdianname,
        $gurdianpnumber,
        $health,
        $joindate,
        $pass,
        $email,
        $fname,
        $lname,
        $address,
        $city,
        $country,
        $pnumber;
    public function adminSetData($data)
    {
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("fname",$data))
        {
            $this->fname = $data["fname"];
        }
        if (array_key_exists("lname",$data))
        {
            $this->lname = $data["lname"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("city",$data))
        {
            $this->city = $data["city"];
        }
        if (array_key_exists("country",$data))
        {
            $this->country = $data["country"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
    }
    public function viewAdminDetails()
    {
        $sql = "select * from admin";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateAdminDetails()
    {
        $array = array($this->pass,$this->email,$this->fname,$this->lname,$this->address,$this->city,$this->country,$this->pnumber);
        $sql = "update admin set pass=?,email=?,fname=?,lname=?,address=?,city=?,country=?,pnumber=?";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function moderator()
    {
        $sql = "select * from moderator where approved = 'no' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function moderatorActive()
    {
        $sql = "select * from moderator where approved = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function deleteNotApproved($id)
    {
        $sql = "delete from moderator WHERE id = '".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function moderatorApproved($id)
    {
        $sql = "update moderator set approved = 'yes' WHERE  id = '".$id."'";
        $status = $this->conn->exec($sql);
        return $status;
    }
    public function moderatorSetData($data)
    {
        if (array_key_exists("pass",$data))
        {
            $this->pass = $data["pass"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("city",$data))
        {
            $this->city = $data["city"];
        }
        if (array_key_exists("country",$data))
        {
            $this->country = $data["country"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
    }
    public function updateModeratorDetails($id)
    {
        $array = array($this->pass,$this->email,$this->fullname,$this->address,$this->city,$this->country,$this->pnumber);
        $sql = "update moderator set pass=?,email=?,fullname=?,address=?,city=?,country=?,pnumber=? where id=$id";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function viewModeratorDetails($id)
    {
        $sql = "select * from moderator WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }


    /// add member set data


    public function memberSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("gender",$data))
        {
            $this->gender = $data["gender"];
        }
        if (array_key_exists("age",$data))
        {
            $this->age = $data["age"];
        }
        if (array_key_exists("gurdianname",$data))
        {
            $this->gurdianname = $data["gurdianname"];
        }
        if (array_key_exists("gurdianpnumber",$data))
        {
            $this->gurdianpnumber = $data["gurdianpnumber"];
        }
        if (array_key_exists("address",$data))
        {
            $this->address = $data["address"];
        }
        if (array_key_exists("health",$data))
        {
            $this->health = $data["health"];
        }
        if (array_key_exists("joindate",$data))
        {
            $this->joindate = $data["joindate"];
        }
        if (array_key_exists("cost",$data))
        {
            $this->cost = $data["cost"];
        }
        if (array_key_exists("member_id",$data))
        {
            $this->member_id = $data["member_id"];
        }
    }
    public function memberDataInsert()
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->member_id,$this->health,$this->joindate);
        $sql = "insert into member (fullname,gender,age,gurdianname,gurdianpnumber,address,member_id,health,joindate) VALUE (?,?,?,?,?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function memberIdIsExist($id)
    {
        $sql = "select * from member WHERE member_id='".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewMemberDetails()
    {
        $sql = "select * from member WHERE left_member = 'no'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function viewLeftMemberDetails()
    {
        $sql = "select * from member WHERE left_member = 'yes' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function updateLeftMemberDetails($id)
    {
        $sql = "update member set left_member = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function searchMemberDetails($data)
    {
        $sql = "select * from member WHERE  fullname like'%".$data."%'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function singleMember($id)
    {
        $sql = "select * from member WHERE id = '".$id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
//        return $id;
    }
    public function singleMember_Id()
    {
        $sql = "select * from member";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
//        return $id;
    }
    public function updateMemberDetails($id)
    {
        $array = array($this->fullname,$this->gender,$this->age,$this->gurdianname,$this->gurdianpnumber,$this->address,$this->cost,$this->health,$this->joindate);
        $sql = "update member set fullname=?,gender=?,age=?,gurdianname=?,gurdianpnumber=?,address=?,cost=?,health=?,joindate=? WHERE id='".$id."'";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }
    public function memberIdMatchByUser($member_id)
    {
        $sql = "select m.fullname,m.gender,m.age,m.gurdianname,m.gurdianpnumber,m.address,m.member_id,m.health,m.joindate from member as m INNER JOIN user as u on m.member_id = '".$member_id."'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }

    /////// user set data

    public function userSetData($data)
    {
        if (array_key_exists("fullname",$data))
        {
            $this->fullname = $data["fullname"];
        }
        if (array_key_exists("amount",$data))
        {
            $this->amount = $data["amount"];
        }
        if (array_key_exists("pnumber",$data))
        {
            $this->pnumber = $data["pnumber"];
        }
        if (array_key_exists("transaction",$data))
        {
            $this->transaction = $data["transaction"];
        }
        if (array_key_exists("reference",$data))
        {
            $this->reference = $data["reference"];
        }
        if (array_key_exists("email",$data))
        {
            $this->email = $data["email"];
        }
        if (array_key_exists("date",$data))
        {
            $this->date = $data["date"];
        }
    }
    public function insertUserDonate()
    {
        $array = array($this->amount,$this->pnumber,$this->transaction,$this->date,$this->email);
        $sql = "insert into moneyDetails (amount,pnumber,transaction,date,email) VALUE (?,?,?,?,?)";
        $data = $this->conn->prepare($sql);
        $status = $data->execute($array);
        return $status;
    }

    public function userEmail($email)
    {
        $sql = "select * from moneyDetails where email ='".$email."' ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function donatedDetails()
    {
        $sql = "select * from moneydetails as m INNER JOIN user as u on m.email = u.email ";
        $data = $this->conn->query($sql);
        $data->setFetchMode(PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function updateAlert($id)
    {
        $sql = "update member set health ='Critical Condition', notification = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function viewAlertDetails()
    {
        $sql = "select * from member WHERE notification = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function updateWarning($id)
    {
        $sql = "update member set health ='normal', notification = 'no' ,status = 'no' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function singleAlert($member_id)
    {
        $sql = "select * from member WHERE  member_id = '".$member_id."'&& notification = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function notification($member_id)
    {
        $sql = "select * from member WHERE  status = 'no' && member_id = '".$member_id."'&& notification = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
    public function updateNotification($id)
    {
        $sql = "update member set status = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function user()
    {
        $sql = "select * from user where activate = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetchAll();
        return $status;
    }
    public function userAlert($id)
    {
        $sql = "update user set alert = 'yes' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function reminderUpdate($id)
    {
        $sql = "update user set alert = 'no' WHERE id='".$id."'";
        $data = $this->conn->exec($sql);
        return $data;
    }
    public function reminder($email)
    {
        $sql = "select * from user where email='".$email."' && activate = 'yes'";
        $data = $this->conn->query($sql);
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $status = $data->fetch();
        return $status;
    }
}