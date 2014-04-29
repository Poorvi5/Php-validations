<?php

 
$error = ""; 
 
if (isset($_POST['submit'])) { 
    $username             = trim($_POST['username']);
    $first_name         = trim($_POST['first_name']);
    $last_name             = trim($_POST['last_name']);
    $password             = $_POST['password'];
    $confirm_password     = $_POST['confirm_password'];
    $email                 = $_POST['email'];
    $phone                = $_POST['phone'];
    $gender                = $_POST['gender'];
    
   
     $day             = $_POST['day'];
     $month             = $_POST['month'];
     $year             = $_POST['year'];
     $dob            = $day.$month.$year;
     $age             = date("Y")-$year;
 
 
    
        if (!ctype_alnum($username)) {
            $error .= '<p class="error">Invalid user name.</p>';
        }
        
        if (strlen($username) < 3 OR strlen($username) > 20) {
            $error .= '<p class="error">Username should be within 3-20 characters long.</p>';
        }
 
   
        if (!ctype_alpha(str_replace(array("'", "-"), "",$first_name))) { 
            $error .= '<p class="error">First name should be alpha characters only.</p>';
        }
        
        if (strlen($first_name) < 3 OR strlen($first_name) > 20) {
            $error .= '<p class="error">Invalid First name .</p>';
        }
 
    
        if (!ctype_alpha(str_replace(array("'", "-"), "", $last_name))) { 
            $error .= '<p class="error">Invalid Last name .</p>';
        }
       
        if (strlen($last_name) < 3 OR strlen($last_name) > 20) {
            $error .= '<p class="error">Last name should be within 3-20 characters long.</p>';
        }
 
    
        if (strlen($password) < 3 OR strlen($password) > 20) {
            $error .= '<p class="error">Password is weak.</p>';
        }
 
  
        if ($confirm_password != $password) {
            $error .= '<p class="error">Password mismatch.</p>';
        }
 
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p class="error">Invalid email address.</p>';
        }
 
    
        if (!ctype_digit($phone) OR strlen($phone) != 10) {
            $error .= '<p class="error">Invalid phone number.</p>';
        }
 
    
        if ($gender != 'male' && $gender != 'female') {
            $error .= '<p class="error">Gender not selected.</p>';
        }
 

    
 
    
        if (intval($day)<1 OR intval($day)>31) {
            $error .= '<p class="error">Enter a valid date.</p>';
        }
       
        if (intval($month)<1 OR intval($month)>12) {
            $error .= '<p class="error">Enter a valid date.</p>';
        }
        
        if ($age < 18) {
            $error .= '<p class="error">You are not18 years old.</p>';
        }
 }
?>