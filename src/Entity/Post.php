<?php 

namespace Entity;

use Entity\PostType;

class Post{
    public int $id;
    public string $title;
    public string $desc;
    public string $content;
    public string $created_at;
    public int $postType;
    public string $topic;
    public User $user;

    public function __construct()
    {
        // construct -> int $id, string $title, string $desc, string $content, string $created_at, PostType $postType, Topic $topic, User $user
        // $this->id = $id;
        // $this->title = $title;
        // $this->desc = $desc;
        // $this->content = $content;
        // $this->created_at = $created_at;
        // $this->postType = $postType;
        // $this->topic = $topic;
        // $this->user = $user;
    }


}