<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Utility\Utility;
if (!isset($_SESSION)){session_start();}
require_once "../../include/head.php";
?>
<?php
if (isset($_SESSION['email']))
{
    ?>
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a class="simple-text logo-mini">
                    <div class="logo-image-small">
                    </div>
                </a>
                <a style="color: #ce0000;" class="simple-text logo-normal">
                    Old Age Home
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="user_dashboard.php">
                            <i class="nc-icon nc-circle-10"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send.php">
                            <i class="nc-icon nc-check-2"></i>
                            <p>Money Send</p>
                        </a>
                    </li>
                    <li>
                        <a href="money_send_details.php">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Money Send Details</p>
                        </a>
                    </li>
                    <li>
                        <a href="serious_condition.php">
                            <i class="nc-icon nc-ambulance"></i>
                            <p>Serious Condition</p>
                        </a>
                    </li>
                    <li>
                        <?php
                        $dataManipulation = new DataManipulation();
                        $data = $dataManipulation->reminder($_SESSION['email']);

                        ?>

                        <a href="reminder.php?alert_id_no=<?php echo $data->id?>" style="<?php
                        $dataManipulation = new DataManipulation();
                        $data = $dataManipulation->reminder($_SESSION['email']);
                        if ($data->alert=='yes'){
                            ?> font-weight: bold
                            <?php
                        } ?>">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Reminder
                                <?php
                                if ($data){
                                if ($data->alert=='yes'){
                                    ?>

                                    <span class="pull-right-container">
                                        <small class="label pull-right "><i style="font-size: 12px;color: green" class=" d-flex justify-content-end fas fa-circle"></i></small>
                                    </span>
                                    <?php
                                    }
                                }
                                ?>

                            </p>


                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand"></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <?php
                                $dataManipulation = new DataManipulation();
                                $notification = $dataManipulation->notification($_SESSION['member_id']);
                                $notifications = $dataManipulation->singleAlert($_SESSION['member_id']);
                                $badge = 1;
                                ?>
                                <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <span class="badge badge-danger"><?php if ($notification){echo $badge;} else echo "0";?></span>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a style="<?php if($notification->status == 'no'){?> font-weight: bold <?php }?>" class="dropdown-item" href="../dataprocess/process.php?notification_id=<?php echo $notification->id?>"><?php  if ($notifications){echo $notifications->fullname." is very critical condition";}else echo "no data records yet.";?></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href='../dataprocess/process.php?logout="buttonHit"'>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <?php
                $dataManipulation = new DataManipulation();
                $member_id = $_SESSION['member_id'];
                $data = $dataManipulation->memberIdMatchByUser($member_id);
                if ($data){
                    ?><div class="row">
                    <div class="col-md-12">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">View</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" disabled class="form-control" value="<?php echo $data->fullname?>" name="fullname" placeholder="Fullname">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input type="text" disabled  class="form-control" value="<?php echo $data->gender?>" placeholder="Gender">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Age</label>
                                                <input type="number" disabled  class="form-control" value="<?php echo $data->age?>" placeholder="Age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Gurdian Name</label>
                                                <input type="text" disabled class="form-control" name="gurdianname" value="<?php echo $data->gurdianname?>" placeholder="Gurdian name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Gurdian Phone Number</label>
                                                <input type="number" disabled class="form-control" name="gurdianpnumber" value="<?php echo $data->gurdianpnumber?>" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 pr-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" disabled class="form-control" name="address" value="<?php echo $data->address?>" placeholder="Home Address" >
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Member Id</label>
                                                <input type="text" disabled class="form-control" name="member_id" value="<?php echo $data->member_id?>" placeholder="Member Id" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Health Condition</label>
                                                <input type="text" disabled class="form-control" name="health" value="<?php echo $data->health?>" placeholder="Health Condition">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Date of Joining</label>
                                                <input type="text" disabled class="form-control datepicker" name="joindate" value="<?php echo $data->joindate?>" placeholder="Joining Date" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php
                }

                ?>



            </div>
            <footer class="footer footer-black p-0 footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
              <span class="copyright">
                Copyright &copy; All rights reserved
                <script>
                  document.write(new Date().getFullYear())
                </script>
              </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php
    require_once "../../include/foot.php";
    ?>
    <?php
}
else {
    Utility::redirect("../login.php");
}
?>
