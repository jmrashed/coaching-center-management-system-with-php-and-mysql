<?php
include("connection.php");
$Message = "";
$id = "";
$fullname = "";
$designation = "";
$subjectid = "";
$email = "student@demo.com";
$phone = "";
$joindate = "";
$address = "Jhenaidah.";
$subjectid = "";
$gender = "";
$father = "Mr. ";
$mother = "Mrs. ";
$password = "123456";
$parentphone = "";
$actiontitle="Add student";


if (isset($_GET['deletestudent'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM student WHERE  id=$id";
    if ($conn->query($sql) === TRUE) {

        header('Location:students.php?Message= A student has been Deleted. ');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $joindate = $_POST['joindate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $class = $_POST['class'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $parentphone = $_POST['parentphone'];

    $sql = "UPDATE student SET fullname = '$fullName', email = '$email', password = '$password', phone = '$phone', 
		gender = '$gender', father = '$father', mother = '$mother', parentphone = '$parentphone', address = '$address', class='$class' WHERE  id = $id";
 //  echo $sql;
   if ($conn->query($sql) === TRUE) {

        header('Location:students.php?Message= A student has been Updated. ');
	/*
        echo '<pre>';	
        print_r($_POST);
        echo '</pre>';
         
         */
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['submit'])) {

    $studentid = $_POST['studentid'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $joindate = $_POST['joindate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $class = $_POST['class'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $parentphone = $_POST['parentphone'];

    $sql = "INSERT INTO student (studentid, fullname, email, password, phone, gender, father, 
	mother, parentphone, address, class, joindate, datetime) 
            VALUES (  '$studentid', '$fullName', '$email', '$password', '$phone', '$gender', '$father', '$mother',"
            . " '$parentphone', '$address', '$class','$joindate', now())";
    if ($conn->query($sql) === TRUE) {

        header('Location:students.php?Message= A student has been Saved. ');
	 
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
            Student
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home</a></li>
            <li class="active">Students</li>
        </ol>
    </section>
    <?php
    if (isset($_GET['viewstudent'])) {
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM student where id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $fullname = $row["fullname"];
                $studentid = $row["studentid"];
                $class = $row["class"];
                $class = get_className($class);
                $email = $row["email"];
                $gender = $row["gender"];
                $phone = $row["phone"];
                $father = $row["father"];
                $mother = $row["mother"];
                $address = $row["address"];
                $password = $row['password'];
                $parentphone = $row['parentphone'];
                $datetime = $row['datetime'];
            }
        }
        ?>   
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title "><i class="fa fa-info-circle" aria-hidden="true" style="color:#00acd6;" ></i> Student Information</h3>

                    <span class="pull-right"> 
                        <a href="students.php?id=<?= $id; ?>&editstudent=yes" class="btn btn-primary" > 
                            <i class="fa fa-edit" aria-hidden="true"></i> Edit Info</a> 
                            
                              <a href="sendmessage.php?studentId=<?= $id; ?>" class="btn btn-primary" > 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Send Message</a>
                            
                            <a class="btn-danger btn" href="students.php"><i class="fa fa-times" aria-hidden="true"></i> Close </a></span>
                </div>
                <div class="col-md-4">
                    <img src="images/student_icon.jpg" class="img img-rounded img-responsive img-thumbnail" ><br>
                    <h3><?= $fullname; ?></h3> 
                    <span class="label label-success"><b>Published: </b> <?= $datetime; ?></i></span>
                </div>
                <div class="col-md-8">
                    <table class="table table-responsive table-striped table-bordered">
                        <tr> <th> Full Name</th><td><b> <?= $fullname; ?> </b> </td></tr>
                        <tr> <th> Student ID</th><td> <?= $studentid; ?> </td></tr> 
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
    if (isset($_GET['addstudent']) || isset($_GET['editstudent'])) {
        ?>

        <?php
        //initial_variable();
        if (isset($_GET['editstudent'])) {
            $actiontitle="Update student info";
            $id = $_GET['id'];
            $sql = "SELECT * FROM student where id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $studentID = $row["studentid"];
                    $fullname = $row["fullname"];
                    $father = $row["father"];
                    $mother = $row["mother"];
                    $class = $row["class"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                    $joindate = $row["joindate"];
                    $gender = $row["gender"];
                    $password = $row['password'];
                    $parentphone = $row['parentphone'];
                }
            }
        }
        ?>
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    
                    <h3 class="box-title "><?=$actiontitle;?></h3>
                    
                    <span class="pull-right"> <a class="btn-danger btn" href="students.php"><i class="fa fa-times" aria-hidden="true"></i> Close </a></span>
                </div>
                <div class="box-body ">
                    <form class="form-horizontal" method="post" action="students.php" >
                        <?php
                        $chars = "0123456789";
                        $studentID = "FACJ-" . substr(str_shuffle($chars), 0, 4);
                        ?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Student ID * </label>
                            <div class="col-sm-10">
                                <input type="text"  value="<?= $studentID; ?>" name="studentid" class="form-control " required="" placeholder="Full name" readonly="true">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Full name * </label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $fullname; ?>" name="fullName" class="form-control" required="" placeholder="Full name">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Email </label>
                            <div class="col-sm-10">
                                <input type="email" value="<?= $email; ?>"  name="email" class="form-control" required="" placeholder="Email Address">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Password </label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="<?= $password; ?>"  class="form-control" required="" placeholder="Last Degree">
                            </div>
                        </div> 


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Phone Number *</label>
                            <div class="col-sm-10">
                                <input type="number"  value="<?= $phone; ?>"  name="phone" class="form-control" placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Gender</label>
                            <div class="col-sm-10">

                                <div class="radio">
                                    <label class="">
                                        <input type="radio" name="gender" value="male" <?php
                    if (($gender = "male") || ($gender = "")) {
                        echo 'Checked';
                    }
                        ?>>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="">
                                        <input type="radio" name="gender" value="female"   >
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Father Name *</label>
                            <div class="col-sm-10">
                                <input type="text"  value="<?= $father; ?>"  name="father" class="form-control" required="" placeholder="Father Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Mother Name *</label>
                            <div class="col-sm-10">
                                <input  type="text" value="<?= $mother; ?>"  name="mother" class="form-control" required="" placeholder="Mother Name">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Parent Phone *</label>
                            <div class="col-sm-10">
                                <input type="number"  value="<?= $parentphone; ?>"  name="parentphone" class="form-control" required="" placeholder="Parent Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Address *</label>
                            <div class="col-sm-10">
                                <input type="text"  value="<?= $address; ?>"  name="address" class="form-control" required="" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Select Class</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="class" > 
                                    <?php
                                    $sql = "SELECT * FROM class ORDER BY classname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['classname']; ?>" <?php if ($class = $row['id']) echo 'selected'; ?> class=" ng-scope"><?= $row['classname']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?> 

                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ">Join Date</label>
                            <div class="col-sm-10">
                                <input type="date" id="datemask" value="<?= $joindate; ?>" name="joindate"  class="form-control datemask ng-pristine ng-valid">
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                <?php if (isset($_GET['editstudent'])) { ?>

                                    <input type="submit" name="update"  class="btn btn-primary " value="Update student">
                                <?php } else { ?>
                                    <input type="submit" name="submit"  class="btn btn-primary " value="Add student">

                                <?php } ?>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    <?php } ?>


    <section class="content ng-scope">
        <?php if (isset($_GET['Message'])) {
            ?>
            <div class="col-md-12 pull-right"><div class="alert alert-success">
                    <strong>Success ! </strong><?php echo $_GET['Message']; ?> </div></div>
        <?php } ?> 

        <a href=" students.php?addstudent=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ">Add student</a>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ">Export</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="students/export" class="">Export to Excel</a></li>
                <li><a href="students/exportpdf" target="_BLANK" class="">Export to PDF</a></li>
            </ul>
        </div>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ">Import</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a ng-click="import('excel')" class="">Import from Excel</a></li>
            </ul>
        </div>
        <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ">Print</a>
        <div class="box col-xs-12">
            <div class="box-header">
                <h3 class="box-title ">List students</h3>

            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="">ID</th>
                            <th class="">Student ID</th> 
                            <th class="">Full name</th> 
                            <th class="">Class</th>
                            <th class="">Email</th>
                            <th class="">Phone</th>
                            <th class="">Address</th> 
                            <th class="no-print ">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM student";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                ?>


                                <tr total-items="totalItems" ng-repeat="student in students| itemsPerPage:20" class="ng-scope">
                                    <td class=""><?= $row["id"]; ?></td>
                                    <td class=""><?= $row["studentid"]; ?></td>
                                    <td>
                                        <a href="students.php?id=<?= $id; ?>&viewstudent=yes" class=""><?= $row["fullname"]; ?></a>

                                    </td> 
                                    <td class=""><?=$row["class"]; ?></td>
                                    <td class=""><?= $row["email"]; ?></td>
                                    <td class=""><?= $row["phone"]; ?></td>
                                    <td class=""><?= $row["address"]; ?></td> 
                                    <td class="no-print">
                                        <a  href="students.php?id=<?= $id; ?>&editstudent=yes"  class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="students.php?id=<?= $id; ?>&deletestudent=yes" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData " colspan="5">No Students</td></tr>';
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