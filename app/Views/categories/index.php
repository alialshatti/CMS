<?php require_once APPROOT . '/Views/inc/header.php';?>
<?php require_once APPROOT . '/Views/inc/navigation.php';?>
<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            
                <h1 class="page-header">
                <?php echo $data['title'];?>
                   <!-- <small>Secondary Text</small> -->
                </h1>

                
                <!-- card -->
                
               <?php foreach($data['categories'] as $category):?>
                <div class="container mt-2">
                    <!--   <div class="card card-block mb-2">
                        <h4 class="card-title">Card 1</h4>
                        <p class="card-text">Welcom to bootstrap card styles</p>
                        <a href="#" class="btn btn-primary">Submit</a>
                    </div>   -->
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                          <div class="card card-block" >
                       
                                <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset">
                                     <a href="<?php echo URLROOT?>pages/about/<?php echo $category->id;?>" class="card-title text-primary  mt-3 mb-3" id="<?php echo $category->id;?>"><?php echo $category->name;?></a>
               
                      
                         
                    </div>
                    
                </div>
               <?php endforeach;?>


               
               

            </div>

            </section>
</div>

       
 

 <?php require_once APPROOT . '/Views/inc/footer.php';?>
