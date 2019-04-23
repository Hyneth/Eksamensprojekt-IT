<?php
include '../header.php'; // includes Header.php(Database info and login)






$fname = $_POST['Navn']; //Gets the first name from input on register page
$lname = $_POST['Efternavn']; //Gets the last name from input on register page
$preHashPass = $_POST['Kodeord']; // Gets the password from input on register page
$preHashPassC = $_POST['cpw'];// Gets the confirm password from input on register page
$password = hash('sha1', $preHashPass); // Hashes the Password
$passwordC = hash('sha1', $preHashPassC);// Hashes the Confirm Password


$sql = "INSERT INTO Bruger VALUES (NULL,'{$fname}','{$lname}','{$password}')"; //Makes sql query for inserting user
$rs = mysqli_query($conn,$check); // Runs sql connect and check query
if ($fname != "" && $lname != "" && $preHashPass != "" && $preHashPassC != "") { //Checks if inputs are empty, if empty, runs javascript alert saying all fields are mandatory
if ($password == $passwordC) { //Checks if the two hashed passwords are identical, if not runs javascript alert that says passwords are not identical
  if($rs->num_rows == 0){ // runs the sql check query, if mathcing email are found runs javascript alert that says User already exist
    if (mysqli_query($conn, $sql)) { //if all above are true, inserts data into database and directs you to login page.
        print '<script type="text/javascript"> window.location = "Front-site/Front.php"; </script>';
      } else {
        echo "Error: could not connect, try again later: " . mysqli_error($conn);
}    } else {
        print '<script type="text/javascript">alert("Bruger allerede oprettet"); window.location = "Login-site/Login.php"; </script>';
} } else {
      print '<script type="text/javascript">alert("Kodeord ikke ens"); window.location = "Login-site/Login.php"; </script>';
}} else {
  print '<script type="text/javascript">alert("Alle felter skal udfyldes"); window.location = "Login-site/Login.php"; </script>';
}

mysqli_close($conn);





 ?>
