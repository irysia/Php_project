<?php 

namespace Entity;

use ludk\Utils\Serializer;

class PostType{
    public int $id;
    public string $postType;
    public string $postTypeUrl;
    use Serializer;
}