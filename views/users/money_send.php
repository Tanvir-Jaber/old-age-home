<?php
include_once "../../vendor/autoload.php";
use App\DataManipulation\DataManipulation;
use App\Registration\Registration;
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
                        <li>
                            <a href="user_dashboard.php">
                                <i class="nc-icon nc-circle-10"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="active">
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
                    $reg = new Registration();
                    $data = $reg->userEmail($_SESSION['email']);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-user">
                                <div class="card-header">
                                    <h5 class="card-title">Send Money Details</h5>
                                </div>
                                <div class="card-body">
                                    <form action="../dataprocess/process.php" autocomplete="off" method="post">
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="email" value="<?php echo $_SESSION['email']?>" placeholder="Fullname">
                                                    <label>Full Name</label>
                                                    <input type="text" disabled value="<?php echo $data->fullname?>" class="form-control" name="fullname" placeholder="Fullname">
                                                </div>
                                            </div>

                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Add Amount</label>
                                                    <input type="number" required name="amount" class="form-control" placeholder="Amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Phone Number<b>(bkash)</b></label>
                                                    <input type="number" required class="form-control" name="pnumber" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="alert alert-success alert-dismissible fade show text-black-50">Transaction ID (Send Money through Bkash to the following number, and give the transaction ID.)</label>
                                                    <h2 class="mb-0">Bkash Agent Number <strong>(+880 1852454545)</strong></h2>

                                                    <label>Transaction ID </label>
                                                    <input type="text" class="form-control" required name="transaction" placeholder="Transaction Number">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Member Id Reference</label>
                                                    <input type="text" disabled class="form-control" name="reference" placeholder="Reference" value="<?php echo $data->member_id?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text"  required class="form-control datepicker" name="date" placeholder="Date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="update mr-auto ml-3">
                                                <button type="submit" name="send" class="btn btn-primary">Send</button>
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
