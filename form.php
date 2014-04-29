<?php 
    include('validate.php');
    function selected($blood_group, $choice) {
        if($blood_group==$choice) echo "selected";
    }
?>
<html>
    <head>
    <title>Validating Form with PHP</title>
    <style>
        body {
            font-family: 'trebuchet ms'; 
            font-size: 1.4em;
            padding: 0 50px; color: #444;
        }
        input, textarea {font-size: 1em;}
        p.error {background: #ffd; color: red;}
        p.error:before {content: "Error: ";}
        p.success {background: #ffd; color: green;}
        p.success:before {content: "Success: ";}
        p.error, p.success {font-weight: bold;}
    </style>
    </head>
    <body>
        
        <h2>Fill and submit the form.</h2>
        <?=$error?>
        <form action="html_form_to_validate.php" method="post">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" value="<?=@$username?>"/> </td>
            </tr>
            <tr>
                <td>First name: </td>
                <td><input type="text" name="first_name" value="<?=@$first_name?>"/> </td>
            </tr>
            <tr>
                <td>Last name: </td>
                <td><input type="text" name="last_name" value="<?=@$last_name?>"/> </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" value="<?=@$password?>"/> </td>
            </tr>
            <tr>
                <td>Confirm password: </td>
                <td><input type="password" name="confirm_password" value="<?=@$confirm_password?>"/> </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="<?=@$email?>"/> </td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="text" name="phone" value="<?=@$phone?>"/> </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td><input type="radio" name="gender" value="male" <?php if(@$gender=='male')echo 'checked="true"';?> 
                                                <?php if(!isset($gender))echo 'checked="true"';?>/> male 
                                                <input type="radio" name="gender" value="female" 
                                                <?php if(@$gender=='female')echo 'checked="true"';?> /> female</td>
            </tr>
            
            <tr>
                <td>Date of Birth: </td>
                <td><input type="number" name="day" value="<?=@$day?>" size=2/>/
                    <input type="number" name="month" value="<?=@$month?>" size=2/>/
                    <input type="number" name="year" value="<?=@$year?>" size=4/> (DD/MM/YYYY)</td>
            </tr>
            
        </table>            
            <input type="submit" name="submit" value="Submit"/> <input type="reset" name="reset" value="Reset"/>
        </form>
        <?php
            if (isset($_POST['submit']) && $error == '') {
                echo "<p class='success'>Form submitted.</p>"; 
                 $_POST['password'] = md5($_POST['password']);
                foreach ($_POST as $key => $val) {
                    $_POST[$key] = mysql_real_escape_string($_POST[$key]);
                   
                }
 
               
                var_dump($_POST);
            }
        ?>
    </body>
</html>