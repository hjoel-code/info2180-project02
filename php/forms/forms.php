<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = $_POST['content'];

    $db = new DatabaseSQL();

    if ($content == 'new_issue') {
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $assigned_to = (int)$_POST['assigned_to'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];

        $auth = unserialize($_SESSION['auth']);

        $sql = "INSERT INTO `issues` 
        VALUES (DEFAULT, '".$title."', '".$description."', '".$type."', '".$priority."', 'open', ".$assigned_to.", ".$auth->user->uid.",  ADDTIME(CURRENT_DATE(), CURRENT_TIME()), ADDTIME(CURRENT_DATE(), CURRENT_TIME()))";
        $response = $db->insert($sql);

        if ($response) {
            die('NEW_ISSUE_CREATED');
        } else {
            die('FAILED_TO_CREATE_ISSUE');
        }


    } else if ($content == 'new_user') {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $auth = unserialize($_SESSION['auth']);
        $response = $auth->sign_up($firstname, $lastname, $email, $password);

        if ($response) {
            die("NEW_USER_CREATED");
        } else {
            die("ERROR_CREATING_NEW_USER");
        }

    } else if ($content == 'login') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $auth = new Auth();
        $response = $auth->login($email, $password);
        
        if ($response) {
            die("USER_LOGGED_IN");
        } else {
            die('INCORRECT_LOGIN_CREDENTIALS');
        }
            
        
    } else if ($content == 'bug') {
        $status = $_POST['status'];
        $id = $_POST['id'];
        $sql = "UPDATE `issues` SET status='".$status."', updated=ADDTIME(CURRENT_DATE(), CURRENT_TIME()) WHERE id=".(int)$id.""; 
        $response = $db->insert($sql);
        echo json_encode($response);
        if ($response) {
            die('SUCCESS');
        } else {
            die('FAILED_TO_UPDATE');
        }
    } else {
        die('FORM_CONTEXT_REQUIRED');
    }

}





?>

