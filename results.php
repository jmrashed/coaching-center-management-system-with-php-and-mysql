<?php
include("connection.php");
$Message = "";
$id = "";
$fullname = "";
$degree = "";
$designation = "";
$subjectid = "";
$email = "";
$phone = "";
$joindate = "";
$designation = "";
$address = "";
$subjectid = "";
$gender = "";


if (isset($_GET['deleteresult'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM result WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:results.php?Message= A result has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $joindate = $_POST['joindate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $subjectid = $_POST['subjectid'];
    $degree = $_POST['degree'];
    $designation = $_POST['designation'];

    $sql = "INSERT INTO  result  (fullname ,  degree ,  designation ,  email ,  password ,  gender , 
          joindate ,  address ,  phone ,  subjectid ,  datetime )
            VALUES ( '$fullName', '$degree', '$designation', '$email', '$password', '$gender', "
            . "'$joindate', '$address', '$phone', '$subjectid', now())";
    if ($conn->query($sql) === TRUE) {

        header('Location:results.php?Message= A result has been Saved. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
            Result
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Results</li>
        </ol>
    </section>
    <?php
    if (isset($_GET['viewresult'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM result where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $fullname = $row["fullname"];
                $resultid = $row["resultid"];
                $classid = $row["classid"];
                $class= get_className($classid);
                $markid = $row["markid"]; 
                $email = $row["email"];
                $gender = $row["gender"];
                $phone = $row["phone"];
                $father = $row["father"];
                $mother = $row["mother"];
                $address = $row["address"];  
                $password = $row['password'];
                $datetime = $row['datetime'];
            }
        }
        ?>   
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title ng-binding"><i class="fa fa-info-circle" aria-hidden="true"></i> Result Information</h3>

                    <span class="pull-right"> 
                        <a href="sendmessage.php?resultId=<?= $id; ?>" class="btn btn-primary" > 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Message</a> 
                        <a class="btn-danger btn" href="results.php"><i class="fa fa-times" aria-hidden="true"></i> Close </a></span>
                </div>
                <div class="col-md-4">
                    <img src="images/1.jpg" class="img img-rounded img-responsive" ><br>
                    <h3><?= $fullname; ?></h3>
                    <i class="danger"> <b>Published: </b> <?= $datetime; ?></i>
                </div>
                <div class="col-md-8">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr> <th> Full Name</th><td><b> <?= $fullname; ?> </b> </td></tr>
                        <tr> <th> Student ID</th><td> <?=$resultid; ?> </td></tr> 
                        <tr> <th> Email</th><td> <?= $email; ?> </td></tr>
                        <tr> <th> Phone Number</th><td> <?= $phone; ?> </td></tr>
                        <tr> <th> Address</th><td> <?= $address; ?> </td></tr>
                        <tr> <th> Father Name </th><td> <?= $father; ?> </td></tr>
                        <tr> <th> Mother Name </th><td> <?= $mother; ?> </td></tr>
                        <tr> <th> Gender</th><td> <?= $gender; ?> </td></tr>
                        <tr> <th> Class </th><td> <?= $class; ?> </td></tr>
                    </table>

                </div>

            </div>
        </section>
        <?php
    }
  
        if (isset($_GET['editresult'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM result where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $fullname = $row["fullname"];
                    $degree = $row["degree"];
                    $designation = $row["designation"];
                    $subjectid = $row["subjectid"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                    $joindate = $row["joindate"];
                    $designation = $row["designation"];
                    $password = $row['password'];
                }
            }
        }
        ?>
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title ng-binding">Add result</h3>
                </div>
                <div class="box-body ">
                    <form class="form-horizontal" method="post" action="results.php" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Full name * </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $fullname; ?>" name="fullName" class="form-control" required="" placeholder="Full name">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Designation </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $designation; ?>"  name="designation" class="form-control" required="" placeholder="Designation">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Last Degree </label>
                            <div class="col-sm-10">
                                <input type="text" name="degree" value="<?= $degree; ?>"  class="form-control" required="" placeholder="Last Degree">
                            </div>
                        </div> 


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Email address *</label>
                            <div class="col-sm-10">
                                <input type="email"  value="<?= $email; ?>"  name="email" class="form-control" placeholder="Email address" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
                            <div class="col-sm-10">
                                <input 
                                <?php if (isset($_GET['editresult'])) {
                                    echo 'type="text"';
                                } else {
                                    echo 'type="password"';
                                } ?>
                                    value="<?= $password; ?>"  name="password" class="form-control" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender</label>
                            <div class="col-sm-10">

                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="male" <?php if (($gender = "male") || ($gender = "")) {
                                    echo 'Checked';
                                } ?>>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="female"   >
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Join Date</label>
                            <div class="col-sm-10">
                                <input type="date" id="datemask" value="<?= $joindate; ?>" name="joindate"  class="form-control datemask ng-pristine ng-valid">
                            </div>
                        </div>
                        <div date-picker="" selector=".datemask"></div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" value="<?= $address; ?>" class="form-control ng-pristine ng-valid" ng-model="form.address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Phone No</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" value="<?= $phone; ?>" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Phone No">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="subjectid" > 
                                    <?php
                                    $sql = "SELECT * FROM subject ORDER BY subjectname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['id']; ?>" <?php if ($sujectid = $row['id']) echo 'selected'; ?> class="ng-binding ng-scope"><?= $row['subjectname']; ?></option>
            <?php
        }
    }
    ?> 

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                       <?php if (isset($_GET['editresult'])) { ?>

                                    <input type="submit" name="update"  class="btn btn-primary ng-binding" value=Update result">
    <?php } else { ?>
                                           <input type="submit" name="submit"  class="btn btn-primary ng-binding" value=Add result">

    <?php } ?>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
 


    <section class="content ng-scope">
<?php if (isset($_GET['Message'])) {
    ?>
            <div class="col-md-12 pull-right"><div class="alert alert-success">
                    <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
<?php } ?> 

        <a href=" results.php?addresult=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add result</a>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ng-binding">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="results/export" class="ng-binding">Export to Excel</a></li>
                <li><a href="results/exportpdf" target="_BLANK" class="ng-binding">Export to PDF</a></li>
            </ul>
        </div>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ng-binding">Import</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ng-binding">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a ng-click="import('excel')" class="ng-binding">Import from Excel</a></li>
            </ul>
        </div>
        <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ng-binding">List results</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Student ID</th> 
                            <th class="ng-binding">Full name</th> 
                            <th class="ng-binding">Class</th>
                            <th class="ng-binding">Email</th>
                            <th class="ng-binding">Phone</th>
                            <th class="ng-binding">Address</th> 
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM result";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                ?>


                                <tr total-items="totalItems" ng-repeat="result in results| itemsPerPage:20" class="ng-scope">
                                    <td class="ng-binding"><?= $row["id"]; ?></td>
                                       <td class="ng-binding"><?= $row["resultid"]; ?></td>
                                    <td>
                                        <a href="results.php?id=<?= $id; ?>&viewresult=yes" class="ng-binding"><?= $row["fullname"]; ?></a>

                                    </td> 
                                    <td class="ng-binding"><?php echo get_className($row["classid"]); ?></td>
                                    <td class="ng-binding"><?= $row["email"]; ?></td>
                                    <td class="ng-binding"><?= $row["phone"]; ?></td>
                                    <td class="ng-binding"><?= $row["address"]; ?></td> 
                                    <td class="no-print">
                                        <a  href="results.php?id=<?= $id; ?>&editresult=yes"  class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="results.php?id=<?= $id; ?>&deleteresult=yes" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

        <?php
    }
} else {
    echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Results</td></tr>';
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