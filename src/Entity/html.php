<?php 
namespace Entity;
//ATTENTION RESTE A COMPTER LE NOMBRE DE BALISE IFRAME INJECTEE
//(PHP 4 >= 4.3.0, PHP 5, PHP 7, PHP 8)
//mb_substr_count — Compte le nombre d'occurrences d'une sous-chaîne
// substr_count
// (PHP 4, PHP 5, PHP 7, PHP 8)
// substr_count — Compte le nombre d'occurrences de segments dans une chaîne


//str_contains exist for php8 , so need to create it for lower version. here php7.4
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
       //true/false
    }
}
//variables
$userFormat;
$userContent;
$FormatToCompareWith;
$htmlToReturn;
$url;

function checkUserContentAndFormatProper(int $userFormat, string $userContent){
    $texte = 1;
    $image = 2;
    $youtube = 3;
    $souncloud = 4;
    $vimeo = 5;
    $errMsg="<p>Toutes nos excuses, le contenu proposé n'est pas accepté par le site.</p>";
    //on vérifié quel type d'infos l'utilisateur veut envoyer sur le site
    switch ($userFormat) {
        //texte
        case 1:
            $charListForbidden=['<','\\','>','*','{','}','[',']','='];
            //le format est un text
            foreach ($charListForbidden as $one_char) {
                # code...
                if (str_contains($userContent, $one_char)) {
                    $htmlToReturn = '<p class="card-text">les caractères suivants ne sont pas autorisés : < \ > * { } [ ] = </p>'; 
                    return $htmlToReturn;
                }
            }
            $htmlToReturn = "<p>$userContent</p>"; 
            return $htmlToReturn;
            break;
        //image
        case 2:
            $baliseCloseToCount="";
            $FormatToCompareWith='image';
            $baliseCloseToCount='';
            $markerStartUrl = '';
            $markerEndUrl='';
            //le format est une image
            if (str_contains($userContent,$FormatToCompareWith)) {
                $htmlToReturn = '<img src="'.$userContent.'">'; 
                return $htmlToReturn;
            }
            $htmlToReturn = '<img src="'.$userContent.'">'; 
                return $htmlToReturn;
            break;
        //youtube    
        case 3:
            $baliseOpenToCount='<iframe';
            $FormatToCompareWith='src="https://www.youtube.com/embed/';
            $baliseCloseToCount='</iframe>';
            $markerStartUrl = 'src="';
            $markerEndUrl='" title';
            //on vérifie que le userContent contient a la fois les différents chaines de caractère et !!!!!ICI les balises iframe 1 seule fois
            if (str_contains($userContent,$baliseOpenToCount)) {
                    if (str_contains($userContent,$FormatToCompareWith)) {
                        if (str_contains($userContent,$baliseCloseToCount)) {                                              
                                //on veut maintenant extirper l'url source pour generer notre propre iframe
                                $startUrl = strpos( $userContent, $markerStartUrl ) + strlen( $markerStartUrl );
                                $endUrl = strpos( $userContent, $markerEndUrl );
                                $url = substr( $userContent, $startUrl, $endUrl - $startUrl );
                                $htmlToReturn ='<iframe width="100%" height="400" src="'.$url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                return $htmlToReturn;
                            }else{
                                echo $errMsg;
                            }
                    }else{
                        echo $errMsg;
                    }
            }else{
                echo $errMsg;
            }
            break;
        //soundcloud    
        case 4:
            $baliseOpenToCount='<iframe';
            $FormatToCompareWith='src="https://w.soundcloud.com/player/';
            $baliseCloseToCount='</iframe>';
            $markerStartUrl = 'src="';
            $markerEndUrl='"></iframe>';

                //on vérifie que le userContent contient a la fois la chaine de caractère et cela 1 seule fois
            if (str_contains($userContent,$baliseOpenToCount)) {
                if (str_contains($userContent,$FormatToCompareWith)) {
                    if (str_contains($userContent,$baliseCloseToCount)) {                                              
                                //on veut maintenant extirper l'url source pour generer notre propre iframe
                                $startUrl = strpos( $userContent, $markerStartUrl ) + strlen( $markerStartUrl );
                                $endUrl = strpos( $userContent, $markerEndUrl );
                                $url = substr( $userContent, $startUrl, $endUrl - $startUrl );
                                $htmlToReturn ='<iframe width="560" height="400" src="'.$url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                return $htmlToReturn;
                        }else{
                                echo $errMsg;
                            }
                }else{
                    echo $errMsg;
                }
            }else{
                echo $errMsg;
            }
            break;
        //vimeo    
        case 5:
            $baliseOpenToCount='<iframe';
            $FormatToCompareWith='src="https://player.vimeo.com/video/';
            $baliseCloseToCount='</iframe>';
            $markerStartUrl = 'src="';
            $markerEndUrl='" width';

            $baliseOpenToCount2='<div';
            $baliseCloseToCount2='</script>';
            $markerEndUr2='" frameborder';
            $FormatToCompareWith2='<iframe src="https://player.vimeo.com/video/';
            
            //vimeo donne 2 formats de video adaptative et fixe, il faut donc savoir quel format on nous donne
            $pos1 = stripos($userContent, $baliseOpenToCount);//fixe
            $pos2 = stripos($userContent, $baliseOpenToCount2);//adaptative
            //renvoi false si non trouvé et un entier position si oui
            if ($pos1 === 0) {
                // on est sur le format fixe
                    //on vérifie que le userContent contient a la fois la chaine de caractère et cela 1 seule fois
                    if (str_contains($userContent,$baliseOpenToCount)) {
                        if (str_contains($userContent,$FormatToCompareWith)) {
                            if (str_contains($userContent,$baliseCloseToCount)) {              
                                        
                                        //on veut maintenant extirper l'url source pour generer notre propre iframe
                                        $startUrl = strpos( $userContent, $markerStartUrl ) + strlen( $markerStartUrl );
                                        $endUrl = strpos( $userContent, $markerEndUrl );
                                        $url = substr( $userContent, $startUrl, $endUrl - $startUrl );
                                        $htmlToReturn =' <iframe width="100%" height="400" src="'.$url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                        return $htmlToReturn;
                                }else{
                                    $htmlToReturn = $errMsg;
                                    return $htmlToReturn;
                                }
                        }else{
                            $htmlToReturn = $errMsg;
                            return $htmlToReturn;
                        }
                    }else{
                        $htmlToReturn = $errMsg;
                        return $htmlToReturn;
                    }
                    break;
            }else if ($pos2 === 0) {
                //on est dans le format adaptative.
                //on vérifie que le userContent contient a la fois la chaine de caractère et cela 1 seule fois
                if (str_contains($userContent,$baliseOpenToCount2)) {
                    if (str_contains($userContent,$FormatToCompareWith2)) {
                        if (str_contains($userContent,$baliseCloseToCount2)) {                                                  
                                    //on veut maintenant extirper l'url source pour generer notre propre iframe
                                    $startUrl = strpos( $userContent, $markerStartUrl ) + strlen( $markerStartUrl );
                                    $endUrl = strpos( $userContent, $markerEndUr2 );
                                    $url = substr( $userContent, $startUrl, $endUrl - $startUrl );
                                    $htmlToReturn =' <iframe width="100%" height="400" src="'.$url.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                    return $htmlToReturn;
                            }else{
                                    $htmlToReturn = $errMsg;
                                    return $htmlToReturn;
                                }
                    }else{
                        $htmlToReturn = $errMsg;
                        return $htmlToReturn;
                    }
                }else{
                    $htmlToReturn = $errMsg;
                    return $htmlToReturn;
                }
                break;

            }else{
                $htmlToReturn = $errMsg;
                return $htmlToReturn;
            }     
                
        //format non accepté
        default:
        //le format n'est pas accepté
        $htmlToReturn = $errMsg;
        return $htmlToReturn;
    }
}

