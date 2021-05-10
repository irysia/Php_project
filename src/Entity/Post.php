<?php 

namespace Entity;

class Post{
    public int $id;
    public string $content;
    public string $created_at;
    public int $postType_id;
    public int $topic_id;
    public string $author_id;

}