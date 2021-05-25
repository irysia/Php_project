<?php 

namespace Entity;

use ludk\Utils\Serializer;

class Topic{
    public int $id;
    public string $topic;
    public string $desc;
    public string $created_at;
    public User $user;
    use Serializer;
    
}
