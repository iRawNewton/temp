<?php 

// session_start();
// $username=$_SESSION['name'];

// if(!$username){
//     header("Location:index.html");
// }


$host = "localhost";
$dbusername ="root";
$dbpassword ="root";
$dbname="cms";

// variables
$enroll="";
$username="";
$rollno="";
$sem="";
$gender="";
$dob="";
$course="";
$year_enrolled="";
$nationality="";
$email="";
$mobile_no="";
$address="";

$disabledSave = false;
$disabledUpdate=true;
$disabledDelete=true;
$disabledPrint=true;
$enrollText="";
$printBtndisp="none";
//create connection
$cn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

// ---------------------------insert---------------

if (isset($_POST['submit']))
{
     // retrived details
     $enrollment_num = $_POST['enrollment_num'];
     $username = $_POST['name']; 
     $rollno = $_POST['rollno'];
     $sem = $_POST['sem'];
     $gender = $_POST['gender'];
     $dob1 = $_POST['dob'];
     $dob = date("d-m-Y", strtotime($dob1));   
     $course = $_POST['course'];
     $year_enrolled1 = $_POST['year_enrolled'];
     $year_enrolled = date("d-m-Y", strtotime($year_enrolled1));
     $nationality = $_POST['nationality'];
     $email = $_POST['email'];
     $mobile_no = $_POST['mobile_no'];
     $address = $_POST['address'];
     // retrived details ends here -->
	if (!empty ($enrollment_num) || !empty ($username) || !empty ($rollno) || !empty ($sem) || !empty ($gender) || !empty ($dob) || !empty ($course) || !empty ($year_enrolled) || !empty ($nationality) || empty ($email) || !empty ($mobile_no) || !empty ($address))
    {
		$insert = "insert into student values 
		('$enrollment_num','$username','$rollno','$sem','$gender',STR_TO_DATE('$dob', '%d-%m-%Y'),'$course',STR_TO_DATE('$year_enrolled', '%d-%m-%Y'),'$nationality','$email','$mobile_no','$address')";
		
		$run_insert = mysqli_query($cn,$insert);
		if($run_insert === true)
		{			
			echo "<script>alert('Record inserted successfully');</script>";
            $enroll="";
            $username="";
            $rollno="";
            $sem="";
            $gender="";
            $dob="";
            $course="";
            $year_enrolled="";
            $nationality="";
            $email="";
            $mobile_no="";
            $address="";
		}
		else
		{
			echo "<script>alert('Cannot insert duplicate record or field empty');</script>";
            $enroll="";
            $username="";
            $rollno="";
            $sem="";
            $gender="";
            $dob="";
            $course="";
            $year_enrolled="";
            $nationality="";
            $email="";
            $mobile_no="";
            $address="";
            $enrollText="";
            $printBtndisp="none";
		}	
	}
	else
	{
		echo "<script>alert('Error connecting to database');</script>";
	}
}

// ---------------------------search---------------
if( isset($_POST['searchBTN']) )
{
    $search_num = $_POST['search_num'];
  
    $sql = "SELECT * FROM student WHERE enrollment  ='$search_num'";
    $result = mysqli_query($cn, $sql);
        
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result))
        {
            $enroll = $row['enrollment']; 	
            $username=$row['name'];
            $rollno=$row['rollno'];
            $sem=$row['sem'];
            $gender=$row['gender'];
            $dob=$row['dob'];
            $course=$row['course'];
            $year_enrolled=$row['year_enroll'];
            $nationality=$row['nationality'];
            $email=$row['email'];
            $mobile_no=$row['mobile_no'];
            $address=$row['address'];

            $disabledSave = true;
            $disabledUpdate=false;
            $disabledDelete=false;
            $disabledPrint=false;
            $enrollText="readonly";
            $printBtndisp="true";
        }
    }
    else
	{
	 	echo "<script>alert('No record found on searching');</script>";
	}
	
}

// ---------------------------update---------------

