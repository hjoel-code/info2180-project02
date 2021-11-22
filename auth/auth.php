<?php 

include('../config.php');

session_start();


class User {
    
    public $firstname;
    public $lastname;
    public $email;
    public $uid;

    /**
     * Undocumented function
     *
     * @param Integer $uid
     * @param String $firstname
     * @param String $lastname
     * @param String $email
     * @return void
     */
    function set_user($uid, $firstname, $lastname, $email) {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->uid = $uid;

    }

}

class Auth {

    public $user;
    private $db;

    function __construct()
    {
        $this->db = new DatabaseSQL();
    }

    /**
     * Undocumented function
     *
     * @param String $email
     * @param String $password
     * @return String
     */
    public function login($email, $password) {


        $response = $this->db->select("SELECT * FROM `users` WHERE email = '$email' AND password = MD5('$password')");

        if ($response['state']) {
            if ($response['count'] > 0) {
                $data = $response['result']->fetch_assoc();

                $this->user = new User();
                $this->user->set_user($data['id'], $data['firstname'], $data['lastname'], $data['email']);
                $_SESSION["auth_state"] = true;

                return true;
            } else {
                return true;
            }
        } else {
            return false;
        }

    }


    function sign_out() {

        $this->user = null;
        $_SESSION["auth_state"] = false;

    }
}


$_SESSION["auth_state"] = false;
$_SESSION["auth"] = serialize(new Auth());

?>
