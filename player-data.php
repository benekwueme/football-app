<?php
include 'inc/dbconn.php';
$f = $_REQUEST['firstname'];
$l = $_REQUEST['lastname'];
$q = "select * from players where firstname = '" . $f . "' and lastname = '" . $l . "' limit 1";

$r = $db->query($q) or die("ewooo");
$rw = $r->fetch_assoc();
?>

 


<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>


<body>

    <?php include 'navbar.php'; ?>
    <div class="player-banner">
        <div class="lastname" data-name="<?php echo $rw['lastname']; ?>">
            <?php echo $rw['firstname']; ?>
        </div>
        <div class="short-img">
            <img src="./images/<?php echo $rw['portrait']; ?>" alt="">
        </div>
    </div>
    <div class="row player-profile" style="margin:0;">
        <div class="col l6 s12">
            <div class="player-image" data-number="<?php echo $rw['number']; ?>">
                <div class="number">

                </div>
            </div>
        </div>
        <div class="col l6 s12 grey lighten-5">
            <div class="player-stat">
                <p style="font-size:30px;font-weight:bold">
                    <?php echo $rw['firstname'] . " " . $rw['lastname'] . " &Tab; &nbsp; &nbsp; #" . $rw['number']; ?>
                </p>
                <table class="table highlight" style="font-size:20px;">
                    <tbody>
                        <tr>
                            <th>BirthDate</th>
                            <td><?php echo $rw['dob']; ?></td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td><?php echo $rw['nationality']; ?></td>
                        </tr>
                        <tr>
                            <th>Height/Weight</th>
                            <td><?php echo $rw['haw']; ?></td>
                        </tr>
                        <tr>
                            <th>Preferred Foot</th>
                            <td><?php echo $rw['foot']; ?></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><?php echo $rw['position']; ?></td>
                        </tr>
                        <!-- <tr>
                        <th>BirthDate</th>
                        <th>13, May 2001</th>
                    </tr> -->
                    </tbody>
                </table>

                <hr style="border-bottom:solid 1px lightgrey">

                <p class="detail">
                    <?php echo $rw['details'];
                    $q = "select * from player_stat where id ='" . $rw['id'] . "' limit 1";
                    $r = $db->query($q);
                    $rst = $r->fetch_assoc();
                    ?>

                </p>


                <div class="stat ">
                    <div class="row" style="margin:0;">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s2"><a href="#general" class="active">General</a></li>
                                <li class="tab col s2"><a href="#attack">Attack</a></li>
                                <li class="tab col s2"><a href="#defense">Defense</a></li>
                                <li class="tab col s3"><a href="#distribute">Distribrution</a></li>
                                <li class="tab col s3"><a href="#discipline">Discipline</a></li>
                            </ul>
                        </div>
                        <div id="general" class="col s12">
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['games_played'] ?></span>
                                <span class="data-desc">Games Played</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['games_starts'] ?></span>
                                <span class="data-desc">Starts</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['games_subbed'] ?></span>
                                <span class="data-desc">Subs Off</span>
                            </div>
                        </div>
                        <div id="attack" class="col s12">
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['total_shots'] ?></span>
                                <span class="data-desc">Total Shots</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['shots_on_target'] ?></span>
                                <span class="data-desc">Shots On Target</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['goals']; ?></span>
                                <span class="data-desc">Goals Scored</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure">
                                    <?php printf("%.1f%%", ($rst['shots_on_target'] / $rst['total_shots']   * 100)); ?></span>
                                <span class="data-desc">Shot Accuracy</span>
                            </div>
                            <div class="col s4">
                                <span
                                    class="data-figure"><?php printf("%.1f%%", ($rst['goals'] / $rst['shots_on_target']  * 100)); ?></span>
                                <span class="data-desc">Conversion Rate</span>
                            </div>
                            <div class="col s4">
                                <span
                                    class="data-figure"><?php printf("%.2f ", ($rst['goals'] / $rst['games_played'])); ?>
                                    '</span>
                                <span class="data-desc">Goals Per Match</span>
                            </div>
                        </div>
                        <div id="defense" class="col s12">
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['clearances'] ?></span>
                                <span class="data-desc">Clearance</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['blocks'] ?></span>
                                <span class="data-desc">Blocks</span>
                            </div>
                            <div class="col s4">
                                <span class="data-figure"><?php echo $rst['interceptions'] ?></span>
                                <span class="data-desc">Interceptions</span>
                            </div>
                            <div class="col s4">
                                <span class="data-desc">Tackles</span>
                                <span class="data-figure"><?php echo $rst['tackles'] . "%" ?></span>
                                <span class="data-desc" style="font-weight:normal">Success Rate</span>
                            </div>
                            <div class="col s4">
                                <span class="data-desc">Duels</span>
                                <span class="data-figure"><?php echo $rst['duels'] . "%" ?></span>
                                <span class="data-desc" style="font-weight:normal">Success Rate</span>
                            </div>
                            <div class="col s4">
                                <span class="data-desc">Aerial Duels</span>
                                <span class="data-figure"><?php echo $rst['aerial_duels'] . "%" ?></span>
                                <span class="data-desc" style="font-weight:normal">Success Rate</span>
                            </div>

                        </div>
                    </div>
                    <div id="distribute" class="col s12">
                        <div class="col s4">
                            <span class="data-figure"><?php echo $rst['total_passes'] ?></span>
                            <span class="data-desc">Total Passes</span>
                        </div>
                        <div class="col s4">
                            <span class="data-figure"><?php echo $rst['successful_passes'] ?></span>
                            <span class="data-desc">Succ. Passes</span>
                        </div>
                        <div class="col s4">
                            <span
                                class="data-figure"><?php printf("%.1f", ($rst['total_passes'] / $rst['games_played'])); ?></span>
                            <span class="data-desc">Passes per 90'</span>
                        </div>

                        <div class="col s4">
                            <span class="data-desc">Passes</span>
                            <span class="data-figure"><?php echo  printf("%.1f", ($rst['successful_passes'] / $rst['total_passes']) * 100);
                                                        echo "%"; ?></span>
                            <span class="data-desc" style="font-weight:normal">Success Rate</span>
                        </div>
                        <div class="col s4 offset-s4">
                            <span class="data-desc">Long Passes</span>
                            <span class="data-figure"><?php echo  $rst['long_passes'] . "%"; ?></span>
                            <span class="data-desc" style="font-weight:normal">Success Rate</span>
                        </div>

                        <div class="col s4">
                            <span class="data-figure"><?php echo  $rst['key_passes'] ?></span>
                            <span class="data-desc">Key Passes</span>
                        </div>
                        <div class="col s4">
                            <span class="data-figure"><?php echo  $rst['successful_crosses'] ?></span>
                            <span class="data-desc">Succ. Crosses</span>
                        </div>
                        <div class="col s4">
                            <span class="data-figure"><?php echo  $rst['assists'] ?></span>
                            <span class="data-desc">Goal Assists</span>
                        </div>
                        <!-- <div class="col s3">
                            <span class="data-figure">40</span>
                            <span class="data-desc">Long Passes</span>
                        </div> -->

                    </div>
                    <div id="discipline" class="col s12">
                        <div class="col s6">
                            <span class="data-figure"><?php echo  $rst['fouls_won'] ?></span>
                            <span class="data-desc">Fouls Won</span>
                        </div>
                        <div class="col s6">
                            <span class="data-figure"><?php echo  $rst['fouls_conceded'] ?></span>
                            <span class="data-desc">Fouls Conceded</span>
                        </div>
                        <div class="col s6">
                            <span class="card yellow lighten-3"><?php echo  $rst['yellow_card'] ?></span>
                            <span class="data-desc">Yellow Cards</span>
                        </div>
                        <div class="col s6">
                            <span class=" card red lighten-3"><?php echo  $rst['red_card'] ?></span>
                            <span class="data-desc">Red Cards</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php // include 'slider.php'; 
    ?>
    <?php //include 'upcoming.php'; 
    ?>
    <?php //include 'category.php'; 
    ?>
    <?php //include 'news.php'; 
    ?>
    <?php include 'sponsor.php'; ?>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

</body>

</html>