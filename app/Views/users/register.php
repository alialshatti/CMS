
<?php require_once APPROOT . '/Views/inc/header.php';?>
<?php require_once APPROOT . '/Views/inc/navigation.php';?>

  
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo URLROOT;?>/login_assest/images/undraw_remotely_2j6y.svg"  alt="Image" class="img-fluid"  style="width:500px;height:600px;">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3><?php echo $data['title'];?></h3>
              
            </div>
            <form action="<?php echo URLROOT ; ?>/users/register" method="post">
              <div class="form-group first">
                
                <input placeholder="first name" type="text" class="form-control is-invalid <?php echo (!empty($data['fname_error']))?'is-invalid' :'';?>" value="<?php echo $data['fname']?>" name="fname" id="fname">
                <span class="invalid-feedback"><?php echo $data['fname_error'];?></span>
              </div>
              <div class="form-group first">
                
                <input placeholder="last name" type="text" class="form-control is-invalid <?php echo (!empty($data['fname_error']))?'is-invalid' :'';?>" value="<?php echo $data['lname']?>" name="lname" id="lname">
                <span class="invalid-feedback"><?php echo $data['lname_error'];?></span>
              </div>
              <div class="form-group first">
                
                <input placeholder="Email" type="text" class="form-control <?php echo (!empty($data['email_error']))?'is-invalid' :'';?>" value="<?php echo $data['email']?>" name="email" id="email">
                <span class="invalid-feedback"><?php echo $data['email_error'];?></span>
              </div>
              <div class="form-group first mb-4">
                
                <input placeholder="password" type="password" class="form-control <?php echo (!empty($data['password_error']))?'is-invalid' :'';?>" name="password"  id="password">
                <span class="invalid-feedback"><?php echo $data['password_error'];?></span>
              </div>
              <div class="form-group last ">
                
                <input placeholder="Confirm Password" type="password" class="form-control <?php echo (!empty($data['confirm_password_error']))?'is-invalid' :'';?>" name="confirm_password"  id="confirm_password">
                <span class="invalid-feedback"><?php echo $data['confirm_password_error'];?></span>
              </div>
              
              <input type="submit" value="Register"  name= "Register" class="btn btn-block btn-primary">
              <span class="ml-auto"><a href="<?php echo URLROOT;?>/users/login" class="forgot-pass">already have account</a></span> 

            </form>
            
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URLROOT;?>/login_assest/js/popper.min.js"></script>
    <script src="<?php echo URLROOT;?>/login_assest/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT;?>/login_assest/js/main.js"></script>
  </body>
</html>
