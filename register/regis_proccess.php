<?php
session_start();
$meifilex = "../users/users.xml";
 $mailfilej = "../users/users.json";


    if (isset ($_POST['register'])){
    $_SESSION['register'] = array();
    $error = array();
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $basa = $_POST['radiobatton'];
    }
    /*if (file_exists('../users/users.xml')){
       $_SESSION['register']['username-error'] ='Username already exists';
    }*/
    if($username == ''){
       $error['username'] ='Username field is required'; 
        //$_SESSION['register']['username-error'] = "Invalid E-mail address";
    }
    if($email == ''){
       $error['email'] ='Email field is required'; 
       //$_SESSION['register']['email-error'] = "Invalid E-mail address"
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //$_SESSION['register']['email-error'] = "Invalid E-mail address";
         $error['email'] ='Email field is required'; 
    }
    if($password == ''){
       //$_SESSION['register']['password-error'] ='Password field is required'; 
         $error['password'] ='Email field is required'; 
    }
    if($password != $c_password){
       //$_SESSION['register']['c_password-error'] ='Passwords dont match'; 
        $error['c_password'] ='Email field is required'; 

    }
    if($error){
        $_SESSION['register'] = $error; 
        header('location:../index.php?'.json_encode($_SESSION['register']));
        die;          
    } 
    if($basa == 'xmlbase'){
         
            $xml = new SimpleXMLElement('<user></user>');
            $xml->addChild('avatar','avatar');
            $xml->addChild('password', md5($password));
            $xml->addChild('email',$email);
            $xml->asXML(__DIR__.'/../users/username.xml');
            header("Location:../Login/login.php"); 
            die;
        
}
 
    
    
    
        //$file_name =  __DIR__.'/users/'. $username .'.xml'; 
        //$fp = fopen($file_name,  'w');
        //fwrite($fp, json_encode($response));
        ////fclose()close($fp);
        //$xml = new SimpleXMLElement('<user></user>');
        //$xml->addChild('username',$username);
        //$xml->addChild('password', md5($password));
        //$xml->addChild('email',$email);
        //$xml->asXML('users /'  .  $username  .  '.xml');
        //header("Location: login.php"); 
        //die;
//    //}
//}

//?
/*if (isset ($_POST['register'])){
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    // if (file_exists('users/'.$username.'.xml')){
    // $errors[]='Password field is required';
    // }
    if($username == ''){
       $errors[] ='Username field is required'; 
    }
    else if($email == ''){
        $errors[]='Email field is required'; 
    }
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //$email-error[]= "Invalid E-mail address";
    //}
    else if($password == '' || $c_password  ==  '' ){
      $errors[]='Password field is required'; 
    }
    else if($password != $c_password){
        $errors[] = 'Passwords do not match';
    }else{
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('avatar','avatar');
        $xml->addChild('password', md5($password));
        $xml->addChild('email',$email);
        $xml->asXML('../users/users.xml');
        header('Location: login.php'); 
        die;
    }
}*/
/*if (isset($_POST['register'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
    } else {
        $_SESSION['register']['name-error'] = "Name field is required";
    }

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $_SESSION['register']['username-error'] = "username field is required";
    }

    if (isset($_POST['Email']) && !empty($_POST['Email'])) {
        $email = $_POST['Email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register']['Email-error'] = "Invalid E-mail address";
        }

    } else {
        $_SESSION['register']['Email-error'] = "Email field is required";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $_SESSION['register']['password-error'] = "Password field is required";
    }

    if (isset($_POST['c_password']) && !empty($_POST['c_password'])) {
        $conf_pass = $_POST['confirm'];
    } else {
        $_SESSION['register']['c_password-error'] = "Confirm field is required";
    }
    if ($_SESSION['register']) {
        header('location:../index.php');
        die;
    } else {
        
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('avatar','avatar');
        $xml->addChild('password', md5($password));
        $xml->addChild('email',$email);
        $xml->asXML('../users/'  .  $username  .  '.xml');
        header('Location: ../logon/login.php'); 
            die;
        
    }

}


*/
?>