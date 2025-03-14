<!DOCTYPE html>
<html lang="en">
<?php
include 'inc/dbconn.php';
include 'header.php';

$q_res = "select * from results order by date desc";
$q_last = "select * from results order by date desc limit 1";
$q_fix = "select * from fixtures order by date desc limit 1";

$r_res = $db->query($q_res);
$r_last = $db->query($q_last);
$r_fix = $db->query($q_fix);

$rw_fix = $r_fix->fetch_assoc();
$rw_last = $r_last->fetch_assoc();
$h_di = $rw_last['home_img'] ? 'block' : 'none';
$a_di = $rw_last['away_img'] ? 'block' : 'none';
$h_display = $rw_fix['home_img'] ? 'block' : 'none';
$a_display = $rw_fix['away_img'] ? 'block' : 'none';
?>


<body>

    <?php include 'navbar.php'; ?>
    <?php include 'banner.php'; ?>
    <div class='fix-cap row center-align'>
        <span class="aldo-font">RESULTS</span>
    </div>
    <?php
    echo "<div class='fix-res' >
            <div class='res'>
                <div class='date'>
                    last match - {$rw_last['date']} &nbsp;  {$rw_last['time']}
                </div>
                <div class='matchbox'>
                    <div class='venue'>{$rw_last['match_venue']}</div>
                    <div class='details'>
                        <div class='home'>
                            <div class='home-img'>
                                <img style='display:$h_di' src='./images/matches/{$rw_last['home_img']}' alt=''>
                            </div>
                            <div class='home-team'>{$rw_last['home_team']}</div>
                        </div>
                        <div class='scores '>
                            <div class='score'>{$rw_last['home_score']} - {$rw_last['away_score']}</div>
                            <span>FT</span>
                        </div>
                        <div class='away'>
                            <div class='away-img'>
                                 <img style='display:$a_di' src='./images/matches/{$rw_last['away_img']}' alt=''>
                            </div>
                            <div class='away-team'>{$rw_last['away_team']}</div>
                        </div>
                    </div>

                </div>
                <div class='match-info'>
                    <div class='match-type'>{$rw_last['match_type']}</div>
                    <a href='match-story.php?match_data=" . $rw_last['match_id'] . "' class='match-story'>Match Story</a>
                </div>
            </div>
            <div class='fix'>
                <div class='date'>
                    next match - {$rw_fix['date']} &nbsp; {$rw_fix['time']}
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
                                 <img style='display:$h_display' src='./images/matches/{$rw_fix['away_img']}' alt=''>
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
        </div>";
    ?>

    <?php
    while ($row = $r_res->fetch_assoc()) {
        $h_di = $row['home_img'] ? 'block' : 'none';
        $a_di = $row['away_img'] ? 'block' : 'none';



        echo "<div class='results grey hide-on-med-and-down lighten-3 row'>
            <div class='col l2 offset-l1'>
                <div class='match-type'>{$row['match_type']}</div>
                <div class='date'>{$row['date']}, {$row['time']}</div>
            </div>
    
            <div class='img col l2 offset-l1'>
                <div class='home-img own'>
                    <img style='display:$h_di' src='./images/matches/{$row['home_img']}' alt=''>
                </div>
                <div class='away-img'>
                     <img style='display:$a_di' src='./images/matches/{$row['away_img']}' alt=''>
                </div>
            </div>
    
            <div class='teams col l5'>
                <div class='home-teams own'>{$row['home_team']}</div>
                <div class='away-teams'>{$row['away_team']}</div>
            </div>
            <div class='scores col l2'>
                <div class='home-score own'>{$row['home_score']}</div>
                <div class='away-score'>{$row['away_score']}</div>
            </div>
            <div class='match-story col l2'>
                <a href='match-story.php?match_data=" . $row['match_id'] . "' class='btn-large grey lighten-2'>match story</a>
            </div>
        </div>
    </div>
    
    <div class='col s12 grey lighten-3 hide-on-large-only'>
        <div class='result-box'>
            <div class='date'>{$row['date']}, {$row['time']}</div>
            <div class='match'>
                <div class='host'>
                    <div class='home-img'>
                       <img style='display:$h_di' src='./images/matches/{$row['home_img']}' alt=''>
                    </div>
                    <span>{$row['home_team']}</span>
                </div>
                <div class='score'>{$row['home_score']} - {$row['away_score']}</div>
                <div class='visitor'>
                    <div class='away-img'>
                        <img style='display:$a_di' src='./images/matches/{$row['away_img']}' alt=''>
                    </div>
                    <span>{$row['away_team']}</span>
                </div>
            </div>
            <a href=' match-story.php?match_data=" . $row['match_id'] . "' class='btn red'>View Match</a>
        </div>
    </div>
    
    ";
    }
    ?>

    




    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

</body>

</html>