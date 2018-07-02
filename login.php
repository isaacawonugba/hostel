<?php
if(isset($_POST["username"]) && isset($_POST["pwd"]))
{
    $url = 'http://' . $_SERVER['HTTP_HOST'];
    $url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    require_once("Student.php");
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $stud = new Student();
    $response = $stud->login($username, $pwd);
    if($response == true){
        $url .= "/dashboard.php";
        echo $url;
        exit(0);
    }else{
        echo $response;
    }
}else{
    header("Location:". $url);
    exit(0);
}
?>