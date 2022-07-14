
<?php require_once APPROOT . '/Views/inc/header.php';?>

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
            <?php flash('register_success'); ?>
            <form action="<?php echo URLROOT ?>/users/login" method="post">
            <div class="form-group first">
                <label for="email">email</label>
                <input type="text" class="form-control <?php echo (!empty($data['email_error']))?'is-invalid' :'';?>" value="<?php echo $data['email']?>" name="email" id="email">
                <span class="invalid-feedback"><?php echo $data['email_error'];?></span>
              </div>
              <div class="form-group first mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control <?php echo (!empty($data['password_error']))?'is-invalid' :'';?>" name="password"  id="password">
                <span class="invalid-feedback"><?php echo $data['password_error'];?></span>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>
              <input type="submit" value="Log In" name="Login" class="btn btn-block btn-primary">
              <span class="ml-auto"><a href="<?php echo URLROOT;?>/users/register" class="forgot-pass">Don't have account</a></span> 
              

              <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
</div>
