<?php
class Student{
	private $database;
	private $conn;
    function __construct(){
        $this->database = include("config.php");
        $this->conn = mysqli_connect($this->database['host'],$this->database['user'], $this->database['password'],$this->database['database'] );
    }
    function connect(){
        return $this->conn;
    }
	function login($username, $pwd){
        $loginFlag = false;
        $pwd = md5($pwd); 
        $sql = "SELECT COUNT(username) AS aNCount, username AS admNo, roletype AS mrole FROM users WHERE (username = '$username' AND passkey = '$pwd')";
        $resp = mysqli_query($this->conn, $sql);
        $obj = mysqli_fetch_object($resp);
		if($obj->aNCount > 0){
            session_start();
            $_SESSION['username'] = $obj->admNo;
			$_SESSION['role'] = $obj->mrole;
            $loginFlag = true;
		}
		return $loginFlag;
	}
	function logout(){
        session_start();
        if(isset($_SESSION['username'])){
            unset($_SESSION['username']);
            unset($_SESSION['role']);
            session_destroy();
            $url = 'http://' . $_SERVER['HTTP_HOST'];
            $url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            header("location:".$url);
        }
    }
	function bookHostel($admissionNo, $spaceCode){
	}
	function pay($admissionNo, $spaceCode){
	}	
	function checkAllocation($admissionNo){
	}
}
?>