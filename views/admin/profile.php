<?php
    include_once "../../vendor/autoload.php";
    use App\DataManipulation\DataManipulation;
    use App\Utility\Utility;
    if (!isset($_SESSION)){
    session_start();
    }
    require_once "../../include/head.php";
?>
<?php
    if (isset($_SESSION["email"]))
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
                        <li>
                            <a href="dashboard.php">
                                <i class="nc-icon nc-bank"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="profile.php">
                                <i class="nc-icon nc-single-02"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="member_details.php">
                                <i class="nc-icon nc-tile-56"></i>
                                <p>Member List</p>
                            </a>
                        </li>
                        <li>
                            <a href="moderator_approved.php">
                                <i class="nc-icon nc-paper"></i>
                                <p>Moderator Approved</p>
                            </a>
                        </li>
                        <li>
                            <a href="active_moderator_list.php">
                                <i class="nc-icon nc-button-pause"></i>
                                <p>Active Moderator</p>
                            </a>
                        </li>
                        <li>
                            <a href="donated_details.php">
                                <i class="nc-icon nc-money-coins"></i>
                                <p>Donated Details</p>
                            </a>
                        </li>
                        <li>
                            <a href="total_gurdian.php">
                                <i class="nc-icon nc-air-baloon"></i>
                                <p>Alert Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="serious_condition_member_details.php">
                                <i class="nc-icon nc-ambulance"></i>
                                <p>Serious Condition</p>
                            </a>
                        </li>
                        <li>
                            <a href="leave_member.php">
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
                            <a class="navbar-brand">Profile</a>
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
                            <div class="card card-user">
                                <div class="card-header">
                                    <h5 class="card-title">Edit Profile</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["successMsg"])){
                                        echo $_SESSION["successMsg"];
                                        unset($_SESSION["successMsg"]);
                                    }
                                    $dataManipulation = new DataManipulation();
                                    $email = $_SESSION["email"];
                                    $data = $dataManipulation->viewAdminDetails();
                                    if ($data){
                                        ?>
                                        <form action="../dataprocess/process.php" method="post">
                                            <div class="row">
                                                <div class="col-md-5 pr-1">
                                                    <div class="form-group">
                                                        <label>Company (disabled)</label>
                                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Old Age Home Services(Admin).">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-1">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="pass" placeholder="Password" value="<?php echo $data->pass?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data->email?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="fname" value="<?php echo $data->fname?>" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-1">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lname" value="<?php echo $data->lname?>" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="address" value="<?php echo $data->address?>" placeholder="Home Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 pr-1">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city" value="<?php echo $data->city?>" placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 px-1">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" name="country" value="<?php echo $data->country?>" placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="number" class="form-control" name="pnumber" value="<?php echo $data->pnumber?>" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                    <button type="submit" name="update_profile" class="btn btn-primary btn-round">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                    ?>
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
    else{
        Utility::redirect("../login.php");
    }
?>
