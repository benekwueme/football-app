<!DOCTYPE html>
<html lang="en">
<?php
include 'inc/dbconn.php';
include 'header.php';


$q_fix = "select * from fixtures";


$r_fix = $db->query($q_fix);

?>


<body>

    <?php include 'navbar.php'; ?>
    <?php include 'banner.php'; ?>
    <div class='fix-cap row center-align'>
        <span class="aldo-font">UPCOMING MATCHES</span>
    </div>
    <div class='fix-res'>
        <?php
        while ($rw_fix = $r_fix->fetch_assoc()) {
            $h_display = $rw_fix['home_img']?'block':'none';
            $a_display = $rw_fix['away_img']?'block':'none';
            echo "
          
            <div class='fix'>
                <div class='date'>
                    next match - {$rw_fix['date']}, {$rw_fix['time']}
                </div>
                <div class='matchbox'>
                    <div class='venue'>{$rw_fix['match_venue']}</div>
                    <div class='details'>
                        <div class='home'>
                            <div class='home-img'>
                                <img style='display:$h_display' src='./images/matches/{$rw_fix['home_img']}' alt=''>
                            </div>
                            <div class='home-team'>{$rw_fix['home_team']}</div>
                        </div>
                        <div class='scores vs'>
                            <div class='score'>VS</div>
                            <span>{$rw_fix['date']}</span>
                        </div>
                        <div class='away'>
                            <div class='away-img'>
                                <img style='display:$a_display' src='./images/matches/{$rw_fix['away_img']}'>
                            </div>
                            <div class='away-team'>{$rw_fix['away_team']}</div>
                        </div>
                    </div>
                </div>
                <div class='match-info'>
                    <div class='match-type'>{$rw_fix['match_type']}</div>
                    <div class='match-story'>Ticket Info</div>
                </div>
            </div>
          
       ";
        }
        ?>
    </div>


    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

</body>

</html>