<!-- https://developer.hyvor.com/tutorials/demo/php/forms-complete -->

<?php

?>

<html>
<head>
    <title>Knowledge Form</title>
    <link rel="stylesheet" href="style.css">

    <style type="text/css"> /* Is this needed? */
        .error {
            color:red;
        }
    </style>

</head>
<body>
<a href="index.php">Click here to refresh page.</a>
<br>
<a href="search_page.php">Click here for the search page.</a>
<hr>

<form method="POST" action="action_page.php" enctype="multipart/form-data">
    Name:
    <input type="text" name="name" value="" required>  <!-- <*****?php if (isset($name)) echo $name ?*****> -->
    <span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>
    Employee ID:
    <input type="text" name="employee_id" value="<?php if (isset($employee_id)) echo $employee_id ?>" required>
    <span class="error"><?php if (isset($idError)) echo $idError ?></span><br>
    <br>
    <input type="radio" name="issue_type" value="Software">Software <br>
    <input type="radio" name="issue_type" value="Hardware" required>Hardware <br>
    <br>
    Operating System:<br>
    <input list="Operating_Systems" name="Operating_System" required>
    <datalist id="Operating_Systems">   <!-- Specifies a list with pre-defined options (for input controls) -->
        <option value="Windows">
        <option value="Mac OS X">
    </datalist>
    <br><br>
    Applications:<br>
    <select name="Software_Apps" size="5" multiple> <!-- Specifies a drop-down list. "multiple" attribute allows selecting multiple items -->
        <option value="oms">Order Management System</option>
        <option value="star">STAR Repair</option>
        <option value="chrome">Google Chrome</option>
        <option value="oms">Order Management System</option>
        <option value="star">STAR Repair</option>
        <option value="chrome">Google Chrome</option>
        <option value="oms">Order Management System</option>
        <option value="star">STAR Repair</option>
        <option value="chrome">Google Chrome</option>
        <option value="oms">Order Management System</option>
        <option value="star">STAR Repair</option>
        <option value="chrome">Google Chrome</option>
    </select>
    <br><br>
    Comments:<br>
    <textarea name="comments" rows="10" cols="30" placeholder="Comments" maxlength="5000" required></textarea>   <!-- Can also define sizing with CSS (Width and Height) --> <!-- "placeholder" attribute specifies pre-filled (light gray) informational text --> <!-- With a "maxlength" attribute, the input field will not accept more than the allowed number of characters. The "maxlength" attribute does not provide any feedback. If you want to alert the user, you must write JavaScript code. -->
    <br><br>
    Upload images (optional):
    <input type="file" name="fileToUpload" id="fileToUpload" multiple><br>
    <br><br>
    <input type="submit" name="submit">
</form>
</body>
</html>