<?php 

namespace Entity;

use Entity\PostType;
use ludk\Utils\Serializer;

class Post{
    public int $id;
    public string $title;
    public string $desc;
    public string $content;
    public string $created_at;
    public PostType $postType;
    public Topic $topic;
    public User $user;
    use Serializer;

}

