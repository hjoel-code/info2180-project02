<?php 

require './php/config.php';
require './php/auth/auth.php';

session_start();


function router($routes, $current_path) {
    
    foreach($routes as $path=>$content) {
        if ($path == $current_path) {
            echo include($content);
            break;
        }
    }
}


$isState = isset($_SESSION['auth_state']);
$state = false;


if ($isState) {
    $state = $_SESSION['auth_state'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo include('./php/forms/forms.php');
} else {
    if ($state) {
        $current_path = $_GET['content'];
        $routes = array(
            ' ' => './php/dashboard.php',
            'dashboard' => './php/dashboard.php',
            'new_issue' => './php/create_issue.php',
            'new_user' => './php/new_user.php',
            'bug_details' => './php/job_detail.php'
        );  
        router($routes, $current_path);
    
    } else {
        echo include('./php/login.php');
    }
}










?>