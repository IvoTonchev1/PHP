<?php
    $startDate = new DateTime('01-04-2015');
    $endDate = new DateTime('30-04-2015');

    while ($startDate <= $endDate) {
        $dateString =$startDate->format('d-m-Y') . "\n";
        $dayOfWeek = date('N', strtotime($dateString));
        if ($dayOfWeek == '7') {
            echo date_format($startDate, 'jS F, Y');
            echo "\n";
        }
        $startDate->add(new DateInterval('P1D'));
    }
?>
