<?php
  include 'connect.php';
  $staf_details = mysqli_query($con,"SELECT * FROM `faculty`");
  if(isset($_POST['studentgrievence'])){
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
    $studentgravence = $con -> prepare("INSERT INTO `studentgrievence`(`sname`, `studentname`, `register_number`, `email`, `department`, `year`, `gender`, `gtype`, `grievence`) VALUES (?,?,?,?,?,?,?,?,?)");
    $studentgravence -> bind_param("sssssssss",$sname,$studentname,$register_number,$email,$department,$year,$gender,$gtype,$grievence);
    if($studentgravence -> execute()){
      echo "<script>alert('Your Grievence is submitted successfully')</script>";
    }
    else{
      echo "<script>alert('Your Grievence is not submitted successfully')</script>";
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Grievence Portal</title>	

		<meta name="keywords" content="WebSite Template" />
		<meta name="description" content="Porto - Multipurpose Website Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/srkr_logo.png" type="image/x-icon" />

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

    <style>
      /* Styles for the modal container */
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
      }
    
      /* Styles for the modal content */
      .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        border-radius: 8px;
      }
    
      /* Styles for form elements inside the modal */
      .form_wrap {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
      }
    
      .form_item {
        flex: 0 0 48%;
        margin-bottom: 15px;
      }
    
      .form_item label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
    
      .form_item input,
      .form_item select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
    
      .form_wrap.form_grp .form_item {
        flex-basis: 100%;
      }
    
      /* Styles for the submit button */
      .btn {
        text-align: right;
      }
    
      .btn input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    
      .btn button[type="button"] {
    padding: 10px 20px;
    background-color: #ccc;
    color: #000;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px; /* Add some space between the buttons */
  }

  .btn button[type="button"]:hover {
    background-color: #16b46a;
  }
  /* Add this CSS to position the buttons below the images */
.feature-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.feature-box .image-container {
  margin-bottom: 10px; /* Add some space between the image and button */
}

.feature-box .btn button {
  margin-top: 10px; /* Add some space between the image and button */
}


  </style>
    
    

