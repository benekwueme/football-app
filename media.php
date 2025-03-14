<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
include 'inc/dbconn.php';
$q = "select * from media where 1";
$r = $db->query($q);


?>


<body>

    <?php include 'navbar.php'; ?>
    <?php include 'banner.php';


    ?>

    <div class="row news grey lighten-4" style="padding:70px 50px;margin:0px">
        <?php
        while ($ro = $r->fetch_assoc()) {
            echo '<div class="col l4 s12">
                <div class="news-image">
                    <a href="media_post.php?post_id=' . $ro['link'] . '"><img src="./images/media/' . $ro['image'] . '" alt=""
                            srcset=""></a>
                </div>
                <div class="news-details white">
                    <h5><b>' . $ro['headline'] . '</b></h5>
    
                    <div class="news-links ">
                        <b>FIRST TEAM</b>
                        <b>' . $ro['dop'] . '</b>
                    </div>
                </div>
    
            </div>';
        }

        ?>


    </div>


    <?php //include 'upcoming.php'; 
    ?>
    <?php //include 'category.php'; 
    ?>
    <?php //include 'news.php'; 
    ?>
    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
    <script src="./js/team-data.js"></script>

</body>

</html>