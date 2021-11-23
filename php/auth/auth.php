<?php 


class User {
    
    public $firstname;
    public $lastname;
    public $email;
    public $uid;
    public $date_joined;

    /**
     * Undocumented function
     *
     * @param Integer $uid
     * @param String $firstname
     * @param String $lastname
     * @param String $email
     * @return void
     */
    function set_user($uid, $firstname, $lastname, $email, $date_joined) {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->uid = $uid;
        $this->date_joined = $date_joined;

    }

    function get_fullname() {
        return $this->firstname." ".$this->lastname;
    }

}

class Auth {

    public $user;
    private $db;

    function __construct() {
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
                $this->user->set_user($data['id'], $data['firstname'], $data['lastname'], $data['email'], $data['date_joined']);
                
                $_SESSION["auth_state"] = true;
                $_SESSION["auth"] = serialize($this);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


    public function sign_out() {

        $this->user = null;
        $_SESSION["auth_state"] = false;

    }

    /**
     * Undocumented function
     *
     * @param String $firstname
     * @param String $lastname
     * @param String $email
     * @param String $password
     * @return Boolean
     */
    public function sign_up($firstname, $lastname, $email, $password) {
        $response = $this->db->insert("INSERT INTO Users 
        VALUES (DEFAULT, '".$firstname."', '".$lastname."', MD5('".$password."'), '".$email."', ADDTIME(CURRENT_DATE(), CURRENT_TIME()));");
        return $response;
    }
}


?>
