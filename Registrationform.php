<html>
<head>
<title>Registration Form</title>
</head>
<body>  

<?php

$fnameErr = $lnameErr = $ageErr = $genderErr = $emailErr = "";
$fname = $lname = $age = $gender = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "Required";
      } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          $fnameErr = "Only letters and white space allowed";
        }
      }
    if (empty($_POST["lname"])) {
        $lnameErr = "Required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["age"])) {
        $ageErr = "Required";
    } else {
        $age = test_input($_POST["age"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
    }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registration Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
 Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>

  Gender:
    <select  name="gender">
        <option></option>
        <option <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female </option>
        <option <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male </option>
    </select>
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  E-mail: 
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Welcome,  ", $fname, "  Below are your Details:</h2>";
echo "First Name:  ";
echo $fname;
echo "<br>";
echo "Last Name:  ";
echo $lname;
echo "<br>";
echo "Age:  ";
echo $age;
echo "<br>";
echo "Gender:  ";
echo $gender;
echo "<br>";
echo "Email:  ";
echo $email;

?>

</body>
</html>