</head>
	<body data-plugin-page-transition>

		<div class="body coming-soon">
            <header id="header" data-plugin-options="{'stickyEnabled': false}">
				<div class="header-body border border-top-0 border-end-0 border-start-0">
					<div class="header-container container py-2">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<p class="mb-0 text-dark"><strong>Get in touch!</strong> <a href="tel:012345679" class="text-color-dark text-color-hover-primary">9848506504</a></span><span class="d-none d-sm-inline-block ps-1"> | <a href="#">principal@srkrec.ac.in</a></span></p>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<ul class="header-social-icons social-icons me-2">
										<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
										<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
									<div class="header-nav-features">
										<div class="header-nav-features-search-reveal-container">
											<div class="header-nav-feature header-nav-features-search header-nav-features-search-reveal d-inline-flex">
												<a href="#" class="header-nav-features-search-show-icon d-inline-flex text-decoration-none"><i class="fas fa-search header-nav-top-icon"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-nav-features header-nav-features-no-border p-static">
					<div class="header-nav-feature header-nav-features-search header-nav-features-search-reveal header-nav-features-search-reveal-big-search header-nav-features-search-reveal-big-search-full">
						<div class="container">
							<div class="row h-100 d-flex">
								<div class="col h-100 d-flex">
									<form role="search" class="d-flex h-100 w-100" action="page-search-results.html" method="get">
										<div class="big-search-header input-group">
											<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Type and hit enter...">
											<a href="#" class="header-nav-features-search-hide-icon"><i class="fas fa-times header-nav-top-icon"></i></a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
            <div>
                <div class="modal-content">
                  <form method="post" action="#">
                    <div class="form_wrap form_grp">
                    <div class="form_item">
                        <label>Staf Id</label>
                        <select name="stafid" required>
                            <option value="">Enter Staf ID</option>
                            <option value="2024">2020 -2024</option>
                        </select>
                      </div>
                      <div class="form_item">
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
                    <div class="form_wrap">
                      <div class="form_item">
                        <label>Mobile</label>
                        <input type="text" name="mobile" required>
                      </div>
                    </div>
                    <div class="form_wrap form_grp">
                      <div class="form_item">
                        <label>Designation</label>
                        <select name="designation" required>
                            <option value="">Select Designation</option>
                            <option value="Professor">Professor</option>
                            <option value="Associate_Professor">Associate Professor</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Teaching_Assistant">CSD</option>
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
                    </div>
                    <div class="form_wrap">
                      <div class="form_item">
                        <label>Gender</label>
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          <option value="others">others</option>
                        </select>
                      </div>
                    </div>
                    <div class="form_wrap">
                      <div class="form_item">
                        <label>Grievence Type</label>
                        <select name="gtype" required>
                          <option value="">Select your Grievence type</option>
                          <option value="Women Grievence/Sexual Harassment Related">Women Grievence/Sexual Harassment Related</option>
                          <option value="Ragging Related">Ragging Related</option>
                          <option value="Infrastructure Related">Infrastructure Related</option>
                          <option value="Faculty Related">Faculty Related</option>
                          <option value="Hostel Related">Hostel Related</option>
                          <option value="Examination Related">Examination Related</option>
                          <option value="others">others</option>
                        </select>
                      </div>  
                    </div>
                    <div class="form_wrap">
                      <div class="form_item">
                        <label>Grievence</label>
                        <input type="text" name="grievence" required>
                      </div>
                    </div>
                    <div class="btn">
                      <input type="submit" name="studentgrievence" value="Submit">
                    </div>
                  </form>
                </div>
               </div>
            


			<footer id="footer">
				<div class="container">
					<div class="row py-5">
						<div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-4 mb-lg-0">
							<a href="index.html" class="logo pe-0 pe-lg-3 ps-3 ps-md-0">
								<img alt="Porto Website Template" src="img/srkrlogo.png" height="32">
							</a>
						</div>
						<div class="col-md-8 d-flex justify-content-center justify-content-md-end mb-4 mb-lg-0">
							<div class="row">
								<div class="col-md-6 mb-3 mb-md-0">
									<div class="ms-3 text-center text-md-end">
										<h5 class="text-3 mb-0 text-color-light">The Grievance Committee Members</h5>
										<p class="text-4 mb-0"><span class="ps-1"><a href="tel:012345679" class="text-color-hover-light"><b>Chairperson</b><br>Prof. M. Jagapathi Raju – Principal 

										
											</a></span></p>            
									</div>
								</div>
								<div class="col-md-6">
									<div class="ms-3 text-center text-md-end">
										<h5 class="text-3 mb-0 text-color-light">Coordinators </h5>
										<p class="text-4 mb-0"><span class="ps-1"><a href="tel:012345679" class="text-color-hover-light">Prof. S. Venkata Ramana for Students - 9848506504 <br>

											Prof. Murali Krishnam Raju for Staff & other stake holders - 9441169979
											</a></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright footer-copyright-style-2">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start mb-2 mb-lg-0">
								<p>Sagi Rama Krishnam Raju Engineering College</p>
							</div>
							<div class="col-md-8 d-flex align-items-center justify-content-center justify-content-md-end mb-4 mb-lg-0">
								<p><i class="far fa-envelope text-color-primary top-1 p-relative"></i><a href="mailto:mail@example.com" class="opacity-7 ps-1">principal@srkrec.ac.in</a></p>
								<ul class="footer-social-icons social-icons social-icons-clean social-icons-icon-light ms-3">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-2"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-2"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-2"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
    <!-- Modal Form -->

		<!-- Vendor -->
		<script src="vendor/plugins/js/plugins.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

	</body>
</html>







       


       