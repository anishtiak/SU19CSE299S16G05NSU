<!DOCTYPE html>
<html lang="en">
<!--
<?php

require("lib/connection.php");
session_start();

$msg ="";

// sign up logic

if(isset($_POST['submit_data'])) {
    $first_name= $_POST['patient_first_name'];
    $last_name= $_POST['patient_last_name'];
    $gender= $_POST['patient_gender'];
    $date_of_birth= $_POST['patient_date_of_birth'];
    $location= $_POST['patient_location'];
    $email= $_POST['patient_email'];
    $password= $_POST['User_password'];
    $pass= $_POST['confirm_password'];
    

     if($pass==$password) {
        $insert_sql = "INSERT INTO patient(first_name, last_name, gender, date_of_birth, location, email, password) values('$first_name', '$last_name', '$gender', '$date_of_birth', '$location', '$email', '$password')";

        if($conn->query($insert_sql)){
            $msg = "data added";
        }
        else{
            die($conn->error);
        }
    }
    else {
        $msg="password did not match";
    }
}

// login logic
if (isset($_POST['add_data'])) {
    # code...
    $email=$_POST['User_id'];
    $password=$_POST['User_password'];

    if(empty($email)|| empty($password)){
        $msg="please_fill_in_all";

    }
    else{
        $sql="SELECT email,password FROM patient";
        $result=$conn->query($sql);
        $resultcheck=$result->num_rows;

        if($resultcheck<=0){
            $msg="signup first!";
            echo $msg;                                                          
        }
        else{
            $credentials=$result->fetch_all(MYSQLI_ASSOC);
            $loggedin=false;
            $emailfound=false;
            foreach ($credentials as $value ) {
                if(strcmp($email,$value["email"])==0){
                    $emailfound=true;
                    if(strcmp($password, $value["password"] == 0)){
                        $loggedin=true;
                        break;
                    }
                    else{
                        $msg="password mismatch!";
                        break;
                    }

                }
                else if(strcmp($email, $value["email"])!=0) {
                    $emailfound=false;
                    # code...
                }
            }

            if(!$emailfound){
                $msg="email not registered!";
            }

           if($loggedin){
                $sql="SELECT first_name FROM patient WHERE email=".'"'.$email.'"';
                $result=$conn->query($sql);
                $resultName=$result->fetch_assoc();
                $_SESSION['username']=$resultName['first_name'];

                header("Location: home.php");
           }
        } 
    }
}

?>

-->


<head>
    <meta charset="UTF-8">
    

    <title>LOGIN</title>
 
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,700|Lato:300,300i,400" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
   <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/style.css">

</head>
<body style="    background-image: url(img/computer-desk-doctor-48604.jpg);   background-size: cover;
    background-color: white;
  padding: 0px;">
    
    <div class="container fluid main">

       <div class="row">
       <div data-aos="fade-down" class="welcome_text">
         <h1>Say Hello T0 North South University CPC</h1>
           <h2 style="text-align: center; color: white !important; margin: 20px 0px;">Sign Up Here</h2>
       </div>

      </div>
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin: 40px 0px;">
    
            
             <div class="signup " data-aos="fade-right">
              <form action="" class="signup_form">   
            </form>
             
<div class="">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="post" class="signup_form">
        
  <label for="first_name">Name</label> <br>
        <input type="text" name="patient_first_name" placeholder="Name " required> 
        <br>
        <br>
        
        <label for="last_name">CGPA</label> <br>
        <input type="text" name="patient_last_name" placeholder="CGPA" required>
        <br>
        <br>
        
        <label for="gender">Gender</label> <br>
         
       <select name="patient_gender" style=" padding: 10px;
    margin: 4px;

    border-radius: 8px;
    color: #563d7cbf;">
        <option value="0">Male</option>
        <option value="1">Female</option>
        </select>
        <br>
        <br>
        
        <label for="subject" >Major in course</label> 
        <br><input type="text" name="patient_last_name" placeholder="Subject" required>
        <br>
        <br>
        <label for="location">Location</label> <br>
         <input type="text" name="patient_location" placeholder="Location" name="Location"> 
        <br>
        <br>
      
        
    </form>
    </div>
                 <div class="result">
                 <?php echo $msg ?>
                 </div>
        </div>
        </div>
             
                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin: 40px 0px;">
          <div class="log_in" data-aos="fade-left">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login_form">
                  
        
           
        
        
        
        
        <label for="location">Graduation Year</label> <br>
         <input type="Number" name="patient_location" placeholder="Graduation year" name="Graduation year"> 
        <br>
        <br>
        
         <label for="gender">Graduated</label> <br>
        
        
        <select name="patient_gender" style=" padding: 10px;
    margin: 4px;

    border-radius: 8px;
    color: #563d7cbf;">
        <option value="0">yes</option>
        <option value="1">No</option>
        </select>
        <br>
        <br>
        
        
        
        <label for="email">Email</label> <br>
        <input type="email" name="patient_email" placeholder="Email address" required> 
        <br>
        <br>
        
        <label for="password">Password</label> <br>
         <input type="password" name="User_password" placeholder="Password">
        <br>
        <br>
        
         <label for="password">Confirm Password</label> <br>
         <input type="password" name="confirm_password" placeholder="Confirm Password">
        <br>
        <br>
              </form>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 offset-1">
                 
                
          <div class="log_in" data-aos="fade-left">
                 
                <div class="container-contact100-form-btn">
                    <button name="" class="contact100-form-btn" style="backgroud-color:white !important;">
                        
                       <a href="#" style="color: white;">SignUp</a>  
                        
                     
                    </button>
                </div>
               <div class="container-contact100-form-btn" style="backgroud-color:white !important;">
                    <button name="" class="contact100-form-btn" style="backgroud-color:white !important;">
                        
                       
                       <a href="index2.html" style="color: white;">Company SignUp</a>  
                     
                    </button>
                </div>
            
        </div>
        
        

       </div>



    </div>
    
    </div>
    

          
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
 
</body>

</html>