$post1 = checkUserContentAndFormatProper(3,'<iframe width="560" height="315" src="https://www.youtube.com/embed/EkRrend3sIw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
$post2 = checkUserContentAndFormatProper(4,'<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/229564338%3Fsecret_token%3Ds-yGZT4&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/user439559951" title="user439559951" target="_blank" style="color: #cccccc; text-decoration: none;">user439559951</a> · <a href="https://soundcloud.com/user439559951/bande-son-nuits-daniel-larrieu-acte-iii-chloe-levoy-et-lauriane-rambault/s-yGZT4" title="Bande son &quot;Nuits&quot;, Daniel Larrieu - Acte III - Chloé Levoy et Lauriane Rambault" target="_blank" style="color: #cccccc; text-decoration: none;">Bande son &quot;Nuits&quot;, Daniel Larrieu - Acte III - Chloé Levoy et Lauriane Rambault</a></div>');
$post3 = checkUserContentAndFormatProper(5,'<iframe src="https://player.vimeo.com/video/171309466?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="E2 - TEASER SPECTACLE - JUIN 2016"></iframe>');
$post4 = checkUserContentAndFormatProper(5,'<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/171309466?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="E2 - TEASER SPECTACLE - JUIN 2016"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>');
$post5 = checkUserContentAndFormatProper(1,'Je suis le paragraphe test!');
$post6 = checkUserContentAndFormatProper(2,'data:image/jpeg;base64,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');


// echo $post1;
// echo $post2;
// echo $post3;
// echo $post4;
// echo $post5;
// echo $post6;
?>
<!-- modèle card -->
<!-- <div class="card"> -->
    <!-- version youtube/vimeo/soundcloud -->
    <!-- <div class="embed-responsive embed-responsive-21by9"> -->
        <!-- format soundcloud -->
        <!-- <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/229564338%3Fsecret_token%3Ds-yGZT4&color=%2300aabb&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/user439559951" title="user439559951" target="_blank" style="color: #cccccc; text-decoration: none;">user439559951</a> · <a href="https://soundcloud.com/user439559951/bande-son-nuits-daniel-larrieu-acte-iii-chloe-levoy-et-lauriane-rambault/s-yGZT4" title="Bande son &quot;Nuits&quot;, Daniel Larrieu - Acte III - Chloé Levoy et Lauriane Rambault" target="_blank" style="color: #cccccc; text-decoration: none;">Bande son &quot;Nuits&quot;, Daniel Larrieu - Acte III - Chloé Levoy et Lauriane Rambault</a></div>        format youtube -->
        <!-- format youtube -->
        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/EkRrend3sIw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>     -->
    
            <!-- format vimeo adaptative -->
            <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/171309466?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="E2 - TEASER SPECTACLE - JUIN 2016"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
           
            <!-- format vimeo fixe -->
            <!-- <iframe src="https://player.vimeo.com/video/171309466?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="E2 - TEASER SPECTACLE - JUIN 2016"></iframe> -->
    <!-- </div>    
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>     
</div>

<div class="card bg-primary text-white text-center p-3">
    <blockquote class="blockquote mb-0 card-body">
        <p>Toutes les choses de la terre vont comme vous à la mort ; mais cela ne se voit pas en quelques-unes qui durent longtemps, parce que la vie de l'homme est courte.</p>
        <footer class="blockquote-footer">
            <small class=" text-white"><cite title="Source Title">La Divine Comédie, Le Paradis (1321), XVI de Dante</cite></small>
        </footer>
    </blockquote>
</div> -->