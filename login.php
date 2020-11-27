<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="icon" href="./Favicon.png" type="image/png">
    <title>Sayta daxil ol</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<style media="screen">
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
            transition: all .2s ease;
        }
        
         :root {
            --color: #c272cf;
        }
        
        html {
            font-size: 62.5%;
        }
        
        body {
            height: 100vh;
            background: url(Vector.png) no-repeat;
            background-size: 100% 25%;
            background-position: top;
        }
        
        .container {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 19rem auto;
        }
        
        .form-container {
            display: flex;
            align-items: center;
            height: 40rem;
            width: 33rem;
            overflow-x: hidden;
        }
        
        form {
            height: 35rem;
            width: 30rem;
            margin-left: 2rem;
            display: grid;
            place-items: center;
            border: 1px solid #ccc;
            box-shadow: 9px 9px 0px var(--color);
            border-radius: 1rem;
            background: #ffffff;
        }
        
        form i {
            font-size: 3rem;
            color: var(--color);
            margin-top: -4rem;
            background: #ffffff;
            height: 6rem;
            width: 6rem;
            text-align: center;
            border: 1rem solid #ffffff;
        }
        
        form h2 {
            font-size: 2rem;
            color: #333;
        }
        
        form .box {
            height: 3rem;
            width: 80%;
            padding: 0 2rem;
            outline: none;
            border: none;
            background: #e6e6e6;
            border-radius: 5rem;
        }
        
        form input[type="submit"] {
            height: 3rem;
            width: 6rem;
            margin-left: -15rem;
            background: #333;
            color: #fff;
            border: none;
            outline: none;
            border-radius: 5rem;
            cursor: pointer;
        }
        
        form input[type="submit"]:hover {
            background: var(--color);
        }
        
        form a {
            font-size: 1.5rem;
            color: #333;
            margin-left: -11rem;
        }
        
        .container .images {
            width: 36rem;
            display: flex;
            align-items: center;
            overflow-x: hidden;
        }
        
        .container .images>img {
            height: 35rem;
            margin-top: 1rem;
            margin-left: -18rem;
        }
        
        .controls {
            position: absolute;
            top: 10rem;
            right: 21%;
            height: 6rem;
            width: 15rem;
            overflow: hidden;
        }
        
        .controls h1 {
            color: #fff;
            border: .2rem solid#fff;
            padding: 1rem 2rem;
            margin-top: 1rem;
            border-radius: 5rem;
            cursor: pointer;
            text-align: center;
        }
        
        @media(max-width: 750px) {
            .container .images {
                display: none;
            }
            .container .images {
                width: 0;
            }
            .container {
                justify-content: center;
                margin-top: 25rem;
            }
            .controls {
                right: 10%;
            }
            @media(max-width: 400px) {
                html {
                    font-size: 50%;
                }
                body {
                    background-size: 100% 20%;
                }
                .container {
                    margin-top: 30rem;
                }
            }
    </style>-->
    <script src="jquery.js" charset="utf-8"></script>
    <link rel="stylesheet" href="login.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' rel='stylesheet'>



</head>

<body>
    <!-- <div class="controls">
        <h1 id="sign-in">Daxil ol</h1>
    </div> -->

    <div class="container">
        <div class="form-container">
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <i class='fas fa-user'></i>
                    <h2>Daxil ol</h2>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <h3>İstifadəçi adı</h3>
                <input type="text" name="username" class="box" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <h3>Şifrə</h3>
                <input type="password" name="password" class="box">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p><a href="register.php">Hesabın yoxdur?</a></p>
            </form>
      
     
           
        </div>
        <!-- <div class="image-container">
            <div class="images">
                <img src="Mobile login.gif">
            </div>
        </div> -->
    </div>


</body>




