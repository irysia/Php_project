<?php
require"../vendor/autoload.php";
use Entity\Post;
use Entity\PostType;
use Entity\Topic;
use Entity\User;

use ludk\Persistence\ORM;
require __DIR__ . '/../vendor/autoload.php';

$orm = new ORM(__DIR__ . '/../Resources');

$postRepo = $orm->getRepository(Post::class);
$posts = $postRepo->findAll();
// var_dump($posts);
// die();
$postTypeRepo = $orm->getRepository(PostType::class);
$postTypes = $postTypeRepo->findAll();

$topicsRepo = $orm->getRepository(Topic::class);
$topics = $topicsRepo->findAll();

$usersRepo = $orm->getRepository(User::class);
$users = $usersRepo->findAll();

// //USERS
// $user1 = new User();
// $user1->id=1;
// $user1->nickname ="IRYSIA";
// $user1->password = "pwd1";

// $user2 = new User();
// $user2->id=2;
// $user2->nickname ="PEAH";
// $user2->password = "pwd2";

// $users =[$user1,$user2];

// //TOPICS
// $topic1 = new Topic();
// $topic1->id=1;
// $topic1->topic="L'Enfer";
// $topic1->desc ="Il est juste que celui-là subisse un châtiment sans fin qui, par amour des choses qui n'ont point de durée, se dépouille éternellement de cet amour. La Divine Comédie, Le Paradis (1321), XV de Dante";
// $topic1->created_at="02/04/2021";

// $topic2 = new Topic();
// $topic2->id=2;
// $topic2->topic="La Catastrophe";
// $topic2->desc ="Parler de l'horrible, montrer l'horrible. Comment faut-il en parler? Peut-on en parler ? Peut-on le nommer ?";
// $topic2->created_at="26/04/2021";


// $topic3 = new Topic();
// $topic3->id=3;
// $topic3->topic="Le mouvement";
// $topic3->desc ="La danse, le geste, se regarder, communiquer, le voyage, le mirroir";
// $topic3->created_at="04/05/2021";

// $topics=[$topic1,$topic2,$topic3];

// ///PostType
// $postTypeTxt = new PostType();
// $postTypeTxt->id=1;
// $postTypeTxt->postType = "Texte";
// $postTypeTxt->postTypeUrl = " ";

// $postTypeImg = new PostType();
// $postTypeImg->id=2;
// $postTypeImg->postType = "Image";
// $postTypeImg->postTypeUrl = "image";

// $postTypeYoutube = new PostType();
// $postTypeYoutube->id=3;
// $postTypeYoutube->postType = "Youtube";
// $postTypeYoutube->postTypeUrl = "https://www.youtube.com/embed/";


// $postTypeSoundCloud = new PostType();
// $postTypeSoundCloud->id=4;
// $postTypeSoundCloud->postType = "Soundcloud";
// $postTypeSoundCloud->postTypeUrl = "https://w.soundcloud.com/player/";


// $postTypeVimeo = new PostType();
// $postTypeVimeo->id=5;
// $postTypeVimeo->postType = "Vimeo";
// $postTypeVimeo->postTypeUrl = "https://player.vimeo.com/video/";

// $postTypes = [$postTypeTxt,$postTypeImg,$postTypeYoutube,$postTypeSoundCloud];

// ///Posts
// $post1 = new Post();
// $post1->id=1;
// $post1->title ="Extrait - Inferno - Roméo Castellucci";
// $post1->desc ="Inferno est un monument de la douleur. L’artiste doit payer. Dans la forêt obscure où il est d’emblée plongé, il doute, il a peur, il souffre. Mais de quel péché l’artiste est-il coupable ? S’il est ainsi perdu, c’est qu’il ne connaît pas la réponse à cette question. Seul sur le grand plateau du théâtre, ou au contraire muré dans la foule et confronté à la rumeur du monde, l’homme que met en scène Romeo Castellucci subit de plein fouet cette expérience de la perte de soi, désemparé. Tout ici l’agresse, la violence des images, la chute de son propre corps dans la matière, les animaux et les spectres.";
// $post1->content='<iframe src="https://player.vimeo.com/video/95510211" width="640" height="352" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
//     <p><a href="https://vimeo.com/95510211">Extrait - Inferno - Rom&eacute;o Castellucci</a> from <a href="https://vimeo.com/compagniedesindes">La Compagnie des Indes</a> on <a href="https://vimeo.com">Vimeo</a>.</p>';
// $post1->created_at="10/05/2021";
// $post1->postType = $postTypeVimeo->id;
// $post1->topic =$topic1->topic;
// $post1->user=$user1;


// $post2 = new Post();
// $post2->id=2;
// $post2->title ="";
// $post2->desc="La Divine Comédie, Le Paradis (1321), XVI de Dante";
// $post2->content="Toutes les choses de la terre vont comme vous à la mort ; mais cela ne se voit pas en quelques-unes qui durent longtemps, parce que la vie de l'homme est courte.";
// $post2->created_at="02/05/2021";
// $post2->postType = $postTypeTxt->id;
// $post2->topic =$topic1->topic;
// $post2->user=$user2;

