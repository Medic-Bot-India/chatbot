<?php 
    session_start(); 
	if(!isset($_SESSION['username'])){
        echo "<script>  alert('Please Login to continue!'); </script>";
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/patient_form.css">
    <script src="js/patient_form.js"></script>
  </head>
  <body>
  <?php
    include "db.php";
    error_reporting(0);
    session_start(); 
    if(!isset($_SESSION['username'])){
      echo "<script>  alert('Please Login to continue!'); </script>";
      header('Location: home.php');
    }
    else{
      if(isset($_POST['what'])){
        // First name, last name, Gender, dob, age, blood group, phone, address, city, state, zip , Medical history 
        //DB..  firstName, lastName,gender, dob, bloodGroup, phone, address, city, state, zip, medicalHistory, dateUpdated, username
        //inputs.. hist, zip, state, city, address, phone, (bldgrp), age, {DOB}, {gender}, name, lname
        $username=$_SESSION['username'];
        $fname=$_POST['name'];
        $lname=$_POST['lname'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $phone=$_POST['phone'];
        $age=$_POST['age'];
        $dob=date_create($_POST['DOB']);
        $hist=$_POST['hist'];
        $blud=$_POST['blud'];
        $sex=$_POST['gender'];
        $address=$_POST['address'];
        $zip=$_POST['zip'];/*
        $username_query="SELECT * from users where username='".$username."'limit 1";
        $username_result=mysqli_query($link, $username_query);
          if(mysqli_num_rows($username_result)>0){*/
        $details_query="SELECT * from userDetails where username='".$username."'limit 1";
        $details_result=mysqli_query($link, $details_query);
        if(mysqli_num_rows($username_result)>0){
          header('Location: details.php');
        }
        else{
          $insert_query="INSERT INTO userDetails
          (firstName, lastName, gender, dob, bloodGroup, phone, address, city, state, zip, medicalHistory, username) 
          VALUES
          ('$fname', '$lname', '$sex', '$dob', '$blud', '$phone', '$address', '$city', '$state', '$zip', '$hist', '$username')";
          $insert_result=mysqli_query($link, $insert_query);		
          if(!$insert_result) {
            echo "<script>  alert('Cannot Register.. Please try again later'); </script>";
          }
          else{
            echo "<script>  alert('Registration successfull, You can check your details in myaccount page'); </script>";
            header('Location: details.php');
          }
        }
      }
    }
  ?>
    <div class="testbox">
      <form method="POST" action="">
        <div class="banner">
          <h1>Fill up the registration form</h1>
        </div>
        <!--<p>Registration details</p>-->
        <table>
        <tr>
          <th>
        <div class="item">
          <label for="name">First Name<span>*</span></label>
          <input id="name" type="text" name="name" required />
        </div></th><th>
        <div class="item">
          <label for="lname">Last Name</label>
          <input id="lname" type="text" name="lname" />
        </div>
</th>
        </table>

        <div class="question">
          <label>Gender</label>
          <div class="question-answer">
            <div>
              <input type="radio" value="F" id="radio_1" name="gender" />
              <label for="radio_1" class="radio"><span>Male</span></label>
            </div>
            <div>
              <input type="radio" value="M" id="radio_2" name="gender" />
              <label for="radio_2" class="radio"><span>Female</span></label>
            </div>
          </div>
        </div>

        <div class="item">
          <label asp-for="DOB">Date of Birth<span>*</span></label>
          <input type="date" asp-for="DOB" asp-format="{0:yyyy-MM-dd}" id="DOB" name="DOB" required />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <label for="Age">Age</label>
          <input asp-for="Age" id="age" name="age" type="text" readonly />
        </div>

        <div class="item">
          <p><label>Blood Group</label><span>*</span></p>
          <select name="blud" required>
            <option selected value="" disabled></option>
            <option value="ap">A+</option>
            <option value="an">A-</option>
            <option value="bp">B+</option>
            <option value="bn">B-</option>
            <option value="op">O+</option>
            <option value="on">O-</option>
            <option value="abp">AB+</option>
            <option value="abn">AB-</option>
            <option value="ot">other</option>
          </select>
        </div>

        <div class="item">
          <label for="phone">Phone<span>*</span></label>
          <input id="phone" type="number" name="phone" required />
        </div>

        

        <div class="item">
          <label for="address">Address</label>
          <input id="address" type="text" name="address" />
        </div>

        <div class="item">
          <label for="city">City<span>*</span></label>
          <input id="city" type="text" name="city" required />
        </div>
        <div class="item">
          <label for="state">State<span>*</span></label>
          <input id="state" type="text" name="state" required />
        </div>
        <div class="item">
          <label for="zip">Zip<span>*</span></label>
          <input id="zip" type="number" name="zip" required />
        </div>

        <div class="item">
          <label for="hist">Any Medical history (optional)</label>
          <input id="hist" type="text" name="hist" />
        </div>

        <div class="btn-block">
          <button type="submit" name="what" href="/">SUBMIT</button>
        </div>
      </form>
    </div>
  </body>
</html>
