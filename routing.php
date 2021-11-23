<?php 

session_start();

$isState = isset($_SESSION['auth_state']);
$state = false;


if ($isState) {
    $state = $_SESSION['auth_state'];
}

if ($state) {
    $routes = array(
        ' ' => './php/dashboard.php',
        'dashboard' => './php/dashboard.php',
        'new_issue' => './php/create_issue.php',
        'new_user' => './php/new_user.php',
        'bug_details' => './php/job_detail.php'
    );
} else {
    $routes = array(
        ' ' => './php/login.php',
        'dashboard' => './php/login.php',
        'new_issue' => './php/login.php',
        'new_user' => './php/login.php',
        'bug_details' => './php/login.php'
    );
}



function router($routes, $current_path) {
    
    foreach($routes as $path=>$content) {
        if ($path == $current_path) {
            echo include($content);
            break;
        }
    }
}

$current_path = $_GET['content'];
router($routes, $current_path);

?>