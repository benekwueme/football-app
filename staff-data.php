<?php
include 'inc/dbconn.php';
$f = $_REQUEST['firstname'];
$l = $_REQUEST['lastname'];
$q = "select * from staff where firstname = '" . $f . "' and lastname = '" . $l . "' limit 1";

$r = $db->query($q) or die("ewooo");
if ($r->num_rows < 1) {
    header('location:team.php');
}
$rw = $r->fetch_assoc();
$initials = strtoupper(substr($rw['position'], 0, 1));
$o = explode(' ', $rw['position']);
$initials .=  strtoupper(substr($o[1], 0, 1));
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
            <img width="100%" src="./images/<?php echo $rw['portrait']; ?>" alt="">
        </div>
    </div>
    <div class="row player-profile" style="margin:0;">
        <div class="col l6 ">
            <div class="player-image staff" data-number="<?php echo $initials; ?>">
                <div class="number">

                </div>
            </div>
        </div>
        <div class="col l6 grey lighten-5">
            <div class="player-stat">
                <p style="font-size:30px;font-weight:bold">
                    <?php echo $rw['firstname'] . " " . $rw['lastname'] . " &Tab; &nbsp; &nbsp;" ?>
                </p>
                <table class="table highlight">
                    <tbody>
                        <tr>
                            <td>BirthDate</td>
                            <td><?php echo $rw['dob']; ?></td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td><?php echo $rw['nationality']; ?></td>
                        </tr>
                        <tr>
                            <td>Height/Weight</td>
                            <td><?php echo $rw['haw']; ?></td>
                        </tr>

                        <tr>
                            <td>Position</td>
                            <td><?php echo $rw['position']; ?></td>
                        </tr>
                        <!-- <tr>
                        <td>BirthDate</td>
                        <td>13, May 2001</td>
                    </tr> -->
                    </tbody>
                </table>

                <hr style="border-bottom:solid 1px lightgrey">

                <p class="detail" style="margin-bottom: 50px;">
                    <?php echo $rw['details'];
                    ?>

                </p>



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