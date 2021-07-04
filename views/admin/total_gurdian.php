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
if (isset($_SESSION["email"])){
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
                    <li>
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
                    <li class="active">
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
                        <a class="navbar-brand">Alert to Users</a>
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
                        <div class="card card-plain">
                            <?php
                            if (isset($_SESSION["alertUsers"])){
                                echo $_SESSION["alertUsers"];
                                unset($_SESSION["alertUsers"]);
                            }
                            ?>
                            <div class="card-header">
                                <h4 class="card-title">Old Age Home Users</h4>
                                <p class="card-category">Users alert</p>
                            </div>
                            <div class="card-body">
                                <div class="scroll-content" style="height: 310px;">
                                    <table class="table table-hover">
                                        <thead class=" text-primary">
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Member Id
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $dataManipulation = new DataManipulation();
                                        $status = $dataManipulation->user();
                                        if ($status){
                                            foreach ($status as $data){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $data->fullname?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->email?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->member_id?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($data->alert=='no'){
                                                            ?>
                                                            <a href='../dataprocess/process.php?send_msg_id=<?php echo $data->id?>' class="btn bg-success"><i class="fa fa-clipboard-check"></i></a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <span class="bg-danger text-white pl-2 pr-2">alert send</span>
                                                            <?php
                                                        }
                                                            ?>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
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

