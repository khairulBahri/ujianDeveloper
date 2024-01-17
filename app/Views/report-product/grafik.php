
<link rel="stylesheet" href="<?= base_url().'/plugins/chart.js/Chart.min.css' ?>">
 
 <script src="<?= base_url().'/plugins/chart.js/Chart.bundle.min.js' ?>"></script>


<canvas id="myChart" style="height: 50vh; width:80vh;"></canvas>


<?php
$ar = "";
$total = '';

foreach ($area as $dta) {

    $area_name = $dta->area_name;
    $ttl = $dta->total;

 
    $ar .= "'$area_name'" . ",";
    $total .= "'$ttl'" . ",";

};
?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx,{
        type: 'bar',
        responsive : true,
        data : {
            labels : [<?= $ar ?>],
            datasets : [{
                label : 'chart',
                backgroundColor : ['rgb(255,99,132)','rgb(122,91,142)'],
                borderColor : ['rgb(222,191,42)'],
                data : [<?= $total ?>]
            }]
        },
        duration : 1000
    })
</script>