<?php 
 include('security.php');
?>


<?php
    
    if (isset($_POST['signup'])) {
    
        //insert into DB
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $select =mysqli_query($connection, "select * from users where email = '".$email."' ");
        $check = mysqli_num_rows($select);

        if ($check == 0) {

            if ($password === $cpassword) {
        

            $insert_query = "insert into users(username,email,password) values ('".$username."','".$email."','".$password."')";

             $query = mysqli_query($connection,$insert_query);

                     if ($query) {
                         // code...
                    $_SESSION['success'] = "Account Registered";
                    header('Location: login.php');
                     }
                    else{
                    $_SESSION['status'] = "Account Not Registered";
                    header('Location: signup.php');
                     }
                    }
            else{
                $_SESSION['status'] = "Password does not match!";
                header('Location: signup.php');
                 }

        }
        else{
            $_SESSION['status'] = "Email Already Exists!!!";
                header('Location: signup.php');
                 }
        }

?>

<?php 
if (isset($_POST['login'])) {
    // code...
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "select * from users where username='$username' and password='$password'";
    $query = mysqli_query($connection, $select);

    if (mysqli_fetch_array($query)) {
        // code...
        $_SESSION['username'] = $username;
        header('Location:glasses.php');
    }
    else {
        $_SESSION['status'] = 'Username/Password is incorrect';
        header('Location: login.php');
    }
}
?>