// $post3=new Post();
// $post3->id=3;
// $post3->title =" ";
// $post3->desc="";
// $post3->content='data:image/jpeg;base64,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';
// $post3->created_at="02/05/2021";
// $post3->postType = $postTypeImg->id;
// $post3->topic =$topic1->topic;
// $post3->user=$user2;

// $post4 = new Post();
// $post4->id=4;
// $post4->title =" ";
// $post4->desc="";
// $post4->content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS65MipGhubXx0_CbtbP1XmFsTP_pErfGZd_NoPK4uSPUbi_logseP39aT3K8gNRyukcU4&usqp=CAU";
// $post4->created_at="02/05/2021";
// $post4->postType = $postTypeImg->id;
// $post4->topic =$topic1->topic;
// $post4->user=$user2;


// $post5 = new Post();
// $post5->id=5;
// $post5->title =" ";
// $post5->desc="";
// $post5->content='<iframe width="100%" height="auto" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/223645672&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>';
// $post5->created_at="08/05/2021";
// $post5->postType = $postTypeSoundCloud->id;
// $post5->topic =$topic1->topic;
// $post5->user=$user1;

// $post6 = new Post();
// $post6->id=6;
// $post6->title =" ";
// $post6->desc="";
// $post6->content='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuKt8QQVFkai7iapvLyYCPlbjJ81uT9XLb5A&usqp=CAU';
// $post6->created_at="02/04/2021";
// $post6->postType = $postTypeImg->id;
// $post6->topic =$topic1->topic;
// $post6->user=$user1;


// $post7 = new Post();
// $post7->id=7;
// $post7->title =" ";
// $post7->desc="";
// $post7->content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-Y_5__1IvDSAWg_l0DTt4mrST_aHUvCiVew&usqp=CAU";
// $post7->created_at="02/04/2021";
// $post7->postType = $postTypeImg->id;
// $post7->topic =$topic1->topic;
// $post7->user=$user1;


// //
// $post9 = new Post();
// $post9->id=9;
// $post9->title ="";
// $post9->desc="";
// $post9->content='<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/229563163%3Fsecret_token%3Ds-rcXEy&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>';
// $post9->created_at="02/04/2021";
// $post9->postType = $postTypeSoundCloud->id;
// $post9->topic =$topic2->topic;
// $post9->user=$user1;

// $post10 = new Post();
// $post10->id=10;
// $post10->title ="";
// $post10->desc="Dictionnaire Larousse";
// $post10->content="Événement qui cause de graves bouleversements, des morts.";
// $post10->created_at="02/04/2021";
// $post10->postType = $postTypeTxt->id;
// $post10->topic =$topic2->topic;
// $post10->user=$user1;

// $post11 = new Post();
// $post11->id=11;
// $post11->title ="";
// $post11->desc="";
// $post11->content='<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/223645478%3Fsecret_token%3Ds-F7aus&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>';
// $post11->created_at="02/04/2021";
// $post11->postType = $postTypeSoundCloud->id;
// $post11->topic =$topic2->topic;
// $post11->user=$user2;


// $post12 = new Post();
// $post12->id=12;
// $post12->title ="";
// $post12->desc="";
// $post12->content='<iframe width="560" height="315" src="https://www.youtube.com/embed/6sCB0emlEa8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
// $post12->created_at="02/04/2021";
// $post12->postType = $postTypeYoutube->id;
// $post12->topic =$topic2->topic;
// $post12->user=$user2;

// //
// $post13 = new Post();
// $post13->id=13;
// $post13->title ="";
// $post13->desc="";
// $post13->content='<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/229587362%3Fsecret_token%3Ds-di1Pi&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
//     </div>';
// $post13->created_at="02/04/2021";
// $post13->postType = $postTypeSoundCloud->id;
// $post13->topic =$topic3->topic;
// $post13->user=$user1;

// $post14 = new Post();
// $post14->id=14;
// $post14->title ="";
// $post14->desc="Jérôme Touzalin / Le Pommier";
// $post14->content="La danse, c’est de l’architecture en mouvement.";
// $post14->created_at="02/04/2021";
// $post14->postType = $postTypeTxt->id;
// $post14->topic =$topic3->topic;
// $post14->user=$user1;

// $post15 = new Post();
// $post15->id=15;
// $post15->title ="";
// $post15->desc="";
// $post15->content='<iframe width="560" height="315" src="https://www.youtube.com/embed/NbztFrI_zj4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
// $post15->created_at="02/04/2021";
// $post15->postType = $postTypeYoutube->id;
// $post15->topic =$topic3->topic;
// $post15->user=$user2;

// $post16 = new Post();
// $post16->id=16;
// $post16->title ="";
// $post16->desc="";
// $post16->content="data:image/jpeg;base64,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";
// $post16->created_at="02/04/2021";
// $post16->postType = $postTypeImg->id;
// $post16->topic =$topic3->topic;
// $post16->user=$user2;

// $post17 = new Post();
// $post17->id=17;
// $post17->title ="";
// $post17->desc="";
// $post17->content="data:image/jpeg;base64,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";
// $post17->created_at="02/04/2021";
// $post17->postType = $postTypeImg->id;
// $post17->topic =$topic3->topic;
// $post17->user=$user1;


// $posts = [$post1,$post2,$post3,$post4,$post5,$post6,$post7,$post9,$post10,$post11,$post12,$post13,$post14,$post15,$post16,$post17];

// ?>