<?php
namespace templates;

include "../src/checkFormatHtml.php";
use function Entity\checkUserContentAndFormatProper;
include __DIR__ . "/include/header.php";
date_default_timezone_set('UTC');
$today = date("d.m.y - g:i a"); 

?>

<!-- modale ajout thème -->
<div class="modal fade" id="newTopic" tabindex="-1" aria-labelledby="NewTopic" aria-hidden="true">
<!-- Vertically centered scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content">
            <form action="/newTopic" id="newTopicForm" method="POST">
                <div class="modal-header">           
                    <h3><i class="fas fa-comment-dots"></i> Création nouveau thème</h3>
                </div>
                <div class="modal-body">
                        <?php
                        if (isset($errorMsg)) {
                            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                        }
                        ?>
                        <div class="form-row align-items-center">
                            <div class="col d-flex justify-content-between align-items-center my-1">
                                <label class="sr-only" for="topicTitle">Titre du thème</label>
                                <span><i class="fas fa-heading mr-3 pb-2"></i></span>
                                <input type="text" class="form-control mb-2" name="topicTitle" placeholder="Titre du thème" required>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <div class="col d-flex justify-content-between align-items-center my-1">
                                <label class="sr-only" for="topicDesc">Description</label>
                                <span><i class="fas fa-align-justify mr-3 pb-2"></i></span>
                                <textarea type="text" class="form-control mb-2" name="topicDesc" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <label for="creationDate" class="sr-only"><?= $today ?></label>
                            <input  name="creationDate" class="sr-only" type="text" value="<?= $today ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-info my-2 my-sm-0 " type="submit" data-dismiss="modal" >Créer Thème</button>
                </div>
            </form>
        </div>
    </div>
