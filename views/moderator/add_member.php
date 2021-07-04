<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
use App\Utility\Utility;
if (!isset($_SESSION)){
    session_start();
}
require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION['id'])){
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
                            <a href="add_member.php">
                                <i class="nc-icon nc-simple-add"></i>
                                <p>Add Member</p>
                            </a>
                        </li>
                        <li>
                            <a href="moderator_profile.php">
                                <i class="nc-icon nc-single-02"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="view_member_details.php">
                                <i class="nc-icon nc-tile-56"></i>
                                <p>View Member List</p>
                            </a>
                        </li>
                        <li>
                            <a href="update_member_details.php">
                                <i class="nc-icon nc-paper"></i>
                                <p>Update Member Details</p>
                            </a>
                        </li>
                        <li>
                            <a href="serious_condition_member.php">
                                <i class="nc-icon nc-ambulance"></i>
                                <p>Serious Condition</p>
                            </a>
                        </li>
                        <li>
                            <a href="left_member.php">
                                <i class="nc-icon nc-badge"></i>
                                <p>Leave Member</p>
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
                            <a class="navbar-brand">Member Add</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
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
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($_SESSION["addMemberExist"])){
                                echo $_SESSION["addMemberExist"];
                                unset($_SESSION["addMemberExist"]);
                            }
                            ?>
                            <div class="card card-user">
                                <div class="card-header">
                                    <h5 class="card-title">Add Member</h5>
                                </div>
                                <div class="card-body">
                                    <form action="../dataprocess/process.php" autocomplete="off" method="post">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input required type="text" class="form-control" name="fullname" placeholder="Fullname">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input required type="number" name="age" class="form-control" placeholder="Age">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Gurdian Name</label>
                                                    <input required type="text" class="form-control" name="gurdianname" placeholder="Gurdian name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Gurdian Phone Number</label>
                                                    <input required type="number" class="form-control" name="gurdianpnumber" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 pr-1">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input required type="text" class="form-control" name="address" placeholder="Home Address" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Member Id</label>
                                                    <input required type="text" class="form-control" name="member_id" value="OAH-" placeholder="Member Id" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Health Condition</label>
                                                    <input required type="text" class="form-control" name="health" placeholder="Health Condition">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Date of Joining</label>
                                                    <input required type="text" class="form-control datepicker" name="joindate" placeholder="Joining Date" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="update ml-auto mr-3">
                                                <button type="submit" name="add_member" class="btn btn-danger">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
