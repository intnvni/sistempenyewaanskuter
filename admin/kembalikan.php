<?php
    $date1="2019-04-02";
    $date2="2019-04-04";
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
    $selisih = $difference->days;
	echo $selisih;
    ?>