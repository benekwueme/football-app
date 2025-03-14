<?php
include 'inc/func-lib.php';

if (isset($_GET['players'])) {
    $q = 'select * from players';
    $r = $db->query($q);
    $data = "";
    while ($row = $r->fetch_assoc()) {
        $data = $data . " <a class='col l4' href='player-data.php?firstname={$row['firstname']}&lastname={$row['lastname']}'>
        <div class=' player-data hide-on-med-and-down'>
            <img src='./images/{$row['portrait']}' >
            <div class='player-number'>{$row['number']}</div>
            <div class='player-role'>{$row['role']}</div>
            <div class='player-name'>{$row['firstname']} {$row['lastname']}</div>
            <div class='player-link'>PLAYER PROFILE</div>
        </div>
        <div class=' player-data-mini hide-on-large-only'>
            
            <div>
                <div class='player-number'>{$row['number']}</div>
                <div class='player-name'>{$row['firstname']} {$row['lastname']}</div>
                 <div class='player-role'>{$row['role']}</div>
            </div>

            <img src='./images/{$row['portrait']}' >
        </div>
    </a>";
    };
    echo $data;
}


if (isset($_GET['staff'])) {
    $q = 'select * from staff';
    $r = $db->query($q);
    $data = "";
    while ($row = $r->fetch_assoc()) {
        $initials = strtoupper(substr($row['position'], 0, 1));
        $o = explode(' ', $row['position']);
        $initials .=  strtoupper(substr($o[1], 0, 1));

        $data = $data . " <a class='col l4' href='staff-data.php?firstname={$row['firstname']}&lastname={$row['lastname']}'>
        <div class=' player-data hide-on-med-and-down'>
            <img src='./images/{$row['portrait']}' >
            <div class='player-number'>{$initials}</div>
            <div class='player-role'>{$row['position']}</div>
            <div class='player-name'>{$row['firstname']} {$row['lastname']}</div>
            <div class='player-link'>STAFF PROFILE</div>
        </div>
        <div class=' player-data-mini hide-on-large-only'>
            
            <div>
                <div class='player-number'>{$initials}</div>
                <div class='player-name'>{$row['firstname']} {$row['lastname']}</div>
                <div class='player-role'>{$row['position']}</div>
            </div>

            <img src='./images/{$row['portrait']}' >
            
         
        </div>
    </a>";
    };
    echo $data;
}