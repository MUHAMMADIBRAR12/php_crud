<?php
include "connect.php";
session_start();
// Validation Start
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name_error = "Name is Requried";
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email_error = "Email is Requried";
    }
    if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
        $mobile = $_POST['mobile'];
    } else {
        $mobile_error = "Mobile Number is Requried";
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password_error = "Password is Requried";
    }
    // Validation End
    // If data have no error then insert data into database
    if (!isset($name_error) && !isset($email_error) && !isset($mobile_error) && !isset($password_error)) {
        $sql = "INSERT into crud(name,email,mobile,password)
           VALUES('$name','$email','$mobile','$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Alert Messege 
            $_SESSION['register_success'] = true;
            header("Location:index.php");
            exit();
        } else {
            die(mysqli_error($conn));
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .red-border {
        border: 1px solid red;
    }

    .red-color {
        color: red;
    }
</style>

<body>
    <div class="containe mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5 p-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Name</label>
                            <input type="text" class="form-control <?= isset($name_error) ? 'red-border' : '' ?>"
                                name="name" placeholder="Enter Name">
                            <p class="red-color">
                                <?= isset($name_error) ? $name_error : '' ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control <?= isset($email_error) ? 'red-border' : '' ?>"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                placeholder="Enter Email">
                            <p class="red-color">
                                <?= isset($email_error) ? $email_error : '' ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputMobile1" class="form-label">Mobile</label>
                            <input type="tel" class="form-control <?= isset($mobile_error) ? 'red-border' : '' ?>"
                                name="mobile" placeholder="Enter Mobile Number">
                            <p class="red-color">
                                <?= isset($mobile_error) ? $mobile_error : '' ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control<?= isset($password_error) ? 'red-border' : '' ?>"
                                id="exampleInputPassword1" name="password" placeholder="Enter Password">
                            <p class="red-color">
                                <?= isset($password_error) ? $password_error : '' ?>
                            </p>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>