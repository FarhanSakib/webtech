<html>
<head> <title>Register</title></head>
<body>

<?php

$nameErr=$emailErr=$genderErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  //echo $nameErr;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  //echo $emailErr;
  } 
  else {
    $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}


  }
  
  if (empty($_POST["gender"])) {
    $genderErr = "gender is required";
  //echo $genderErr;
  } 
  else {
    $gender = test_input($_POST["gender"]);
  }
}
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2> Registration</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
<b>Name:<b> <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
<b>Email:<b> <input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<b>Gender:<b> <input type="radio" name="gender" value="male">male
<input type="radio" name="gender" value="female">female
<input type="radio" name="gender" value="other">other
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php


         echo "<h2>Your Given details are as :</h2>";
     
         echo $name;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         echo $gender;
         echo "<br>";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $name;

fwrite($myfile, $txt);

$txt =$email;

fwrite($myfile, $txt);

$txt =$gender;

fwrite($myfile,$txt);
fclose($myfile);
?>   
     
</body>
</html>


<?php

  $dom = new DOMDocument();

    $dom->encoding = 'utf-8';

    $dom->xmlVersion = '1.0';

    $dom->formatOutput = true;

  $xml_file_name = 'user_list.xml';

    $root = $dom->createElement('Users');

    $user_node = $dom->createElement('user');

    $attr_user_id = new DOMAttr('user_id', '18375091');

    $user_node->setAttributeNode($attr_user_id);
    
    $child_node_name = $dom->createElement('Name', 'Farhan');

    $user_node->appendChild($child_node_name);
    $child_node_email = $dom->createElement('Email', 'farhansakib96@gmail.com');

    $user_node->appendChild($child_node_email);
    $child_node_gender = $dom->createElement('Gender', 'Male');

    $user_node->appendChild($child_node_gender);
    $child_node_gender = $dom->createElement('Gender', 'Female');

    $user_node->appendChild($child_node_gender);
    $child_node_gender = $dom->createElement('Gender', 'Other');

    $user_node->appendChild($child_node_gender);
$root->appendChild($user_node);

    $dom->appendChild($root);

  $dom->save($xml_file_name);

  echo "$xml_file_name has been  created";
?>