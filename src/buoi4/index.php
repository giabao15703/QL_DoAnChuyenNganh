<?php
    $nhom = [1,2,3,4,5];
    $nhom2 = array_rand($nhom,2);
    echo "Nhom 2:";
    foreach($nhom2 as $r)
    {
        echo "<br>".$nhom[$r];
    }