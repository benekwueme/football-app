<!DOCTYPE html>
<html lang="en">
<?php
include 'inc/dbconn.php';
include 'header.php';
$mid = $_GET['post_id'];
$q = "select * from media where link = '" . $mid . "'";
$r = $db->query($q);
if ($r->num_rows < 1) {
    header("location:media.php");
}
$row = $r->fetch_assoc();
?>


<body>

    <?php include 'navbar.php'; ?>
    <?php //include 'slider.php'; 
    ?>

    <div class="media-post grey lighten-4">
        <div class="post-image">
            <img src="./images/media/<?php echo $row['image']; ?>" alt="">
        </div>

        <div class="post white">
            <h2><b><?php echo $row['headline']; ?></b></h2>
            <h4>
                <b><?php echo $row['caption']; ?> <br> &nbsp;</b>

            </h4>
            <p>
                <?php echo nl2br($row['content']); ?>
            </p>
        </div>
    </div>







    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

</body>

</html>