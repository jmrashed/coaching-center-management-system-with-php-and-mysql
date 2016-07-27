<!-- Left side column. contains the logo and sidebar -->  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $loginID; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <hr>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="students.php">
                    <i class="fa fa-users"></i> <span>Students </span> 
                </a>
            </li>
            <li>
                <a href="teachers.php">
                    <i class="fa fa-user"></i> <span>Teachers </span> 
                </a>
            </li>

            <li>
                <a href="classes.php">
                    <i class="fa fa-tasks"></i> <span>Classes </span> 
                </a>
            </li>
            <li>
                <a href="subjects.php">
                    <i class="fa fa-list"></i> <span>Subjects </span> 
                </a>
            </li>
            <li>
                <a href="exams.php">
                    <i class="fa fa-file-word-o"></i> <span>Exams </span> 
                </a>
            </li>

            <li>
                <a href="results.php">
                    <i class="fa fa-file-word-o"></i> <span>Results </span> 
                </a>
            </li>

            <li>
                <a href="calendar.php">
                    <i class="fa fa-calendar-check-o"></i> <span>Calendar </span> 
                </a>
            </li>

            <li>
                <a href="notices.php">
                    <i class="fa fa-calendar-check-o"></i> <span>Notice </span> 
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>My Profile</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="changePassword.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Edit Profile</a></li>
                    <li><a href="message.php"><i class="fa fa-circle-o"></i> Message</a></li>
                    <li><a href="compose.php"><i class="fa fa-circle-o"></i> Compose Message</a></li>
                    <li><a href="logOut.php"><i class="fa fa-circle-o"></i> Logout</a></li> 
                </ul>
            </li> 
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="message.php">Inbox <span class="label label-primary pull-right">13</span></a>
                    </li>
                    <li><a href="compose.php">Compose</a></li>
                    <li><a href="readMessage.php">Read</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

