<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

require "server.php"; // Utilizes server.php info

/* Links SQL Data Table to HTML Form values */
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$employee_id = mysqli_real_escape_string($conn, $_REQUEST['employee_id']);
$Service_Type = mysqli_real_escape_string($conn, $_REQUEST['issue_type']);
$Operating_System = mysqli_real_escape_string($conn, $_REQUEST['Operating_System']);
$Message = mysqli_real_escape_string($conn, $_REQUEST['comments']);

/* Inserts data into SQL Table */
$sql = "INSERT INTO main (Name, Employee_ID, Service_Type, Operating_System, Message)
VALUES ('$name', '$employee_id', '$Service_Type', '$Operating_System', '$Message')";

/* Connection to database test */
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/* Form data verification things */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // primary validate function
    function validate($str) {
        return trim(htmlspecialchars($str));
    }

    if (empty($_POST['name'])) {
        $nameError = 'Name should be filled';
    } else {
        $name = validate($_POST['name']);
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {  // Fix this to not allow numbers
            $nameError = 'Name can only contain letters, numbers and white spaces';
        }
    }

    if (empty($_POST['employee_id'])) {
        $idError = 'employee_id should be filled';
    } else {
        $employee_id = validate($_POST['employee_id']);
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $employee_id)) {
            $idError = 'employee_id can only contain letters and numbers';
        }
    }

    // Shorthand Conditionals
    $comments = !empty($_POST['comments']) ? validate($_POST['comments']) : "";
    $Operating_System = !empty($_POST['Operating_System']) ? validate($_POST['Operating_System']) : "";
    $issue_type = !empty($_POST['issue_type']) ? validate($_POST['issue_type']) : "";
    $Software_App = !empty($_POST['Software_Apps']) ? validate($_POST['Software_Apps']) : ""; // Need to fix so multiple apps can be printed



    /*
    $target_dir = "";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, a file with that name already exists.<br>";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry only JPG, JPEG, PNG, & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Your file was not uploaded.<br><br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br><br>";
        } else {
            echo "Sorry, there was an error uploading your file.<br><br>";
        }
    }

    */

    /* Prints message with recorded form information */
    if (empty($nameError) && (empty($idError))) {
        echo "<b><u>The following information was submitted:</b></u><br>";
        echo "<br>
                <b>Name:</b> $name <br>
                <b>Employee ID:</b> $employee_id <br>
                <b>Category:</b> $issue_type <br>
                <b>Operating System:</b> $Operating_System <br>
                <b>Application:</b>  $Software_App <br> 
                <b>Comments:</b> $comments <br>
                <b>Attachments:</b>  <br>
                <br>
                <a href=\"index.php\">Click here to go back to the form.</a>
		    ";
        exit(); // terminates the script
    }
}


?>

<br><hr>
<a href="index.php">Click here to go back to the form.</a>
<br>
<a href="search_page.php">Click here for the search page.</a>

</body>
</html>
