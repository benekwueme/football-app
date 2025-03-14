<!DOCTYPE html>
<html lang="en">
<?php
include 'inc/dbconn.php';
include 'header.php';
$mid = $_GET['match_data'];
$q = "select * from results where match_id = '" . $mid . "'";
$r = $db->query($q);
$row = $r->fetch_assoc();
$hdi = $row['home_img'] ? 'block' : 'none';
$adi = $row['away_img'] ? 'block' : 'none';
$qc = "select * from commentary where match_id = '" . $mid . "' order by minute asc";
$rc = $db->query($qc);

?>


<body>

    <?php include 'navbar.php'; ?>
    <?php //include 'slider.php'; 
    ?>

    <div class="match-story-board center-align">
        <img class="bg-img" src="./images/club-logo.svg" width="230px" height="230px" alt="" srcset="">
        <span class="full-time">FT</span>
        <div class="info">
            <span><?php echo $row['date']; ?></span>
            <span><?php echo $row['match_venue']; ?></span>
        </div>
        <div class="score-board">
            <div class="home">
                <div class="home-img">
                    <img style='display:<?php echo $hdi ?>' src='./images/matches/<?php echo $row['home_img']; ?>' alt=''>
                </div>
                <div class="home-team"><?php echo $row['home_team']; ?></div>
            </div>
            <div class="score">
                <span><?php echo $row['home_score']; ?> - <?php echo $row['away_score']; ?></span>
                <span>Friendly</span>
            </div>
            <div class="away">
                <div class="away-img">
                    <img style='display:<?php echo $adi ?>' src='./images/matches/<?php echo $row['away_img']; ?>' alt=''>
                </div>
                <div class="away-team"><?php echo $row['away_team']; ?></div>
            </div>
        </div>
    </div>

    <div class="commentary">
        <h5 class="aldo-font">Match Commentary</h5>
        <hr>

        <?php
        while ($crow = $rc->fetch_assoc()) {
            echo "<div class='comment'>
                <div class='comment-icon'>
                    <div class='time center'>{$crow['minute']}'</div>
                    <div class='icon center'><i class='flaticon-{$crow['icon']}'></i></div>
                </div>
                <div class='comment-info'>
                    <div class='desc'>{$crow['action']}</div>
                    <div class='detail'>{$crow['detail']}</div>
                </div>
            </div>";
        }
        ?>






    </div>












    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

</body>

</html>