<?php
class User{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }






    //register user
    public function register($data){
        $this->db->query('INSERT INTO users (fName,Lname ,email, password) VALUES (:fName ,:Lname, :email, :password)');

        $this->db->bind(':fName', $data['fname']);
        $this->db->bind(':Lname', $data['lname']);

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }



    }
    //Find user by email



    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users where email = :email');
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM users where email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password ,$hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM users where id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}