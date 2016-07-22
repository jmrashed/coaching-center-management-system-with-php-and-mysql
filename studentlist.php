<?php
include("connection.php");
$Message = "";
if (isset($_GET['submit'])) {
    $className = $_GET['className'];
    $sql = "INSERT INTO class (classname)
VALUES ('$className')";
    if ($conn->query($sql) === TRUE) {
        $Message = '<div class="col-md-12 pull-right"><div class="alert alert-success">
  <strong>Success!</strong> A new class has been Saved.
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
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php
            $class = array("One", "Tow", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten");
            for ($i = 1; $i <= 10; $i++) {
                ?>

                <div class="col-md-2">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">

                            <h4>
                                Class <?php echo $class[$i - 1]; ?> 
                            </h4>

                            <h4><?php echo rand() % 100; ?> </h4>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            <?php } ?>


            <!-- ./col -->
        </div>

    </section>
    <section>
        <div class="row">
            <?php
            if ($Message) {
                echo $Message;
            }
            ?>
            <div class="col-md-12"> 
                <!-- Button trigger modal -->
                <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Add New Class
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>All Class List</h2>
                        <table class="table table-striped table-responsive">
                            <tr><th>SI</th><th>Class Name</th><th>Action</th></tr> 
                            <?php
                            $sql = "SELECT * FROM class";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr><td><?= $row["id"]; ?></td>   <td><?= $row["classname"]; ?></td>   <td>Edit | Delete</td>     </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>      
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <form class="studentlist.php" method="get">
                                    <h4 class="modal-title" id="myModalLabel">New Class Name</h4>
                            </div>
                            <div class="modal-body">

                                <label> Class Name</label> <input type="text" name="className" value="" required="" class="form-control" >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                <input  type="submit" name="submit" value="Save" class="btn btn-primary"> 
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </section>
</div>  

<?php
include("footer.php");
?>