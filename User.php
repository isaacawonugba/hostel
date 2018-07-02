<?php
class User{
    private $database;
    private $conn;
    function __construct(){
        $this->database = include("config.php");
        $this->conn = mysqli_connect($this->database['host'],$this->database['user'], $this->database['password'],$this->database['database'] );
    }

    function loginWithBiodata($username, $password){
        $loginFlag = false;
        $sql = "SELECT COUNT(appID) AS appIDno, appID AS appID FROM biodata WHERE (admNo = '$username' AND admNo = '$password') OR (appID = '$username' AND appID = '$password')";
        $resp = mysqli_query($this->conn, $sql);
        $obj = mysqli_fetch_object($resp);
        if($obj->appIDno > 0){
            session_start();
            $_SESSION['appID'] = $obj->appID;
            $loginFlag = true;
            $this->register_in($username, $password);
        }
        return $loginFlag;
    }
    
    function login($username, $password){
        $loginFlag = false;
        $sql = "SELECT COUNT(username) AS user FROM student_users WHERE username = '$username' AND passwrd = '$password'";
        $resp = mysqli_query($this->conn, $sql);
        $obj = mysqli_fetch_object($resp);
        if($obj->user > 0){
            $loginFlag = true;
            $this->register_in($username, $password);
        }
        //mysqli_free_result($obj);
        return $loginFlag;
    }
    
    function register_in($username, $password){
        if($this->getAdmissionStatus($username) >0 ){
            $sql = "INSERT INTO student_users(username, passwrd) VALUES('$username', '$password')";
            mysqli_query($this->conn, $sql);
        }
    }

    function logout(){
        session_start();
        if(isset($_SESSION['username'])){
            unset($_SESSION['username']);
            unset($_SESSION['appID']);
            session_destroy();
            header("location:../index.html");
        }
    }

    function getRoleType($username){
        $sql = "SELECT roletype FROM student_users WHERE username ='$username'";
        $res = mysqli_query($this->conn, $sql);
        $obj = mysqli_fetch_object($res);
        return $obj->roletype;
    }

    function getAdmissionStatus($appID){
        $sql = "SELECT COUNT(appID) AS num FROM admission WHERE appID = '$appID'";
		$res = mysqli_query($this->conn, $sql);
		$obj = mysqli_fetch_object($res);
		return $obj->num;
    }

    function getJambResult($appID){
        $response = 0;
        $sql = "SELECT COUNT(appID) AS cid, jambscore FROM jamb_details WHERE appID = '$appID'";
        $res = mysqli_query($this->conn, $sql);
        $obj = mysqli_fetch_object($res);
        if($obj->cid > 0){
            $response = $obj->jambscore;
        }else{
            $response  = 0;
        }
        return $response;
    }

    function getResults($admNo){
        $count = 0;
        $response = "<table><tr><td>SUBJECT</td><td> CA </td><td>CA</td><td>EXAM </td> <td>TOTAL</td></tr>";
        $sql = "SELECT COUNT(admNo) AS admCount, admNo AS admNo, ca1 AS ca1, ca2 AS ca2, exam AS exam FROM results WHERE admNo = '$admNo'";
        $res = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_row($res)){ 
            if($row[0] > 0){
                $total = 0;
                $total = ($row["ca1"] + $row["ca2"] + $row["exam"]);
                $response .= "<tr><td>". $row["subject"] ."</td><td>". $row["ca1"]. "</td><td>". $row["ca2"] ."</td><td>". $row["exam"] ."</td><td>". $total ."</td></tr>";
                ++$count;
            }
        }
        if($count > 0){
            $reponse .= "</table>";
        }else{
            $response = "";
        }
        return $response;
    }
}
?>