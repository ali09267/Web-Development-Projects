<?php

if(isset($_FILES['image'])){

  $fileName=$_FILES['image']['name'];
    $fileSize=$_FILES['image']['size'];
      $fileTempName=$_FILES['image']['tmp_name'];
        $fileType=$_FILES['image']['type'];
        $targetFolder = "Dummy/";

        $destination = $targetFolder.$fileName;
        move_uploaded_file($fileTempName,$destination);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet" href="registrationCSS.css">

</head>
<body>
      <!-- Navbar Display-->
<div class="nav">
    <h1>Registration Form</h1>
</div>


<div class="container mt-4">

    <h1>Please Enter your Info</h1>

    <form action="registration.php" method="post" enctype="multipart/form-data">

  <div class="mb-3">

                    <!-- Name Display-->
  <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1" autocomplete="off" >

                    <!-- Roll No Display-->
<label for="rollNo">Roll Number</label>
    <input type="text" name="rollNo" class="form-control" id="exampleInputRollNumber1" autocomplete="off">

     <!-- Email Display-->
<label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1">

  </div>
  

                        <!-- Batch Display-->
   <div class="batch">
       
   <label>Choose Your Batch</label>
   <br>
   <input type="radio" id="2021" name="batch" value="2021"><label for="batch">2021</label>
   <br>
<input type="radio" id="2022" name="batch" value="2022"><label for="batch">2022</label>
<br>
<input type="radio" id="2023" name="batch" value="2023"><label for="batch">2023</label>
<br>
<input type="radio" id="2024" name="batch" value="2024"><label for="batch">2024</label>
<br>
<input type="radio" id="2025" name="batch" value="2025"><label for="batch">2025</label>

  </div>
 <br>
                          <!-- Dept Display-->
 <div class="dept">
    <label for="dept">Choose Your Department:</label>

<select name="dept" id="deptID">
  <option value="Software">Software</option>
  <option value="Civil">Civil</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Electrical">Electrical</option>
    <option value="Telecomm">Telecommunication</option>
  <option value="Petroleum">Petroleum</option>
    <option value="Chemical">Chemical</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Bio-Medical">Bio-Medical</option>
    <option value="Arts and Literature">Arts and Literature</option>
    <option value="Buisiness Finance">Buisiness and Finance</option>

</select>
  
 </div>
 <br>
                <!--Phone Number-->
                <div class="phone">
    <label for="phone no">Phone Number:-</label>
  <input type="text" name="phone" >
  </div>
 <br>
            <!--Gender Display-->
            <div class="gender-div">
              <label>Choose Gender</label>
              <br>
              <input type="radio"  name="gender" value="Male"><label>Male</label>
<input type="radio" name="gender" value="Female"><label>Female</label>
<input type="radio" name="gender" value="Other"><label>Other</label>
            </div>
            <br>
            <!--Upload Image-->
            <div class="upload">
              <label for="image">Upload your image:</label><br>
  <input type="file" name="image" id="image" accept="image/*"><br>
            </div>
            <br>
            <!--Submit Button-->
  <div class="d-flex gap-3">
        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
</form>
          <!--View Button-->
    <form action="display.php" method="post">
        <button id="myID" name="resultsBtn" class="btn btn-primary">View Results</button>
    </form>
</div>

</div>

<div id="message" class="alert d-none" role="alert"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

if(isset($_POST["submitBtn"])){

$name=isset($_POST["name"])?trim($_POST["name"]):'';
$rollNo=isset($_POST["rollNo"])?trim($_POST["rollNo"]):'';
$email=isset($_POST["email"])?trim($_POST["email"]):'';
$batch=isset($_POST["batch"]) ? $_POST["batch"] : '';
$dept=isset($_POST["dept"])?$_POST["dept"]:'';
$phone=isset($_POST["phone"])?$_POST["phone"]:'';
$gender=isset($_POST["gender"])?$_POST["gender"]:'';

 if (empty($name) || empty($rollNo) || empty($email) || empty($batch) || empty($dept) || empty($phone) || empty($gender) || empty($destination)) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> Please fill in all the required fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    else{

$host = "localhost";   // or 127.0.0.1
$username = "root";    // default for local server like XAMPP
$password = "ali123";        // empty by default in XAMPP
$database = "task02";  // your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO STUDENT
    (std_name,rollNo,email,dept,batch,phone,gender,imgPath) 
    VALUES 
    ('$name','$rollNo','$email','$dept','$batch','$phone','$gender','$destination')";

$result= mysqli_query( $conn, $sql);//creating table via conn and sql query

if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> Data inserted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> Data insertion failed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
}
?>
