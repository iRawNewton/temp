<?php 

$host = "localhost";
$dbusername ="root";
$dbpassword ="root";
$dbname="cms";

//create connection
$cn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

$que = "";

if (isset($_POST['submit']))
    {
		// retrived details
		$enrollment_num = $_POST['enrollment_num'];
		$name = $_POST['name']; 
		$rollno = $_POST['rollno'];
		$sem = $_POST['sem'];
		//$gender = $_POST['gender'];
        $gender = 'help';
		$dob1 = $_POST['dob'];
		$dob = date("d-m-Y", strtotime($dob1));
		
		$course = $_POST['course'];
		$year_enrolled1 = $_POST['year_enrolled'];
		$year_enrolled = date("d-m-Y", strtotime($year_enrolled1));

		$temp='STR_TO_DATE("$dob","%d-%m-%y")';
		$temp1='STR_TO_DATE("$year_enrolled","%d-%m-%y")';

		$nationality = $_POST['nationality'];
		$email = $_POST['email'];
		$mobile_no = $_POST['mobile_no'];
		$address = $_POST['address'];

		if (!empty ($enrollment_num) || !empty ($name) || !empty ($rollno) || !empty ($sem) || !empty ($gender) || !empty ($dob) || !empty ($course) || !empty ($year_enrolled) || !empty ($nationality) || empty ($email) || !empty ($mobile_no) || !empty ($address))
		{
			$insert = "insert into student values 
			('$enrollment_num','$name','$rollno','$sem','$gender',STR_TO_DATE('$dob', '%d-%m-%Y'),'$course',STR_TO_DATE('$year_enrolled', '%d-%m-%Y'),'$nationality','$email','$mobile_no','$address')";
				
			$run_insert = mysqli_query($cn,$insert);
			if($run_insert === true)
			{
					
				echo "";
			}
			else
			{
				echo "Cannot insert dublicate values.  ";
			}	
		}
		else
		{
			echo "Error connecting database connection";
		}

	}

if( isset($_POST['search']) )
{
    //$name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
	$sql = "SELECT * FROM student WHERE rollno ='32'";
    $que = "hello";

	$query_run = mysqli_query($cn,$sql);

	if (mysqli_num_rows($query_run) > 0)
	{
		while($row = mysqli_fetch_array($query_run))
		{     	
			$name = $row['name'];
            $que=$row['name'];
            echo '<script>
			document.getElementById("name").value="<?php que?>";
			StudentForm.html?name=36;
			</script>';
		}
	}
	else
	{
		echo "No records found.";
	}	
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
        /* CSS code here */
        
        .footer_color {
            background-color: #3F729B;
        }
        
        .padIN {
            padding-left: -10px;
        }
        
        .row {
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
            .row {
                padding: 0.5cm;
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


</head>

<body>
    <form name="studentForm" id="studentForm" method="POST">
        <!-- Start your project here-->
        <!-- Navigation Bar starts here -->
        <nav class="navbar navbar-expand-lg navbar-dark footer_color">
            <a class="navbar-brand" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 20px" href="#">College Management System &ensp; </a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- <div class="collapse navbar-collapse" id="navbarNav" data-toggle="collapse" data-target=".navbar-collapse"> -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Student Form <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick='resetform()'> Clear Form </button> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="form-inline">
                        <div class="md-form my-0">
                            <input class="form-control mr-sm-1" id="search" type="search" placeholder="" aria-label="Search">
                        </div>
                        <div class="md-form my-0">
                            <i class="fas fa-search my-3" id="search" aria-label="Search" style="cursor: pointer;"></i>
                        </div>
                    </li>
                    <!-- </div> -->

                </ul>
            </div>
        </nav>
        <!-- Navigation Bar ends here -->

        <!-- Content part starts here -->

        <!--Section heading-->
        <section class="mb-5">
            <h2 class="h1-responsive font-weight-bold text-center my-4">Student Information</h2>
        </section>
        <!-- Section body -->
        <section class="form my-1 mx-2">
            <!-- form initial place delete if works -->

            <div class="container">
                <div class="row no-gutters mx-1 mb-4">

                    <div class="md-form col-md-5 mx-auto text-center">
                        <input type="text" id="enrollment" class="form-control" name="enrollment_num">
                        <label for="enrollment">enrollment number</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto text-center">
                        <input type="text" id="name" class="form-control" name="name" value="<?= $que ?>">
                        <label for="name">name</label>
                    </div>

                    <div class="md-form col-md-3 mx-auto">
                        <input type="text" id="roll" class="form-control" name="rollno">
                        <label for="roll">roll number</label>
                    </div>

                    <div class="md-form col-md-3 mx-auto">
                        <input type="number" id="sem" class="form-control" name="sem">
                        <label for="roll">semester</label>
                    </div>

                    <div class="row col-md-3 mx-auto gender_row">

                        <div class="form-check form-check-inline">
                            <label for="gender">gender: </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Others">
                            <label class="form-check-label" for="inlineRadio3">Others</label>
                        </div>

                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="date" id="dd" class="form-control" name="dob">
                        <label for="dd">Date of Birth</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="course" class="form-control" name="course">
                        <label for="course">course</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="date" id="EnrollYear" class="form-control" name="year_enrolled">
                        <label for="EnrollYear">year enrolled</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="nationality" class="form-control" name="nationality">
                        <label for="nationality">nationality</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="email" class="form-control" name="email">
                        <label for="email">e-mail</label>
                    </div>

                    <div class="md-form col-md-5 mx-auto">
                        <input type="text" id="phone" class="form-control" name="mobile_no">
                        <label for="phone">Mobile Number</label>
                    </div>

                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <textarea id="address" class="md-textarea form-control" rows="3" name="address"></textarea>
                        <label for="address">address</label>
                    </div>


                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <button class="btn btn-primary w-50" type="submit" name="submit">save</button>
                    </div>
                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <button class="btn btn-primary w-50" id="help" type="se" name="se" value="se">se</button>
                    </div>
                    <div class="md-form form-group col-md-8 mx-auto text-center">
                        <button class="btn btn-primary w-50" id="help1" type="search" name="s" value="s">search1</button>
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
        <div class="footer-copyright text-center py-3">?? 2021 Copyright:
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
    <script type="text/javascript">
        var a = document.getElementById('disc-50');
        a.onclick = function() {
            Clipboard_CopyTo("T9TTVSQB");
            var div = document.getElementById('code-success');
            div.style.display = 'block';
            setTimeout(function() {
                document.getElementById('code-success').style.display = 'none';
            }, 900);
        };

        function Clipboard_CopyTo(value) {
            var tempInput = document.createElement("input");
            tempInput.value = value;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
        }
    </script>
    <!-- Bootstrap CSS -->

    <!-- Optional JavaScript -->

    <!-- for reset button-->
    <script type="text/javascript">
        function resetform() {
            document.getElementById("studentForm").reset();
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