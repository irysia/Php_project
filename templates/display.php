<?php
namespace templates;

include "../src/checkFormatHtml.php";
use function Entity\checkUserContentAndFormatProper;
include __DIR__ . "/include/header.php";
?>

<!-- modale ajout thème -->
<div class="modal fade" id="newTopic" tabindex="-1" aria-labelledby="NewTopic" aria-hidden="true">
<!-- Vertically centered scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
            <p>Test modale new Topic</p>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
</div>    
<!-- modale ajout Post -->
<div class="modal fade" id="newPost" tabindex="-1" aria-labelledby="newPost" aria-hidden="true">
<!-- Vertically centered scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
            <p>Test modale new Post</p>
            </div>
            <div class="modal-footer">
            </div>
            </div>
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
            <button class="btn btn-info my-2 my-sm-0 " data-toggle="modal" data-target="#newTopic">Ajouter un thème</button>
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
                <button class="btn btn-info my-2 my-sm-0  ml-3" data-toggle="modal" data-target="#newPost">Ajouter un post</button>
            </div>
        </div>
        <!-- posts relatives grid -->
        <div class="row container ml-5 post">
            <div class="card-columns  data-masonry='{"percentPosition": true }' ">
    <?php 
        foreach ($posts as $one_post) {
            
            if ($one_topic->topic === $one_post->topic->topic){
                ?>  
                <!-- modèle card -->
                <div class="card">
                    <!-- version youtube/vimeo/soundcloud -->
                    <div class="embed-responsive embed-responsive-21by9"><?=checkUserContentAndFormatProper($one_post->postType->id,$one_post->content)?></div>    
                    <div class="card-body">
                        <h5 class="card-title"><?=$one_post->title ?></h5>
                        <p class="card-text"><?=$one_post->desc ?></p>
                        <p class="card-text"><small class="text-muted"><?=$one_post->created_at ?></small></p>
                    </div>     
                </div>

                <!-- <div class="card bg-primary text-white text-center p-3">
                    <blockquote class="blockquote mb-0 card-body">
                        <p>Toutes les choses de la terre vont comme vous à la mort ; mais cela ne se voit pas en quelques-unes qui durent longtemps, parce que la vie de l'homme est courte.</p>
                        <footer class="blockquote-footer">
                            <small class=" text-white"><cite title="Source Title">La Divine Comédie, Le Paradis (1321), XVI de Dante</cite></small>
                        </footer>
                    </blockquote>
                </div> -->
    <?php
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
?>












    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="js/script.js"></script>
</body>
</html>