<?php
include_once "../vendor/autoload.php";
use App\Utility\Utility;
use App\DataManipulation\DataManipulation;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        Old Age Home
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="../contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../contents/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link href="../contents/demo/demo.css" rel="stylesheet" />
    <link href="../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
    <link href="../contents/css/fontawesome-free-5.11.1-web/css/all.min.css" rel="stylesheet" />
    <link href="../contents/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" />
    <link href="../contents/plugins/jquery.fancybox.min.css" rel="stylesheet" />
</head>

<div class="content container ">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">View Member</h5>
                </div>
                <div class="card-body">
                    <?php
                    $dataManipulation = new DataManipulation();
                    $id =  $_GET['id'];
                    $data = $dataManipulation->singleMember($id);
                    if ($data){
                    ?>
                    <form action="../dataprocess/process.php" method="post">
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" disabled class="form-control" value="<?php echo $data->fullname ?>" name="fullname" placeholder="Fullname">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" disabled class="form-control" value="<?php echo $data->gender ?>" >
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" disabled value="<?php echo $data->age ?>"  name="age" class="form-control" placeholder="Age">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Gurdian Name</label>
                                    <input type="text" disabled class="form-control" value="<?php echo $data->gurdianname ?>" name="gurdianname" placeholder="Gurdian name">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Gurdian Phone Number</label>
                                    <input type="number" disabled class="form-control" value="<?php echo $data->gurdianpnumber ?>" name="gurdianpnumber" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" disabled class="form-control" value="<?php echo $data->address ?>" name="address" placeholder="Home Address" >
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Total Cost</label>
                                    <input type="number" disabled class="form-control" value="<?php echo $data->cost ?>" name="cost" placeholder="Cost" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Health Condition</label>
                                    <input type="text" disabled class="form-control" value="<?php echo $data->health ?>" name="health" placeholder="Health Condition">
                                </div>
                            </div>
                            <div class="col-md-6 px-1">
                                <div class="form-group">
                                    <label>Date of Joining</label>
                                    <input type="text" disabled class="form-control datepicker" value="<?php echo $data->joindate ?>" name="joindate" placeholder="Joining Date" >
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../contents/js/jquery-3.2.1.min.js"></script>
<!--<script src="../contents/js/jquery.min.js"></script>-->
<script src="../contents/js/bootstrap.min.js"></script>
<script src="../contents/js/popper.min.js"></script>
<script src="../contents/plugins/bootstrap-notify.js"></script>
<script src="../contents/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../contents/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<script src="../contents/demo/demo.js"></script>
<script src="../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="../contents/plugins/jquery-ui/jquery-ui.js"></script>
<script src="../contents/plugins/jquery.fancybox.min.js"></script>

</body>

</html>
