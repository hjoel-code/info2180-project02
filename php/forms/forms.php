<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = $_POST['content'];

    if ($content == 'new_issue') {

        $title = $_POST['content'];
        $description = $_POST['description'];
        $assigned_to = $_POST['assigned_to'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];

    } else if ($content == 'new_user') {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

    } else if ($content == 'login') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $auth = new Auth();
        $response = $auth->login($email, $password);
        
        if ($response) {
            echo include('./php/dashboard.php');
        } else {
            echo '<p>Something went wrong. Try Again</p>';
        }
            
        
    } else {
        throw new Exception("Failed to process request");
    }

}






?>