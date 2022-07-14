<?php

class Post{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    function GetPosts(){
        $this->db->query('SELECT *,
        posts.id as postId,
        users.id as userId,
        posts.created_at as postCreated
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.id
        ORDER BY posts.created_at ASC
        ');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;

    }

    public function add($data){
        $this->db->query('INSERT INTO posts (user_id, title, short_view, body, cat_id, image , tags ) VALUES (:user_id, :title,:short_view, :body, :cat_id, :image, :tags )');
        $image = $data['image'];
        $imagename = $image['name'];
        $f=explode('.',$imagename);
        $f[1] = strtolower($f[1]);
        $imagepath=$image['tmp_name'];

       $img='public/images/'. $image['name'];
       
        move_uploaded_file($imagepath,'./../public/images/'. $image['name']);

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':title', $data['post_title']);
        $this->db->bind(':body', $data['post_body']);
        $this->db->bind(':short_view', $data['short_view']);
        $this->db->bind(':cat_id', $data['cat_id']);
        $this->db->bind(':image', $img);
        $this->db->bind(':tags', $data['tags']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

          



    }
    function search($search){
        $this->db->query('SELECT *,
        posts.id as postId,
        users.id as userId,
        posts.created_at as postCreated
         FROM posts 
         INNER JOIN users
         ON posts.title = :title 
          OR
           short_view = :short_view');
        $this->db->bind(':title', $search);
        $this->db->bind(':short_view', $search);
        $results = $this->db->resultSet();

        return $results;                                        
    }
    function addComment(){
        
    }
}