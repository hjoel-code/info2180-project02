<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = $_POST['content'];

    $db = new DatabaseSQL();

    if ($content == 'new_issue') {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $assigned_to = $_POST['assigned_to'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];

        $auth = unserialize($_SESSION['auth']);

        $sql = "INSERT INTO issues 
        VALUES (DEFAULT, '".$title."', '".$description."', '".$type."', '".$priority."', '".$assigned_to."', '".$auth->user->get_fullname()."',  ADDTIME(CURRENT_DATE(), CURRENT_TIME()), ADDTIME(CURRENT_DATE(), CURRENT_TIME())";
        $response = $db->insert($sql);

    } else if ($content == 'new_user') {

        echo json_encode($_POST);
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $auth = unserialize($_SESSION['auth']);
        $response = $auth->sign_up($firstname, $lastname, $email, $password);

        if ($response) {
            echo "NEW_USER_CREATED";
        } else {
            echo "ERROR_CREATING_NEW_USER";
        }

    } else if ($content == 'login') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $auth = new Auth();
        $response = $auth->login($email, $password);
        
        if ($response) {
            echo include('./php/dashboard.php');
        } else {
            echo 'INCORRECT_LOGIN_CREDENTIALS';
        }
            
        
    } else {
        throw new Exception("Failed to process request");
    }

}






?>