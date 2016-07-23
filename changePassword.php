<?php
include("connection.php");
$Message = "";
$loginid = 1;

if (isset($_POST['updatePassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $loginid = 1;

    $sql = "SELECT * FROM admin where id=$loginid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldPassword = $row['password'];
        //   echo 'data: '.$oldPassword;

        if ($oldPassword == $currentPassword) {
            if ($newPassword == $confirmPassword) {
                $sql = "UPDATE admin SET password = '$confirmPassword' WHERE  id= $loginid";
                // echo $sql;
                if ($conn->query($sql) === TRUE) {

                    header('Location:changePassword.php?Message= Password has been Updated. ');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                header('Location:changePassword.php?Message= Failed ! New Password and Confirm Password was not same. ');
            }
        } else {

            header('Location:changePassword.php?Message= Failed ! Current Password do not match. ');
        }
    }
}




include("header.php");
include("leftsidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Password
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>
    
    <?php if(isset($_GET['changePassword'])){ ?>
    <section class="content">
        <div class="box col-xs-12">
            <div class="box-header">

                <h3 class="box-title ng-binding">Change Password</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal " method="post" action="changePassword.php" >
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Current Password * </label>
                        <div class="col-sm-10">
                            <input type="password" name="currentPassword"  class="form-control" required=""  placeholder="Current Password" >
                        </div>
                    </div> 

                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-2 control-label ng-binding">New Password * </label>
                        <div class="col-sm-10">
                            <input type="password" name="newPassword"  class="form-control" required=""  placeholder="New Password" >
                        </div>
                    </div> 
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Confirm Password * </label>
                        <div class="col-sm-10">
                            <input type="password" name="confirmPassword"  class="form-control" required=""  placeholder="Confirm Password" >
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10"> 
                            <input type="submit" class="btn btn-primary ng-binding" value="Change Password" name="updatePassword" >
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </section> 
<?php }  ?>



    <section class="content">
        <?php if (isset($_GET['Message'])) {
            ?>
            <div class="col-md-12 pull-right">
                <div class="alert alert-success">
                    <?php echo $_GET['Message']; ?> 
                </div>
            </div>
        <?php } ?> 

        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ng-binding">My Profile</h3>
                
                <span class="pull-right">
                    <a href="changePassword.php?changePassword=yes&loginid=<?=$loginid;?>" class="btn btn-primary">    <i class="fa fa-edit"></i> Change Password</a>
                             
                   <a href="changePassword.php" class="btn btn-info">  <i class="fa fa-refresh"></i>  Refresh</a> </span>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Full Name</th>  
                            <th class="ng-binding">Email</th>  
                            <th class="ng-binding">Password</th>   
                        </tr>
                        <?php
                        $sql = "SELECT * FROM admin";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>


                                <tr  >
                                    <td class="ng-binding"><?= $row["id"]; ?></td>
                                    <td class="ng-binding"><?= $row["name"]; ?></td>

                                    <td class="ng-binding"> <a href="changePassword.php?viewProfile=yes&id=<?=$row['id'];?>"> <?= $row["email"]; ?> </a></td> 
                                    <td class="ng-binding"><?= $row["password"]; ?></td> 
                                    
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Subject</td></tr>';
                        }
                        ?>


                    </tbody></table>
                <dir-pagination-controls class="pull-right ng-isolate-scope" on-page-change="pageChanged(newPageNumber)" template-url="templates/dirPagination.html"><!-- ngIf: 1 < pages.length --></dir-pagination-controls>
            </div>
        </div>
    </section>


</div>




<?php
include("footer.php");
?>