
 <?php
 
 $db = new Database;
 $db->query('SELECT * FROM categories');
 $data = $db->resultSet();
 ?>
 <div class="col-md-4 pull-right">

 <!-- Blog Search Well -->
 <div class="pull-right">
 <div class="well">
    <h4>Blog Search</h4>
    <div class="input-group">
        <form action="<?php echo URLROOT ?>posts/search" method="post">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <input  class="btn btn-default" name='submitsearch' type="submit">
                <span class="glyphicon glyphicon-search"></span>
        
        </span>
        </form>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
    <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php for($i=0;$i<sizeof($data)/2;$i++): ?>
                    <li>
                        <a href="<?php echo URLROOT ;?>pages/contact/<?php echo($data[$i]->id );?>"><?php echo ($data[$i]->name) . " "; ?></a>
                    </li>
                    <?php endfor; ?>
            </ul>
        </div>
        <!-- /.col-lg-6  -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php for($i=sizeof($data)/2+1;$i<sizeof($data);$i++): ?>
                
                <li>
                        <a href="<?php echo URLROOT ;?>pages/contact/<?php echo($data[$i]->id );?>"><?php echo ($data[$i]->name) . " "; ?></a>
                    </li>
                    <?php endfor; ?>
                
               
            </ul>
        </div>
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>
</div>