if (isset($_POST['updateBTN']))
{
	// retrived details
	$enrollment_num = $_POST['enrollment_num'];
	$name = $_POST['name']; 
	$rollno = $_POST['rollno'];
	$sem = $_POST['sem'];
	$gender = $_POST['gender'];
	$dob1 = $_POST['dob'];
	$dob = date("d-m-Y", strtotime($dob1));	
	$course = $_POST['course'];
	$year_enrolled1 = $_POST['year_enrolled'];
	$year_enrolled = date("d-m-Y", strtotime($year_enrolled1));
	$nationality = $_POST['nationality'];
	$email = $_POST['email'];
	$mobile_no = $_POST['mobile_no'];
	$address = $_POST['address'];

	if (!empty ($enrollment_num) || !empty ($name) || !empty ($rollno) || !empty ($sem) || !empty ($gender) || !empty ($dob) || !empty ($course) || !empty ($year_enrolled) || !empty ($nationality) || empty ($email) || !empty ($mobile_no) || !empty ($address))
	{
		$update = "update student set name='$name', rollno='$rollno', sem='$sem', gender='$gender', dob=STR_TO_DATE('$dob', '%d-%m-%Y') , course='$course', year_enroll=STR_TO_DATE('$year_enrolled','%d-%m-%Y'), nationality='$nationality', email='$email', mobile_no='$mobile_no', address='$address' where enrollment= '$enrollment_num'";
		
		$run_update = mysqli_query($cn,$update);
    
		if($run_update === true)
		{
				
			echo "<script>alert('Record updated successfully');</script>";
            $enroll="";
            $username="";
            $rollno="";
            $sem="";
            $gender="";
            $dob="";
            $course="";
            $year_enrolled="";
            $nationality="";
            $email="";
            $mobile_no="";
            $address="";
            $enrollText="";
            $printBtndisp="none";
            // echo "<script>resetform(); </script>";
		}
		else
		{
			echo "<script>alert('Duplicate record');</script>";
		}	
	}
	else
	{
		echo "Error connecting database connection";
	}
}

// ---------------------------delete---------------
if (isset($_POST['deleteBTN']))
{
    $enrollment_num = $_POST['enrollment_num'];
    $sql = "DELETE FROM student WHERE enrollment ='$enrollment_num'";
    $result = mysqli_query($cn, $sql);
    echo "<script>alert('Record deleted');</script>";
    $enroll="";
    $username="";
    $rollno="";
    $sem="";
    $gender="";
    $dob="";
    $course="";
    $year_enrolled="";
    $nationality="";
    $email="";
    $mobile_no="";
    $address="";
    $enrollText="";
    $printBtndisp="none";
}



// ---------------------------print--------
if (isset($_POST['printBTN']))
{
    $enrollment_num = $_POST['enrollment_num'];
    $name = $_POST['name'];
    require('vendor/autoload.php');
    $res=mysqli_query($cn,"select * from student where enrollment='$enrollment_num'");
    if(mysqli_num_rows($res)>0)
    {        
        $html.='<style> 
        
        .table1{
            border: 1px solid black;
            display:grid;
            justify-content: center;
        } 
        .cuscenter{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 10px;
            padding-bottom: 10px;
        }
        .tablecenter{
            margin: auto;
            width: 100%;
            text-align: center;
            padding: 10px;
        }
        .partleft{
            text-align: left;
        }
        td{
            border-bottom: 1px solid black;
            padding-top: 5px;
        }
        </style>';

        $html.='<body><section class="form my-1 mx-2">
        <h2 class="h1-responsive font-weight-bold text-center cuscenter"><u>Student Information</u></h2>
                <div class="container">
                <table class="table1 align-middle tablecenter">';


        while($row=mysqli_fetch_assoc($res))
        {
            $html.='<tr> 
                        <td class="partleft">Student ID </> 
                        <td>:</td>
                        <td class="partleft">'.$row['enrollment'].'</td>
                    </tr>
                    <tr>
                        <td class="partleft">Student Name </>
                        <td>:</td>
                        <td class="partleft">'.$row['name'].'</td>
                    </tr>
                    <tr>
                        <td class="partleft">Roll no. </>
                        <td>:</td>
                        <td class="partleft">'.$row['rollno'].'</td>
                    </tr>
                    <tr>
                        <td class="partleft">Semester </>
                        <td>:</td>
                        <td class="partleft">'.$row['sem'].'</td></tr>
                    <tr>
                        <td class="partleft">Gender </>
                        <td>:</td>
                        <td class="partleft">'.$row['gender'].'</td></tr>
                    <tr>
                        <td class="partleft">Date of Birth </>
                        <td>:</td>
                        <td class="partleft">'.$row['dob'].'</td></tr>
                    <tr>
                        <td class="partleft">Course </>
                        <td>:</td>
                        <td class="partleft">'.$row['course'].'</td></tr>
                    <tr>
                        <td class="partleft">Enrolled date </>
                        <td>:</td>
                        <td class="partleft">'.$row['year_enroll'].'</td></tr>
                    <tr>
                        <td class="partleft">Nationality </>
                        <td>:</td>
                        <td class="partleft">'.$row['nationality'].'</td></tr>
                    <tr>
                        <td class="partleft">E-mail ID </>
                        <td>:</td>
                        <td class="partleft">'.$row['email'].'</td>
                    </tr>
                    <tr>
                        <td class="partleft">Mobile no. </>
                        <td>:</td>
                        <td class="partleft">'.$row['mobile_no'].'</td>
                    </tr>
                    <tr>
                        <td class="partleft">Address </>
                        <td>:</td>
                        <td class="partleft">'.$row['address'].'</td>
                    </tr>
                    
                    ';
        }
        $html.='</table></div></section></body>';
    }       
    else
    {
        $html="Data not found";
    }
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
   // $file=time().'.pdf';
    $file=$enrollment_num.$name.'.pdf';
    $mpdf->output($file,'I');
    $printBtndisp="none";
}
?>




















