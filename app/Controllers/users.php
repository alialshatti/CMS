<?php
class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }
   
    public function register(){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sentize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Register',
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fname_error' => '',
                'lname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            }
            

            //validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_error']='email already taken';

                }

            }

            //validate password
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            }elseif(strlen($data['password'])<6){
                $data['password_error'] = 'the password must be at least 6 characters';
            }

            //confirmed password

            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Please enter confirmed password';
            }

            if(!empty($data['confirm_password']) && !empty($data['password']) ){
                if($data['confirm_password'] != $data['password'] )
                $data['confirm_password_error'] = 'the confirmed password not match with password';
            }
            
            if(empty($data['fname'])){
                $data['fname_error'] = 'Please enter the first name';
            }
            if(empty($data['lname'])){
                $data['lname_error'] = 'Please enter the last name';
            }

            if(empty($data['email_error']) && empty($data['fname_error']) && empty($data['lname_error'])  && empty($data['name_error']) && empty($data['password_error']) &&empty($data['confirm_password_error']) ){

                    //hash password

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)){
                    flash('register_success', 'You are Registered and can log in');
                    redirect('users/login');

                }else{
                    die('somthing went wrong');
                }




            }else{
                $this->view('users/register',$data);
            }


        }else{
            $data = [
                'title' => 'Register',
                'fname' => '',
                'lname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'fname_error' => '',
                'lname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            $this->view('users/register',$data);
        }
    }

    public function login(){
       
        
       
        /*
        $this->view('users/register',$data);
        */
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Login',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']) ,
                'email_error' => '',
                'password_error' => ''
                
            ];

            if(empty($_POST['email'])){
                $data['email_error'] = 'please enter email';
            }
            if(empty($_POST['password'])){
                $data['password_error'] = 'please enter password';
            }

            if($this->userModel->findUserByEmail($data['email'])){

                

            }else{
               $data['email_error'] = "email not exisit";

            }

            if(empty($data['email_error'])&& empty($data['password_error'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){
                    //creat session
                    $this->createUserSession($loggedInUser);

                }else{
                    $data['password_error'] = 'Password incorrect';
                    $this->view('users/login',$data);

                }
            }else{
                $this->view('users/login',$data);
            }

            



        }else{
            $data = [
                'title' => 'Login',
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
                
            ];

            $this->view('users/login',$data);
        }




    }
    
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_fname'] = $user->fName;
        $_SESSION['user_lname'] = $user->Lname;

        redirect('posts/index');


    }
    public function logout(){
        session_destroy();

        redirect('users/login');


    }

    


    //End class
}