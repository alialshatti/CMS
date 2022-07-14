<?php require_once APPROOT . '/Helpers/url_helper.php' ?>

<?php require_once APPROOT . '/Views/inc/header.php';?>
<?php require_once APPROOT . '/Views/inc/navigation.php';?>
<?php $post = $data['posts']; $user = $data['user'];?>
<div class="container">

        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                        
                            <div class="card-header">
                                <p class="lead">
                                by <a href="#"><?php echo $user->fName . ' ' .  $user->Lname ; ?></a>
                                <p class="pull-right">
                                    <span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post->created_at; ?></p>
                                </p>
                                    <h2><?php echo $post->title; ?></h2>
                                </div>
                                
                                
                                <div class="lead">
                                    <p>
                                    <?php echo $post->short_view?> 
                                    </p>
                                
                                </div>
                                <img class="img-responsive" src="<?php echo URLROOT . $post->image ?>"alt="">
                             </div>

                             <hr>

                             <div class="cardbody">
                                <div class="lead">
                                    <p>
                                    <?php echo $post->body?>
                                    </p>
                                </div>
                                <hr>

                                <div class="main-comment">
                                    <div id="error_status"></div>
                                    <textarea  class="comment_textbox form-control mb-1" id="comment_textbox" row="2"></textarea>
                                    <button type="button" class="btn btn-primary add_comment_btn" id='add_comment_btn'>comment</button>
                                    <hr>
                                </div>
                            
                            </div>
                    </div>
                </div>
            </div>
        </div>
        

</section>
      
   
<?php require_once APPROOT . '/Views/inc/footer.php';?>
