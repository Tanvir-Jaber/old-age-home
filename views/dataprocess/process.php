<?php
include_once "../../vendor/autoload.php";
if (!isset($_SESSION)){session_start();}
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;

$dataManipulation = new DataManipulation();

if (isset($_POST["update_profile"]))
{
    $dataManipulation->adminSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->updateAdminDetails();
    if ($status){
        $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_GET["id"]))
{
    $status = $dataManipulation->deleteNotApproved($_GET["id"]);
    $http = $_SERVER["HTTP_REFERER"];
    if ($status){
        $_SESSION["deleteMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Delete - </b>Moderateor Id Delete Successfully.</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_GET["active_id"]))
{
    $status = $dataManipulation->moderatorApproved($_GET["active_id"]);
    if ($status){
        Utility::redirect("../admin/active_moderator_list.php");
    }
}
if (isset($_POST["update_moderator_profile"])){
    $dataManipulation->moderatorSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $status = $dataManipulation->updateModeratorDetails($_POST['id']);
    if ($status){
        $_SESSION["successModeratorMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Profile Update Successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }
}
if (isset($_POST["add_member"]))
{
    $data = $dataManipulation->memberSetData($_POST);
    $http = $_SERVER["HTTP_REFERER"];
    $idtoken = $dataManipulation->memberIdIsExist($_POST["member_id"]);
    if ($idtoken){
        $_SESSION["addMemberExist"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Warning - </b> Member id already exist.</span>
                        </div>";
        Utility::redirect("$http");
    }
    else{
        $status = $dataManipulation->memberDataInsert();
        if ($status)
        {
            Utility::redirect("../moderator/view_member_details.php");
        }
    }


}
if (isset($_GET["update_id"]))
{

    $update_id = $_GET['update_id'];
    $data = $dataManipulation->singleMember($update_id);

    if ($data)
    {
        $_SESSION["data_id"] = $data->id;
        Utility::redirect("../moderator/update_member_details.php");
    }
}

if (isset($_POST["update_member"])){
    $dataManipulation->memberSetData($_POST);
    $data = $dataManipulation->updateMemberDetails($_POST['id']);
    if ($data)
    {
        $_SESSION["successMemberUpdateMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b>  Update Member Data Successfully .</span>
                        </div>";
        Utility::redirect("../moderator/update_member_details.php");
    }

}
if (isset($_POST['send']))
{
    $dataManipulation->userSetData($_POST);
    $data = $dataManipulation->insertUserDonate();
    if ($data){
        Utility::redirect("../users/money_send_details.php");
    }
}
if (isset($_GET['alert_id']))
{
    $data = $dataManipulation->updateAlert($_GET['alert_id']);
    if ($data)
    {
        Utility::redirect("../moderator/serious_condition_member.php");
    }
}
if (isset($_GET['warning_id']))
{
    $data = $dataManipulation->updateWarning($_GET['warning_id']);
    if ($data)
    {
        Utility::redirect("../moderator/view_member_details.php");
    }
}
if (isset($_GET['notification_id']))
{
    $data = $dataManipulation->updateNotification($_GET['notification_id']);
    if ($data)
    {
        Utility::redirect("../users/serious_condition.php");
    }
    else{
        Utility::redirect("../users/serious_condition.php");
    }
}

if (isset($_GET['leave_id'])){

    $data = $dataManipulation->updateLeftMemberDetails($_GET['leave_id']);
    if ($data)
    {
        Utility::redirect("../moderator/left_member.php");
    }

}
if (isset($_GET['send_msg_id']))
{
    $data = $dataManipulation->userAlert($_GET['send_msg_id']);
    $http = $_SERVER['HTTP_REFERER'];
    if ($data) {
        $_SESSION["alertUsers"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"nc-icon nc-simple-remove\"></i>
                          </button>
                          <span>
                            <b> Success - </b> Reminder alert send successfully .</span>
                        </div>";
        Utility::redirect("$http");
    }

}


if (isset($_GET["logout"]))
{
    session_destroy();
    Utility::redirect("../login.php");
}


