<?php
    class user{
        //private database objetc
        private $db;

        //constructo to initilize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
    }

    public function insertUser($username, $password){
        try {
            $result = $this->getUserByUsername($username);
            if($result['num']>0){
                return false;
            }
            else{
                $new_password = md5($password.$username);
                //define sql statement to execute
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                //prepare sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all the placeholder to the actual value
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $new_password);

                //execute statement
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; //eyy its not successfull
        }
    }

    public function getUser($username, $password){
        try {
            $sql = "SELECT * FROM users WHERE username= :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($username){
        try {
            $sql = "SELECT count(*) as num from users where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
?>