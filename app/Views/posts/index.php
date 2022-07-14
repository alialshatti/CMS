<?php require_once APPROOT . '/Helpers/url_helper.php' ?>

<?php require_once APPROOT . '/Views/inc/header.php';?>
<?php require_once APPROOT . '/Views/inc/navigation.php';?>
<div class="container">
 
        <div class="row">
        <div class="col-md-6">
        
         </div>
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    <a href="<?php echo URLROOT ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>Add post
         </a>
                </h1>

                <!-- First Blog Post -->
                
                <?php $post=$data['posts']; for($i=0; $i < sizeof($post) ; $i++):?>
                <h2>
                    <a href="<?php echo URLROOT ?>/posts/details/<?php echo $post[$i]->postId ;?>"><?php echo $post[$i]->title ;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post[$i]->fName . ' ' . $post[$i]->Lname ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo ' '.  $post[$i]->postCreated ;?></p>
                <hr>
                
                
                <p><?php echo $data['posts'][$i]->short_view ; ?></p>
                <img class="img-responsive" src="<?php echo URLROOT . $post[$i]->image ?>" alt="">
                <hr>
                
                <a class="btn btn-primary" href="<?php echo URLROOT ?>posts/details/<?php echo $post[$i]->postId ;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php endfor ;?>
                



                <!-- Pager -->
               
            </div>
            
            


            
       
 <?php require_once APPROOT . '/Views/inc/blog_sidebar.php';?>
</div>
 </section>
      
   
  
    <?php require_once APPROOT . '/Views/inc/footer.php';?>