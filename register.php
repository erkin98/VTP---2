<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>


</head>

<body>
    <!-- <div class="controls">
        <h1 id="sign-up">Qeydiyyat</h1>
    </div> -->

    <div class="container">
    
        <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <i class='fas fa-user'></i>
                    <h2>Qeydiyyat</h2>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <h3>İstifadəçi adı</h3>
                    <input type="text" name="username" class="box" value="<?php echo $username; ?>">
                    <!-- <span class="help-block"><?php echo $username_err; ?></span>   -->
                </div>    
                    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <h3>Şifrə</h3>
                    <input type="password" name="password" class="box" value="<?php echo $password; ?>">
                    <!-- <span class="help-block"><?php echo $password_err; ?></span> -->
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <h3>Şifrənin təsdiqi</h3>
                    <input type="password" name="confirm_password" class="box" value="<?php echo $confirm_password; ?>">
                    <!-- <span class="help-block"><?php echo $confirm_password_err; ?></span> -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Göndər">
                </div>
                <p><a href="login.php">Hesabın var?</a></p>

                </form>
           

            
        </div>
        <!-- <div class="image-container">
                    <div class="images">
                        <img src="Forgot Password.svg">
                    </div>
                </div> -->
                
    </div>
</body>




