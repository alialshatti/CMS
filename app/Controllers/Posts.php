<?php
class Posts extends Controller{
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');

       
    }


  public function index(){
    if(!isLoggedIn()){
        redirect('users/login');
    }
    $posts = $this->postModel->GetPosts();
    $data = [
        'title' =>'Posts',
        'posts' =>$posts
    ];
    $this->view('posts/index',$data);
  }

  public function details($id){
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $data = [
        'title' =>'Posts',
        'posts' =>$post,
        'user' =>$user
    ];
    
    $this->view('posts/details',$data);
  }


  public function add(){
    $category =$this->categoryModel->GetCategories();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //process form
        
    $id=intval($_POST['cat_id']);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
        'title' => 'Add post',
        'post_title' => trim($_POST['post_title']),
        'post_body' => trim($_POST['post_body']),
        //'categoryid' =>trim($_POST['categoryid']),
        'short_view' =>trim($_POST['short_view']),
        'category' =>$category,
        'cat_id'=>$id,
        'image_error'=>'',
        'image'=>$_FILES['image'],
        'tags'=>$_POST['tags'],
        'category_error'=>'',
        'post_title_error' => '',
        'short_view_error' =>'',
        'post_body_error' => '',
        'tags_error'=>$_POST['tags']
    ];
    if(empty($data['post_title'])){
        $data['post_title_error'] = 'please insert post title';
    }
    if(empty($data['post_body'])){
        $data['post_body_error'] = 'please insert post body';
    }
    if(empty($data['image'])){
        $data['image_error']="please upload image";
    }

    

    if(empty($data['post_body_error']) && empty($data['post_title_error']) && empty($data['image_error'])){
        $this->postModel->add($data);
        redirect('posts/index');
    }else{
        $this->view('posts/add',$data);
    }


}else{
    $data = [
        'title' => 'Add Post',
        'post_title' => '',
        'categoryid'=>'',
        'post_body' => '',
        'short_view'=>'',
        'tags'=>'',
        'category' =>$category,
        'image'=>'',
        'post_title_error' => '',
        'post_body_error' => '',
        'short_view_error' =>'',
        'category_error'=>'',
        'image_error'=>'',
        'tags_error'=>'',
        'cat_id'=>''
    ];
        $this->view('posts/add',$data);
}



}

public function search(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($_POST['submitsearch'])){
            if(isset($_POST['search'])){
             $posts = $this->postModel->search($_POST['search']);
             $data = [
                    'title' =>'Posts',
                    'posts' =>$posts
                    ];
            $this->view('posts/index',$data);


            }else{
                $this->index();
            }
        }else{$this->index();
        }
    }else{$this->index();
    }
}
}