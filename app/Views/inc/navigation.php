 


 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">

    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT;?>/posts/index" ><?php echo SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navebarSupportedContent">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?php echo URLROOT;?>categories/index" class="nav-link">category</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Link</a>
                </li>
                
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><?php echo $_SESSION['user_fname'] . " " . $_SESSION['user_lname'] ; ?></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='<?php echo URLROOT; ?>users/logout'>logout</a>
                    </li>
                    <?php else:?>

                <li class="nav-item">
                    <a href="<?php echo URLROOT;?>users/login" class="nav-link">Login</a>
                </li>
                <?php endif ;?>
                
            </ul>
        </div>
    </div>

    


</nav>

    