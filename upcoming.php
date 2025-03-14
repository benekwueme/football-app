<div class="row upcoming-matches" >
    <h4 class="aldo-font" style="font-weight: 600;">RECENT MATCHES &amp; FIXTURES</h4>

    <?php
    include 'inc/dbconn.php';

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
</div>