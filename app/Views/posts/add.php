
<?php require_once APPROOT . '/Views/inc/header.php';?>
<?php require_once APPROOT . '/Views/inc/navigation.php';?>
<div class="container">

<div class="row">
        <div class="ccard card-body bg-light mt-5">
            <a href="<?php echo URLROOT;?>/posts/index" class="btn btn-light"><i class="fa fa-backwards">Back</i></a>
            <h2 class="mb-3"><?php echo $data['title'];?></h2>

            <form action="<?php echo URLROOT ?>/posts/add" method="post" enctype="multipart/form-data">

            <div class="form-group first">
                <label for="post_title">title</label>
                <input type="text" class="form-control <?php echo (!empty($data['post_title_error']))?'is-invalid' :'';?>" value="<?php echo $data['post_title']?>" name="post_title" id="post_title">
                <span class="invalid-feedback"><?php echo $data['post_title_error'];?></span>
              </div>

              <div class="form-group first">
                <label for="tags">tags</label>
                <input type="text" class="form-control <?php echo (!empty($data['tags_error']))?'is-invalid' :'';?>" value="<?php echo $data['tags']?>" name="tags" id="tags">
                <span class="invalid-feedback"><?php echo $data['tags_error'];?></span>
              </div>

              <div class="form-group first mb-4">
                <label for="post_body">body</label>
                <textarea class="form-control <?php echo (!empty($data['post_body_error']))?'is-invalid' :'';?>" name="post_body"  id="post_body"> </textarea>
                <span class="invalid-feedback"><?php echo $data['post_body_error'];?></span>
                
              </div>

              <div class="form-group first mb-4">
                <label for="post_body">short view</label>
                <textarea class="form-control <?php echo (!empty($data['short_view_error']))?'is-invalid' :'';?>" name="short_view"  id="short_view"> </textarea>
                <span class="invalid-feedback"><?php echo $data['short_view_error'];?></span>
                
              </div>

              <div class="form-group first mb-4">
                <select name="cat_id" id="cat_id">
                <?php $category=$data['category']; for($i=0; $i < sizeof($category) ; $i++):?>
                  <?php $id =$category[$i]->id ;?>
                    <option value='<?php echo $id ?>'><?php echo $category[$i]->name ;?></option>
                    <?php endfor;?>
                </select>
              </div>

              <div class="form-group first mb-4">
                <label for="image">choise image</label>
                <input type="file" class="form-control <?php echo (!empty($data['image_error']))?'is-invalid' :'';?>" name="image"  id="image">
                <span class="invalid-feedback"><?php echo $data['image_error'];?></span>
                
              </div>
              
             
                
            
              <input type="submit" value="Post" name="post" class="btn btn-primary btn-lg">
              
              
            </form>
            </div>
</div>
</div>

          
      
        
     
    
  

