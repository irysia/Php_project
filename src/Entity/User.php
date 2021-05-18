<?php 

namespace Entity;

use ludk\Utils\Serializer;

class User{

    public int $id ;
    public string $nickname;
    public string $password;
    public string $avatarUrl;
    use Serializer;
}
