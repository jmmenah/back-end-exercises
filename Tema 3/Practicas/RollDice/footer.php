<footer>
    <p>&copy;
        <?php
        $startYear = 2020;
        $thisYear = date('Y');
        if ($startYear == $thisYear) {
            echo $startYear;
        } else {
            echo "{$startYear}&ndash;{$thisYear}";
        }
        ?>
        Juan Manuel Mena</p>
</footer>
