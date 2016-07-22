<?php
include("connection.php");
$Message = "";


if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $joindate = $_POST['joindate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $subject = $_POST['subjectid'];
    $degree = $_POST['degree'];
    $designation = $_POST['designation'];
    
      $sql = "INSERT INTO  teacher  (fullname ,  degree ,  designation ,  email ,  password ,  gender , 
          joindate ,  address ,  phone ,  subjectid ,  datetime )
            VALUES ( '$fullName', '$degree', '$designation', '$email', '$password', '$gender', "
              . "'$joindate', '$address', '$phone', '$subject', now())"; 
    if ($conn->query($sql) === TRUE) {
        $Message = '<div class="col-md-12 pull-right"><div class="alert alert-success">
  <strong>Success!</strong> A new teacher has been Saved.
</div></div>';
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
            Teachers
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teachers</li>
        </ol>
    </section>
    <?php if (isset($_GET['addteacher']) || isset($_GET['editteacher'])) { ?>
        <section class="content">
            <div class="box col-xs-12">
                <div class="box-header">
                    <h3 class="box-title ng-binding">Add teacher</h3>
                </div>
                <div class="box-body ">
                    <form class="form-horizontal" method="post" action=" teachers.php" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Full name * </label>
                            <div class="col-sm-10">
                                <input type="text" name="fullName" class="form-control" required="" placeholder="Full name">
                            </div>
                        </div> 
                        
                           <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Designation </label>
                            <div class="col-sm-10">
                                <input type="text" name="designation" class="form-control" required="" placeholder="Designation">
                            </div>
                        </div> 
                        
                           <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Last Degree </label>
                            <div class="col-sm-10">
                                <input type="text" name="degree" class="form-control" required="" placeholder="Last Degree">
                            </div>
                        </div> 
                        
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Email address *</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender</label>
                            <div class="col-sm-10">

                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="male"  class="ng-pristine ng-valid">
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="ng-binding">
                                        <input type="radio" name="gender" value="female" class="ng-pristine ng-valid">
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Join Date</label>
                            <div class="col-sm-10">
                                <input type="date" id="datemask" name="birthday"  class="form-control datemask ng-pristine ng-valid">
                            </div>
                        </div>
                        <div date-picker="" selector=".datemask"></div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" class="form-control ng-pristine ng-valid" ng-model="form.address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Phone No</label>
                            <div class="col-sm-10">
                                <input type="text" name="phoneNo" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Phone No">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="subject" > 
                                    <?php
                                    $sql = "SELECT * FROM subject ORDER BY subjectname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>

                                            <option value="<?= $row['id']; ?>" class="ng-binding ng-scope"><?= $row['subjectname']; ?></option>
                                        <?php }
                                    }
                                    ?> 

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="_token" value="aalp3pzslZKyz2Lk5Ha1MY0oXhRhGCXdJeHm55yu">
                                <button type="submit" class="btn btn-primary ng-binding">Add teacher</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
<?php } ?>


    <section class="content ng-scope">
        <a href=" teachers.php?addteacher=yes"  class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Add teacher</a>
        <div class="btn-group pull-right no-print">
            <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only ng-binding">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="teachers/export" class="ng-binding">Export to Excel</a></li>
                <li><a href="teachers/exportpdf" target="_BLANK" class="ng-binding">Export to PDF</a></li>
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
                <h3 class="box-title ng-binding">List teachers</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" tooltip="" title="" name="table_search" ng-model="searchText" ng-change="searchDB()" placeholder="Search" class="form-control input-sm ng-pristine ng-valid" data-original-title="Min character length is 3">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody><tr> 
                            <th class="ng-binding">ID</th>
                            <th class="ng-binding">Full name</th> 
                            <th class="ng-binding">Designation</th>
                            <th class="ng-binding">Subject</th>
                            <th class="ng-binding">Email</th>
                            <th class="ng-binding">Phone</th>
                            <th class="ng-binding">Join Date</th>
                            <th class="no-print ng-binding">Operations</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM teacher";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>


                                <tr total-items="totalItems" ng-repeat="teacher in teachers| itemsPerPage:20" class="ng-scope">
                                    <td class="ng-binding"><?= $row["id"]; ?></td>
                                    <td>
                                        <a href="#" class="ng-binding"><?= $row["fullname"]; ?></a>

                                    </td>
                                    <td class="ng-binding"><?= $row["designation"]; ?></td>
                                    <td class="ng-binding"><?php echo get_subjectName($row["subjectid"]); ?></td>
                                    <td class="ng-binding"><?= $row["email"]; ?></td>
                                    <td class="ng-binding"><?= $row["phone"]; ?></td>
                                    <td class="ng-binding"><?= $row["joindate"]; ?></td> 
                                    <td class="no-print">
                                        <a ng-click="edit(teacher.id)" type="button" class="btn btn-info btn-flat" title="" tooltip="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a ng-click="remove(teacher, $index)" type="button" class="btn btn-danger btn-flat" title="" tooltip="" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo ' <tr   class="ng-hide"><td class="noTableData ng-binding" colspan="5">No Teacher</td></tr>';
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