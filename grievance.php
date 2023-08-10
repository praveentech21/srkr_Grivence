<?php
include 'connect.php';
if (isset($_POST['studentgrievence'])) {
    $recaptchaSecretKey = '6LcZkpAnAAAAALWzOiP4FruTsihH8jybGyNqnGK4';
$recaptchaResponse = $_POST['g-recaptcha-response'];
$verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';

$response = file_get_contents($verifyUrl . "?secret=$recaptchaSecretKey&response=$recaptchaResponse");
$responseData = json_decode($response);


    if ($responseData->success) {
        $sname = $_POST['sname'];
        $grievence = $_POST['grievence'];
        $gtype = $_POST['gtype'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $department = $_POST['department'];
        $register_number = $_POST['register_number'];
        $studentname = $_POST['studentname'];
        $sname = $_POST['sname'];
        $email = $_POST['email'];
        $studentgravence = $conn->prepare("INSERT INTO `studentgrievence`(`sname`, `studentname`, `register_number`, `email`, `department`, `year`, `gender`, `gtype`, `grievence`) VALUES (?,?,?,?,?,?,?,?,?)");
        $studentgravence->bind_param("sssssssss", $sname, $studentname, $register_number, $email, $department, $year, $gender, $gtype, $grievence);
        if ($studentgravence->execute()) {
            echo "<script>alert('Your Grievence is submitted successfully')</script>";
        } else {
            echo "<script>alert('Your Grievence is not submitted successfully')</script>";
        }
    } else {
        echo "<script>alert('Please verify captcha')</script>";
    }
}
if (isset($_POST['staffgrievence'])) {
    if ($responseData->success) {
        $staff_name = $_POST['staff_name'];
        $staff_id = $_POST['staff_id'];
        $dept = $_POST['dept'];
        $mobile = $_POST['mobile'];
        $designation = $_POST['designation'];
        $gender = $_POST['gender'];
        $gtype = $_POST['gtype'];
        $grievence = $_POST['grievence'];
        $staffgrievence = $conn->prepare("INSERT INTO `staffgrievence`(`staff_name`, `staff_id`, `dept`, `designation`, `gender`, `mobile`, `gtype`, `grievence`) VALUES (?,?,?,?,?,?,?,?)");
        $staffgrievence->bind_param("ssssssss", $staff_name, $staff_id, $dept, $designation, $gender, $mobile, $gtype, $grievence);
        if ($staffgrievence->execute()) {
            echo "<script>alert('Your Grievence is submitted successfully')</script>";
        } else {
            echo "<script>alert('Your Grievence is not submitted successfully')</script>";
        }
    } else {
        echo "<script>alert('Please verify captcha')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php include "head.php"; ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Grievence</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div id="page-content">
            <div class="container">
                <div class="row">
                    <!--MAIN Content-->
                    <div class="col-md-9">
                        <div id="page-main">
                            <section>
                                <h2 align="center">Online Grievance </h2>
                                <p class='text1'>
                                    The college is committed to providing a congenial atmosphere for learning and personal growth of the student and faculty. Besides other welfare measures, a grievance mechanism is constituted to encourage students, faculty and other stakeholders to express individual and group concerns related to academic and non-academic aspects. In order to ensure convenience and confidentiality in the grievance redressal mechanism, the S.R.K.R. Engineering College implements an online grievance redressal mechanism as well. Through this online grievance system, the grievance form that is available on the college website, is filled in by Students, Faculty and other Stakeholders. Once they submit the grievance form on the website, the complaint will be received by the coordinator of the Grievance Redressal Cell. The coordinator takes it to the purview of the committee for further necessary action. This process in general completes within a week..
                                </p>

                            </section>

                            <section>
                                <div class="content">
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#login">Student</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#regis">Staf</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div id="login" class="container tab-pane active">
                                            <form method="post" action="#">
                                                <div class="form-group">
                                                    <label>Surname</label>
                                                    <input type="text" name="sname" placeholder="Surname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" name="studentname" placeholder="Full Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input type="text" name="register_number" placeholder="Registration Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select name="department" required>
                                                        <option value="">Select Department</option>
                                                        <option value="CSD">CSD</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="AIML">AIML</option>
                                                        <option value="AIDS">AIDS</option>
                                                        <option value="CSBS">CSBS</option>
                                                        <option value="IT">IT</option>
                                                        <option value="CSI">CSI</option>
                                                        <option value="CS_cyber_Securty">CS(cyber Securty)</option>
                                                        <option value="MECH">MECH</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="EEE">EEE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Year Of Study</label>
                                                    <select name="year" required>
                                                        <option value="">Select Year </option>
                                                        <option value="2024">2020 -2024</option>
                                                        <option value="2025">2021 -2025</option>
                                                        <option value="2026">2022 -2026</option>
                                                        <option value="2027">2023 -2027</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="others">others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Grievence Type</label>
                                                    <select name="gtype" required>
                                                        <option value="">Select Grievence type </option>
                                                        <option value="Women Grievence/Sexual Harassment Related">Women Grievence/Sexual Harassment Related</option>
                                                        <option value="Ragging Related">Ragging Related</option>
                                                        <option value="Infrastructure Related">Infrastructure Related</option>
                                                        <option value="Faculty Related">Faculty Related</option>
                                                        <option value="Hostel Related">Hostel Related</option>
                                                        <option value="Examination Related">Examination Related</option>
                                                        <option value="others">others</option>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label>Grievence</label>
                                                    <input type="text" name="grievence" placeholder="Tell your Grievence Here " required>
                                                </div>
                                                <div class="g-recaptcha" data-sitekey="6LcZkpAnAAAAAAX93nhGtUGMOw7xsH_Wo86D_Ie6"></div><br>
                                                <div class="form-group">
                                                    <button type="submit" name="studentgrievence" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Staff Grievence Starts Here -->

                                        <div id="regis" class="container tab-pane fade">
                                            <form method="post" action="#">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="staff_name" placeholder=" Your Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Staff ID</label>
                                                    <input type="text" name="staff_id" placeholder=" Staff ID" required>
                                                    <small>If you dont have staff ID enter your work</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Department</label>
                                                    <select name="dept" required>
                                                        <option value="">Select Department</option>
                                                        <option value="CSD">CSD</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="AIML">AIML</option>
                                                        <option value="AIDS">AIDS</option>
                                                        <option value="CSBS">CSBS</option>
                                                        <option value="IT">IT</option>
                                                        <option value="CSI">CSI</option>
                                                        <option value="CS_cyber_Securty">CS(cyber Securty)</option>
                                                        <option value="MECH">MECH</option>
                                                        <option value="CIVIL">CIVIL</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="EEE">EEE</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="mobile" placeholder="Your Mobile Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <select name="designation" required>
                                                        <option value="">Select Designation</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Associate_Professor">Associate Professor</option>
                                                        <option value="Lecturer">Lecturer</option>
                                                        <option value="Instructor">Instructor</option>
                                                        <option value="Teaching_Assistant">Teaching_Assistant</option>
                                                        <option value="Assistant_Professor">Assistant Professor</option>
                                                        <option value="HOD">Head of Department</option>
                                                        <option value="Director">Director</option>
                                                        <option value="Librarian">Librarian</option>
                                                        <option value="Lab_Technician">Lab Technician</option>
                                                        <option value="Office_Assistant">Office Assistant</option>
                                                        <option value="Computer Operator">Computer Operator</option>
                                                        <option value="Clerk">Clerk</option>
                                                        <option value="Peon">Peon</option>
                                                        <option value="Student_Counselor">Student Counselor</option>
                                                        <option value="Placement_Officer">Placement Officer</option>
                                                        <option value="Sports_Coach">Sports Coach</option>
                                                        <option value="Event Coordinator">Event Coordinator</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female   ">Female </option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Grievence Type</label>
                                                    <select name="gtype" required>
                                                        <option value="">Select Grievence type </option>
                                                        <option value="Women Grievence/Sexual Harassment Related">Women Grievence/Sexual Harassment Related</option>
                                                        <option value="Ragging Related">Ragging Related</option>
                                                        <option value="Infrastructure Related">Infrastructure Related</option>
                                                        <option value="Faculty Related">Faculty Related</option>
                                                        <option value="Hostel Related">Hostel Related</option>
                                                        <option value="Examination Related">Examination Related</option>
                                                        <option value="others">others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Grievence</label>
                                                    <input type="text" name="grievence" placeholder="Type Your Grievence" required>
                                                </div>
                                                <div class="g-recaptcha" data-sitekey="6LcZkpAnAAAAAAX93nhGtUGMOw7xsH_Wo86D_Ie6"></div><br>
                                                <button type="submit" name="staffgrievence" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div><!-- /#page-main -->
                    </div><!-- /.col-md-8 -->
                    <!-- end MAIN Content -->

                </div><!-- /.row -->
            </div><!-- /.container -->


        </div>
        <!-- end Page Content -->
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

    <script>
        var a = 0;
        $(window).scroll(function() {

            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {

                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }

        });
    </script>
</body>

</html>