<?php
include 'connect.php';
session_start();
if (isset($_POST['checkadmin'])) {
    if ($_POST['adminpass'] == "SRKR#1990@GRE") {
        $_SESSION['adminpass'] = "Jai Sri Ram";
    } else {
        echo "<script>alert('Wrong Password');</script>";
    }
}
$student_grievance_not_solved = mysqli_query($conn, "SELECT * FROM `studentgrievence` where `status` = '0'");
$staff_grievance_not_solved = mysqli_query($conn, "SELECT * FROM `staffgrievence` where `status` = '0'");
$student_grievance_solved = mysqli_query($conn, "SELECT * FROM `studentgrievence` where `status` = '1'");
$staff_grievance_solved = mysqli_query($conn, "SELECT * FROM `staffgrievence` where `status` = '1'");

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php include "head.php"; ?>
</head>

<body class="page-sub-page page-events-listing">
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Header -->
        <div class="navigation-wrapper">
            <?php include "nav_top.php"; ?>
            <?php include "nav.php"; ?>
            <div class="background">
                <img src="assets/img/background-city.png" alt="background">
            </div>
        </div>

        <br><br>

        <div id="page-content">
            <div class="container">
                <div class="row">
                    <!--MAIN Content-->
                    <div class="col-md-9">
                        <div id="page-main">
                            <section>
                                <h2 style="align-items: center;"> Online Grievance Admin Login </h2>
                                <section id="our-professors">
                                    <div class="section-content">
                                        <div class="professors">
                                            <article class="professor-thumbnail">
                                                <figure class="professor-image"><i class='fa fa-road' style='font-size:60px;color:#ea6645;'></i></figure>
                                                <aside>
                                                    <header>
                                                        <form action="#" method="post">
                                                            <label for="adminpass">Enter Admin Password : </label>
                                                            <input type="text" name="adminpass" id="adminpass" autocomplete="off" placeholder="Enter the Password Shared to you"> <br><br>
                                                            <button type="submit" name="checkadmin" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </header>
                                                </aside>
                                            </article><!-- /.professor-thumbnail -->
                                        </div><!-- /.professors -->
                                    </div><!-- /.section-content -->
                                </section><!-- /.our-professors -->



                            </section>
                            <?php
                            if (isset($_SESSION['adminpass']) and $_SESSION['adminpass'] == "Jai Sri Ram") {
                            ?>
                                <section id="right-sidebar">
                                    <header>
                                        <h2>Student Grievance Received</h2>
                                    </header>
                                    <?php
                                    if (mysqli_num_rows($student_grievance_not_solved) == 0) echo "<h4>No Student Grievance Received</h4>";
                                    else {
                                        while ($row = mysqli_fetch_assoc($student_grievance_not_solved)) { ?>
                                            <section id="course-faq">
                                                <div class="faq-accordions">
                                                    <div class="panel-group" id="accordion">

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a style="display:flex;flex-direction:row;justify-content:space-between;" data-toggle="collapse" data-parent="#accordion" href="#gid<?php echo $row['gid'] ?>">
                                                                        <span class="question"><?php echo $row['gtype'].' ('. $row['studentname'].')'; ?></span>
                                                                        <a href="changegrievencestatus.php?stugid=<?php echo $row['gid'] ?>"><button type="button" name="studentgrievence" class="btn btn-primary">Mark as Solved</button></a>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="gid<?php echo $row['gid'] ?>" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <table class="table table-hover course-list-table tablesorter">
                                                                        <tr>
                                                                            <td>Grievance ID</td>
                                                                            <td><?php echo $row['gid']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Name</td>
                                                                            <td><?php echo $row['sname'].'. '. $row['studentname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Roll Number</td>
                                                                            <td><?php echo $row['register_number']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Email</td>
                                                                            <td><?php echo $row['email']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Department</td>
                                                                            <td><?php echo $row['department']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Batch</td>
                                                                            <td><?php echo $row['year']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Gender</td>
                                                                            <td><?php echo $row['gender']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance Type</td>
                                                                            <td><?php echo $row['gtype']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Grievance</td>
                                                                            <td><?php echo $row['grievence']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- end MAIN Content -->
                                                </div>
                                            </section>
                                </section>
                                <?php }
                                    } ?>
                        <section id="right-sidebar">
                            <header>
                                <h2>Staff Grievance Recived</h2>
                            </header>
                            <?php
                                if (mysqli_num_rows($staff_grievance_not_solved) == 0) echo "<h4>No Staff Grievance Received</h4>";
                                else {
                                    while ($row = mysqli_fetch_assoc($staff_grievance_not_solved)) {
                            ?>
                                    <section id="course-faq">
                                        <div class="faq-accordions">
                                            <div class="panel-group" id="accordion">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a style="display:flex;flex-direction:row;justify-content:space-between;" data-toggle="collapse" data-parent="#accordion" href="#staffgid<?php echo $row['gid'] ?>">
                                                                <span class="question"><?php echo $row['gtype'].' ('. $row['staff_name'].')'; ?></span>
                                                                <a href="changegrievencestatus.php?staffgid=<?php echo $row['gid'] ?>"><button type="button" name="studentgrievence" class="btn btn-primary">Mark as Solved</button></a>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="sgid<?php echo $row['gid'] ?>" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                        <table class="table table-hover course-list-table tablesorter">
                                                                        <tr>
                                                                            <td>Grievance ID</td>
                                                                            <td><?php echo $row['gid']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Name</td>
                                                                            <td><?php echo $row['staff_name']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff ID</td>
                                                                            <td><?php echo $row['staff_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Mobile</td>
                                                                            <td><?php echo $row['mobile']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Department</td>
                                                                            <td><?php echo $row['dept']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Gender</td>
                                                                            <td><?php echo $row['gender']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance Type</td>
                                                                            <td><?php echo $row['gtype']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance</td>
                                                                            <td><?php echo $row['grievence']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end MAIN Content -->
                                        </div>
                                    </section>
                            <?php }
                                } ?>
                        </section>

                        <section id="right-sidebar">
                            <header>
                                <h2>Student Grievance Solved</h2>
                            </header>
                            <?php
                                if (mysqli_num_rows($student_grievance_solved) == 0) echo "<h4>No Staff Grievance Solved</h4>";
                                else {
                                    while ($row = mysqli_fetch_assoc($student_grievance_solved)) {
                            ?>
                                    <section id="course-faq">
                                        <div class="faq-accordions">
                                            <div class="panel-group" id="accordion">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a style="display:flex;flex-direction:row;justify-content:space-between;" data-toggle="collapse" data-parent="#accordion" href="#gid<?php echo $row['gid'] ?>">
                                                                <span class="question"><?php echo $row['gtype'].' ('. $row['studentname'].')'; ?></span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="gid<?php echo $row['gid'] ?>" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                        <table class="table table-hover course-list-table tablesorter">
                                                                        <tr>
                                                                            <td>Grievance ID</td>
                                                                            <td><?php echo $row['gid']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Name</td>
                                                                            <td><?php echo $row['sname'].'. '. $row['studentname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Roll Number</td>
                                                                            <td><?php echo $row['register_number']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Email</td>
                                                                            <td><?php echo $row['email']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Department</td>
                                                                            <td><?php echo $row['department']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Batch</td>
                                                                            <td><?php echo $row['year']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Gender</td>
                                                                            <td><?php echo $row['gender']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance Type</td>
                                                                            <td><?php echo $row['gtype']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Student Grievance</td>
                                                                            <td><?php echo $row['grievence']; ?></td>
                                                                        </tr>
                                                                    </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end MAIN Content -->
                                        </div>
                                    </section>
                            <?php }
                                } ?>
                        </section>

                        <section id="right-sidebar">
                            <header>
                                <h2>Staff Grievance Solved</h2>
                            </header>
                            <?php
                                if (mysqli_num_rows($staff_grievance_solved) == 0) echo "<h4>No Staff Grievance Solved</h4>";
                                else {
                                    while ($row = mysqli_fetch_assoc($staff_grievance_solved)) {
                            ?>
                                    <section id="course-faq">
                                        <div class="faq-accordions">
                                            <div class="panel-group" id="accordion">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a style="display:flex;flex-direction:row;justify-content:space-between;" data-toggle="collapse" data-parent="#accordion" href="#sgid<?php echo $row['gid'] ?>">
                                                                <span class="question"><?php echo $row['gtype'].' ('. $row['staff_name'].')'; ?></span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="sgid<?php echo $row['gid'] ?>" class="panel-collapse collapse in">
                                                        <div class="panel-body">

                                                        <table class="table table-hover course-list-table tablesorter">
                                                                        <tr>
                                                                            <td>Grievance ID</td>
                                                                            <td><?php echo $row['gid']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Name</td>
                                                                            <td><?php echo $row['staff_name']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff ID</td>
                                                                            <td><?php echo $row['staff_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Mobile</td>
                                                                            <td><?php echo $row['mobile']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Department</td>
                                                                            <td><?php echo $row['dept']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Staff Gender</td>
                                                                            <td><?php echo $row['gender']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance Type</td>
                                                                            <td><?php echo $row['gtype']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grievance</td>
                                                                            <td><?php echo $row['grievence']; ?></td>
                                                                        </tr>
                                                                    </table>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end MAIN Content -->
                                        </div>
                                    </section>
                            <?php }
                                } ?>
                        </section>


                        

                    <?php } ?>

                    


                        </div>
                    </div>


                </div>
                <!-- end Page Content -->
            </div>
        </div>



        <!-- Footer -->
        <?php include "footer.php"; ?>
        <!-- end Footer -->

    </div>
    <!-- end Wrapper -->

    <script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/selectize.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/js/jQuery.equalHeights.js"></script>
    <script type="text/javascript" src="assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.vanillabox-0.1.5.min.js"></script>
    <script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>


    <script type="text/javascript" src="assets/js/countdown.js"></script>
    <script type="text/javascript" src="assets/js/jquery.raty.min.js"></script>
    <script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.media.js"></script>

</body>

</html>