</div>    
<!-- modale ajout Post -->
<div class="modal fade" id="newPost" tabindex="-1" aria-labelledby="newPost" aria-hidden="true">
<!-- trouver comment passer les infos du topic sur lequel on veut ajouter le post -->
<!-- Vertically centered scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content">
            <form action="/newPost" method="POST">
                <div class="modal-header">
                    <h3><i class="fas fa-comments"></i> Création nouveau post</h3>
                    <p id="topicSelected"><?=$this->topic->id ?></p>
                </div>
                <div class="modal-body">
                    <div class="form-row align-items-center">
                        <div class="col d-flex justify-content-between align-items-center my-1">
                            <label class="mr-sm-2" for="postType">Type de post</label>
                            <select class="custom-select mr-sm-2" name="postType" style="width: 70%; margin-right:0px!important; margin-bottom: .5rem!important">
                            <?php foreach ($postTypes as $one_postType) {
                            ?>
                                <option value="<?=$one_postType->id?>"><?= $one_postType->postType ?></option>
                            <?php 
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col d-flex justify-content-between align-items-center my-1">
                            <label class="sr-only" for="postTitle">Title</label>
                            <span><i class="fas fa-heading mr-3 pb-2"></i></span>
                            <input type="text" class="form-control mb-2" name="postTitle" placeholder="Titre du post" required>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col d-flex justify-content-between align-items-center my-1">
                            <label class="sr-only" for="postDesc">Description</label>
                            <span><i class="fas fa-align-justify mr-3 pb-2"></i></span>
                            <textarea type="text" class="form-control mb-2" name="postDesc" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col d-flex justify-content-between align-items-center my-1">
                            <label class="sr-only" for="postContent">URL contenu</label>
                            <span><i class="fas fa-photo-video mr-3 pb-2"></i></span>
                            <input type="text" class="form-control mb-2" name="postContent" placeholder="URL contenu" >
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <label for="postCreationDate" class="sr-only"><?= $today ?></label>
                        <input  name="postCreationDate" class="sr-only" type="text" placeholder="<?= $today ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-info my-2 my-sm-0 " type="submit" data-dismiss="modal" >Créer Post</button>
                </div>
            </form>
        </div>
    </div>
</div>  

<?php 
if(isset($_SESSION['user'])){
?>
<!-- pensine -->
<div class="container my-3">
    <!-- SEARCH AND ADD THEME -->
    <div class="row">
        <div class="col-12">
            <!-- search -->
            <form class=" form-inline my-2 my-lg-0" action="/">
                <input class="form-control col-11 mr-auto" name="search" type="search" placeholder="Chercher un thème" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0 " type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex justify-content-end">
            <!-- add theme -->
            <button class="btn btn-info my-2 my-sm-0 " data-toggle="modal" data-target="#newTopic" >Ajouter un thème</button>
        </div>
    </div>


    <!-- CONTENT -->
    <ul class="list-group">
    <!-- topic1 -->
    <?php 
    foreach ($topics as $one_topic) {
    ?>
    <li class="list-group-item border-0">
        <!-- topic details -->
        <div class="media">
            <img src="images/userProfile/resize/portrait1.jpg" class="align-self-start mr-3 rounded-circle" alt="portrait auteur du thème">
            <div class="media-body">
                <span><small><?=$one_topic->created_at ?></small></span>
                <h5 class="mt-0"><?=$one_topic->topic ?></h5>
                <p><?= $one_topic->desc ?></p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-start ml-5">
                <!-- add post on grid -->
                <button class="btn btn-info my-2 my-sm-0  ml-3" data-toggle="modal" data-target="#newPost" >Ajouter un post</button>
            </div>
        </div>
        <!-- posts relatives grid -->
        <div class="row container ml-5 post">
            <div class="card-columns  data-masonry='{"percentPosition": true }' ">
    <?php 
        foreach ($posts as $one_post) {
            
            if ($one_topic->topic === $one_post->topic->topic){
                
                if($one_post->postType->id!==1){
                ?>  
                <!-- modèle card -->
                <div class="card">
                    <!-- version youtube/vimeo/soundcloud -->
                    <?php 
                    if(!empty($one_post->content) && $one_post->postType->id!==2){
                    ?>
                    <div class="embed-responsive embed-responsive-21by9"><?=checkUserContentAndFormatProper($one_post->postType->id,$one_post->content)?></div>    
                    <?php 
                    }
                    if(!empty($one_post->content) && $one_post->postType->id===2){          
                    ?>
                    <img src="<?= checkUserContentAndFormatProper($one_post->postType->id,$one_post->content)?>" alt="" style="width:100%;">
                    <?php 
                    }
                    ?>
                    <div class="card-body">
                    <?php 
                    if(!empty($one_post->title)){                    
                    ?>
                        <h5 class="card-title"><?=$one_post->title ?></h5>
                    <?php 
                    }
                    if(!empty($one_post->desc)){
                    ?>                   
                        <p class="card-text"><?=$one_post->desc ?></p>
                    <?php 
                    }
                    if(!empty($one_post->created_at)){
                    ?>
                        <p class="card-text"><small class="text-muted"><?=$one_post->created_at ?></small></p>
                    <?php 
                    }
                    ?>
                    </div>     
                </div>

                    <?php 
                }   
                    if($one_post->postType->id===1){

                    
                    ?>
                    <div class="card bg-primary text-white text-center p-3">
                        <blockquote class="blockquote mb-0 card-body">
                            <p><?=$one_post->content ?></p>
                            <footer class="blockquote-footer text-white">
                                <small class="text-white"><cite title="Source Title"><?=$one_post->desc ?></cite></small>
                            </footer>
                        </blockquote>
                    </div>
    <?php
                    }
            }
        }
    }
    ?>
            </div>
        </li>
    </ul>
</div>
<?php 
}else{
?>
<div class="container my-5">
    <h2 class="display-5 text-center">Rejoignez la communauté et accédez aux différents sujets</h2>
</div>
<?php 
}

include __DIR__ .'/include/footer.php';
?>











