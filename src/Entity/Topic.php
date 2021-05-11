<?php 

namespace Entity;

class Topic{
    public int $id;
    public string $topic;
    public string $desc;
    public string $created_at;
    public User $user;


}