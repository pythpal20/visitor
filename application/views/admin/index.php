<?php
$dt = [];
$label = [];

$dt2 = [];
$dt3 = [];
$dt4 = [];

foreach($grafik_dua AS $rw) {
    array_push($dt2, $rw['count_visitors']);
}
foreach($grafik_tiga AS $rws) {
    array_push($dt3, $rws['count_visitors']);
}
foreach($grafik_emp AS $rwt) {
    array_push($dt4, $rwt['count_visitors']);
}

foreach ($grafik_satu as $row) {
    array_push($dt, $row['count_visitors']);
    array_push($label, $row['month_name']);
}
$labela = "'" . implode("','", $label) . "'";
$datata = implode(",", $dt);

$datadu = implode(",", $dt2);
$datati = implode(",", $dt3);
$datapa = implode(",", $dt4);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title; ?></h2>
    </div>
</div>
<!-- content dibawah ini  -->
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    Joongla x Mr Kitchen
                </div>
                <div class="ibox-content">
                    <h3><?= $joongla; ?></h3> Total Pengunjung
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    Showroom 75
                </div>
                <div class="ibox-content">
                    <h3><?= $sho75 ?></h3>Total Pengunjung
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    Showroom 118
                </div>
                <div class="ibox-content">
                    <h3><?= $sho118 ?></h3>Total Pengunjung
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    Website Mr.Kitchen
                </div>
                <div class="ibox-content">
                    <h3><?= $wbsite ?></h3>Total Pengunjung
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Grafik Pengunjung
                        <small>Tahun <?= date('Y'); ?></small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="">
                        <canvas class="flot-chart-content" id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            const ctx = document.getElementById('myAreaChart').getContext('2d');
            const myAreaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?= $labela; ?>],
                    datasets: [{
                        label: 'Showroom 75',
                        data: [<?= $datata; ?>],
                        fill: false,
                        borderColor: 'rgb(0, 0, 255)',
                        tension: 0.1
                    }, {
                        label: 'Showroom 118',
                        data: [<?= $datadu; ?>],
                        fill: false,
                        borderColor: 'rgb(255, 0, 0)',
                        tension: 0.1
                    }, {
                        label: 'Joongla X Mr Kitchen',
                        data: [<?= $datati; ?>],
                        fill: false,
                        borderColor: 'rgb(255, 215, 0)',
                        tension: 0.1
                    }, {
                        label: 'Website',
                        data: [<?= $datapa; ?>],
                        fill: false,
                        borderColor: 'rgb(255, 140, 0)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    })
</script>