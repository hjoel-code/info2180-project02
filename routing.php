<?php 

require './php/config.php';
require './php/auth/auth.php';

session_start();


$routes = array(
    ' ' => './php/dashboard.php',
    'dashboard' => array('title' => 'Dashboard', 'content' => './php/dashboard.php') ,
    'new_issue' => array('title' => 'Create Issue', 'content' => './php/create_issue.php'),
    'new_user' => array('title' => 'New User', 'content' => './php/new_user.php'),
    'bug_details' => array('title' => 'Bug Details', 'content' => './php/job_detail.php')
);  


function router($routes, $current_path) {
    
    foreach($routes as $path=>$env) {
        if ($path == $current_path) {
            return $env;
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

        $current_path = $_GET['context'];

        if ($current_path == 'sign_out') {
            $auth = unserialize($_SESSION['auth']);
            $auth->sign_out();
            $response = array(
                "title" => 'Login',
                "content" => file_get_contents('./php/login.php', true)
            );

            echo json_encode($response);
        } else {
            $env = router($routes, $current_path);
        
            $response = array(
                'title' => $env['title'],
                'content' => file_get_contents($env['content'], true)
            );
            
            echo json_encode($response);
        }
    } else {
        $response = array(
            "title" => 'Login',
            "content" => file_get_contents('./php/login.php', true)
        );
        
        echo json_encode($response);
    }
}










?>