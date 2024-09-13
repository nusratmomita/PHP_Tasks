<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST['Submit'])){
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $errors = array();
            if(empty($username) || empty($password)){
                array_push($errors,"All fields are required!");
            }
            else if(strlen($password)<8){
                array_push($errors,"Password must have at least 8 characters!");
            }
            
            require_once "../db/db_connection.php";

            // same username can not taken
            $sql = "select * from appusers where username = '$username'";
            $res = mysqli_query($conn,$sql);
            $row_count = mysqli_num_rows($res);

            // if two users has the same name
            if($row_count>0){
                array_push($errors,"This username is already taken!");
            }
            // if any error comes
            if(count($errors)>0){
                foreach($errors as $i){
                    echo "<div class='alert alert-danger'>$i</div>";
                }
            }
            // no error
            else{
                // require_once "../db/db_connection.php";
                $sql = "insert into appusers (Username,Password) values (?,?)";    
                $stmt = mysqli_stmt_init($conn);// this method ot initialize a statement & returns an object suitable for mysqli_stmt_prepare().
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);// prepares SQL statement for execution

                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"ss",$username,$password);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Everything is ok!</div>";
                    header("Location:Login.php");// going to login page after a successful reggistration!
                }
                else{
                    die("Something went wrong!");
                }

            }

        }
        ?>
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <form action="Registration.php" method="POST" class="form-container">
                    <div class="form-group mb-3">
                        <input type="text" name="Username" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="Submit"class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
