<?php
include_once "../../vendor/autoload.php";
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}

$reg = new Registration();
if (isset($_POST['signup']))
{
    $reg->registrationSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $isExist = $reg->isExistEmail();
    $isExistUsers = $reg->isExistEmailUser();
    $type = $_POST['type'];
    if ($isExist){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($isExistUsers){
        $_SESSION["isExistMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Email already exist. Please give another email. </span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        if ($type=='moderator'){
            $insert = $reg->insertModerator();
            if ($insert){
                Utility::redirect("../login.php");
            }
        }
        else{
            $insert = $reg->insertUser();
            if ($insert){
                $_SESSION['email'] = $reg->email;
                Utility::redirect("../users/member_id.php");
            }
        }

    }
}
if (isset($_POST['confirm'])){
    $reg->member_idSetData($_POST);
    $status = $reg->isExistMemberId($_POST['member_id']);
    $http = $_SERVER["HTTP_REFERER"];
    if ($status){
        $data = $reg->updateUser($_POST['email']);

        if ($data)
        {
            Utility::redirect("../login.php");
        }
    }

    else{
        $_SESSION["notMatchMemberID"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Member Id not Matched. Please try again. </span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_POST["signin"]))
{
    $reg->authSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $admin = $reg->admin();
    $moderator = $reg->moderator();
    $moderatorApprovedNo = $reg->moderatorApprovedNo();
    $user = $reg->user();
    if ($admin){
        $_SESSION["email"] = $admin->email;
        Utility::redirect("../admin/dashboard.php");
    }
    elseif ($moderatorApprovedNo){
        $_SESSION["isErorMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Sorry..! Id not activated yet </span>
                        </div>";
        Utility::redirect("$http");
    }
    elseif ($moderator){
        $_SESSION["email"] = $moderator->email;
        $_SESSION["id"] = $moderator->id;
        Utility::redirect("../moderator/add_member.php");
    }
    elseif ($user){
        $_SESSION["email"] = $user->email;
        $_SESSION["member_id"] = $user->member_id;
        Utility::redirect("../users/user_dashboard.php");
    }
    else{
        $_SESSION["isErorMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Warning - </b>Incorrect email and password. </span>
                        </div>";
        Utility::redirect("$http");
    }
}