<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Form</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- All CSS start here -->
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Your custom styles (optional) -->

    <link rel="stylesheet" href="css/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap');
    </style>
    <style>
        /* CSS code here */
        
        .footer_color {
            background-color: #3F729B;
        }
        
        .padIN {
            padding-left: -10px;
        }
        
        .row1 {
            background: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 10px 30px 0px rgba(0, 0, 0, 0.2);
            /* box-shadow: 12px 12px 22px rgb(65, 60, 60); */
        }
        
        .gender_row {
            border-radius: 10px;
            box-shadow: 0px 0px 0px rgb(255, 255, 255);
            color: grey;
        }
        
        .text_color {
            color: grey;
        }
        
        h2 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        @media screen and (max-width: 767px) {
            .row1 {
                padding: 0.5cm;
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


</head>

<body>
    <form name="student" id="studentFORM" method="POST">
        <!-- Start your project here-->
        <!-- Navigation Bar starts here -->
        <nav class="navbar navbar-expand-lg navbar-dark footer_color">
            <a class="navbar-brand" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px" href="#">College Management System &ensp; </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- <div class="collapse navbar-collapse" id="navbarNav" data-toggle="collapse" data-target=".navbar-collapse"> -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Student Form <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick='resetform()'> Clear Form </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navigation Bar ends here -->

        <!-- Content part starts here -->

        <!--Section heading-->
        <section class="mb-0">
            <h2 class="h1-responsive font-weight-bold text-center mt-4 mb-0">Student Information</h2>
        </section>
        <!-- Material input -->
        <section class="mb-5">
            <div class="container">
                <div class="row no-gutters mx-1 mb-4 text-center border-bottom">
                    <div class="md-form col-md-10 mx-auto text-center">
                        <input class="form-control" id="searchID" name="search_num" type="text" placeholder="search" aria-label="Search">
                    </div>
                    <div class="md-form col-md-1 mx-auto">
                        <button class="btn btn-elegant btn-rounded btn-sm my-2" type="submit" name="searchBTN" value="searchBTN" style="color:white;"> <i class="fas fa-search">&nbsp;&nbsp;</i> Search</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section body -->
        <section class="form my-1 mx-2">
            <!-- form initial place delete if works -->

            <div class="container">
                <div class="row row1 no-gutters mx-1 mb-4">

                    <div class="md-form col-md-5 mx-auto text-center">
                        <input type="text" id="enrollment" class="form-control" name="enrollment_num"  value="<?= $enroll ?>" <?= $enrollText ?> >
                        <label for="enrollment">Enrollment number</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto text-center">
                        <input type="text" id="name" class="form-control" name="name" value="<?= $username ?>">
                        <label for="name">Name</label>
                    </div>

                    <div class="md-form col-md-3 mx-auto">
                        <input type="text" id="roll" class="form-control" name="rollno"  value="<?= $rollno ?>">
                        <label for="roll">Roll number</label>
                    </div>

                    <div class="md-form col-md-3 mx-auto">
                        <input type="number" id="sem" class="form-control" name="sem" value="<?= $sem ?>">
                        <label for="roll">Semester</label>
                    </div>

                    <div class="row col-md-3 mx-auto gender_row">

                        <div class="form-check form-check-inline">
                            <label for="gender">Gender: </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if($gender=='Male'){ echo "checked=checked";}  ?>>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if($gender=='Female'){ echo "checked=checked";}  ?>>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Others" <?php if($gender=='Others'){ echo "checked=checked";} ?>>
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>

                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="date" id="dd" class="form-control" name="dob" value="<?= $dob ?>">
                        <label for="dd">Date of birth</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="course" class="form-control" name="course" value="<?= $course?>" data-toggle="modal" data-target="#exampleModalCenter" autocomplete="off">
                        <label for="course">Course</label>
                       
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                        aria-hidden="true">

                        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                        <div class="modal-dialog modal-dialog-centered" role="document">


                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select Course</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- ... -->
                                <select class="browser-default custom-select" name="courseOpt" id="selectID">
                                    <option value="">Choose your option</option>
                                    <?php
                                        $sql = "SELECT distinct c_name FROM department";
                                        $result = mysqli_query($cn, $sql);
                                        while ($row = mysqli_fetch_array($result))
                                        {
                                            echo '<option value ='.$row['c_name'].'>  ' . $row['c_name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success btn-sm" type="button" onclick='selectTag()' name="modalSelectBtn">Select</button>
                                <button type="button" id="cancel" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- modal -->
                    </div>
                    

                    <div class="md-form col-md-5 mx-auto">
                        <input type="date" id="EnrollYear" class="form-control" name="year_enrolled" value="<?= $year_enrolled ?>">
                        <label for="EnrollYear">Year enrolled</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="nationality" class="form-control" name="nationality" value="<?= $nationality ?>">
                        <label for="nationality">Nationality</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="email" class="form-control" name="email" value="<?= $email ?>">
                        <label for="email">E-mail</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="phone" class="form-control" name="mobile_no" value="<?= $mobile_no ?>">
                        <label for="phone">Mobile number</label>
                    </div>

                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <textarea id="address" class="md-textarea form-control" rows="3" name="address" value="<?= $address ?>"><?= $address ?></textarea>
                        <label for="address">Address</label>
                    </div>

                    
                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <!-- <button class="btn btn-elegant btn-rounded btn-sm my-2" type="submit" style="color:white;">Search</button> -->
                        <button class="btn btn-elegant w-25 mx-4" id="insertBtnID" type="submit" name="submit" style="font-family: 'STIX Two Text', serif; color:white;" <?php if ($disabledSave) { echo 'disabled="disabled"';}?>>save</button>
                        <button class="btn btn-elegant w-25 mx-4" id="updateBtnID" type="submit" name="updateBTN" style="font-family: 'STIX Two Text', serif; color:white;" <?php if ($disabledUpdate) { echo 'disabled="disabled"';}?>>update</button>
                        <button class="btn btn-elegant w-25 mx-4" id="deleteBtnID" type="submit" name="deleteBTN" style="font-family: 'STIX Two Text', serif; color:white;" <?php if ($disabledDelete) { echo 'disabled="disabled"';}?>>delete</button>
                        <button class="btn btn-elegant w-75 mx-4" id="printBtnID" type="submit" name="printBTN" style="font-family: 'STIX Two Text', serif; color:white; display:<?= $printBtndisp ?>;" <?php if ($disabledPrint) { echo 'disabled="disabled"';}?>>print</button>
                    </div>

                </div>
            </div>
    </form>

    </section>

    <!-- Content part ends here-->

    <!-- End your project here-->

    <!-- Footer -->
    <footer class="page-footer font-small footer_color">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="#"> xxxxxxxxxxxxxx</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
  
    <!-- Bootstrap CSS -->

    <!-- Optional JavaScript -->

    <!-- for reset button-->
    <script type="text/javascript">
        function resetform() {
            document.getElementById("studentFORM").reset; 
        }
        function selectTag()
        {
            var x = document.getElementById("selectID").value;
            document.getElementById("course").value = x;
            document.getElementById("cancel").click();
        }
    </script>

    <!-- for hide query -->
   
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.6/bootstrap-growl.min.js" integrity="sha512-KgI7fghDFHr4D+sJIDQGZLpNCmDmlQHuISbPeIwHd7iJCU20FtL5+l7mD2aMr6NUVnaDua1lEg4tTOVe/XiYBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- if above doesnt work -->
   
    <!-- PHP Query -->
</body>

</html>