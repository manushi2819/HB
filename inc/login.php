<?php 
    session_start();
    include "logindb.php";

    if (isset($_POST['email']) && isset($_POST['password'])) {

        
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

    }
    

    $uname = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($uname)){
        header("Location: index.php?erro=User Name is required");
        exit();
    }
    else if (empty($pass)) {
        header("Location: index.php?erro=Password is required");
        exit();

    }

    $sql ="SELECT * FROM `user_reg1` WHERE `email`  ='$uname' AND `password` ='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if ($row['user_name']=== $uname && $row['password']=== $pass){
            echo "Logged In!";
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row ['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: nhome.php");
            exit();
        }
        else {
            header("Location:iixx.php?error=Incorrect User Name or Password");
            exit();
        }

    }
    else {
        header("Location: iixx.php");
        exit();
    }
?>