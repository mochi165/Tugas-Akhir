    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
        </div>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center px-3">
                            <?php 
                                $kec = $s -> select ("datakecamatan");
                                $count1 = $s -> qRows($kec)
                            ?>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Kecamatan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center px-3">
                            <?php 
                                $ben = $s -> select ("databencana");
                                $count2 = $s -> qRows($ben)
                            ?>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Bencana</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center px-3">
                            <?php 
                                $ttk = $s -> select ("dataevakuasi");
                                $count3 = $s -> qRows($ttk)
                            ?>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Titik Evakuasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marked fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center px-3">
                            <?php 
                                $totalRugi = 0;
                                $bencana = $s -> select ("databencana");
                                while ($count4 = $s -> arr($bencana)) {
                                    $sa = $count4['totalRugi'];
                                $totalRugi += $sa;
                            }
                            ?>
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Kerugian</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php  echo number_format($totalRugi, 0, ',', '.').",00" ; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-7">
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl col-lg">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Bencana perBulan</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                    <!-- <canvas  id="chartjs_line"></canvas> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-lg">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Kerugian perBulan</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChartRugi"></canvas>
                                    <!-- <canvas  id="chartjs_line"></canvas> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-lg">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Bencana PerKecamatan</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-3 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Lokasi Perkecamatan</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <?php
                                $wa = $s -> select("datakecamatan");
                                while($dat=$s -> arr($wa)){
                            ?>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: <?php echo $dat['warnaKecamatan']; ?>;"></i> <?php echo $dat['namaKecamatan']; ?>
                            </span>
                        <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Total Bencana Perbulan -->
<script type="text/javascript">
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
<?php 
    $sql = $s -> query("SELECT *, COUNT(*) AS total FROM databencana GROUP BY year(waktu), month(waktu)");
    // SELECT *, COUNT( * ) AS total FROM comment GROUP BY post_id
    while($row=$s -> arr($sql)){
        $month[] =date('M-Y', strtotime($row['waktu']));
        $rugi[] = $row['total'];
    } 

?>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($month); ?>,
    datasets: [{
      label: "Jumlan Bencana",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($rugi); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 1,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " : " + tooltipItem.yLabel;
        }
      }
    }
  }
});
</script>

<!-- Jumlah Lokasi Per Kecamatan-->
<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

<?php 
    $sqli = $s -> query("SELECT *, COUNT(*) AS total FROM dataevakuasi INNER JOIN datakecamatan on datakecamatan.kodeKecamatan=dataevakuasi.kodeKecamatan GROUP BY namaKecamatan");
    // SELECT *, COUNT( * ) AS total FROM comment GROUP BY post_id
    while($rowi=$s -> arr($sqli)){
        $monthi[] =$rowi['namaKecamatan'];
        $rugii[] = $rowi['total'];
        $co[]=$rowi['warnaKecamatan'];
    } 
?>

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($monthi) ?>,
    datasets: [{
      data: <?php echo json_encode($rugii) ?>,
      backgroundColor: <?php echo json_encode($co) ?>,
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<!-- Jumlah Bencana Perkecamatan -->
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
<?php 
    $sqle = $s -> query("SELECT *, COUNT(*) AS total FROM databencana INNER JOIN datakecamatan on datakecamatan.kodeKecamatan=databencana.kodeKecamatan GROUP BY namaKecamatan");
    // SELECT *, COUNT( * ) AS total FROM comment GROUP BY post_id
    while($rowe=$s -> arr($sqle)){
        $monthe[] = $rowe['namaKecamatan'];
        $rugie[] = $rowe['total'];
        $q[]=$rowe['warnaKecamatan'];
    } 

?>
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($monthe); ?>,
    datasets: [{
      label: "Total Bencana",
      backgroundColor: <?php echo json_encode($q); ?>,
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($rugie); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 10
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' : ' + tooltipItem.yLabel;
        }
      }
    },
  }
});

</script>


<!-- Total Rugi Perbulan -->
<script type="text/javascript">
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

<?php
    $sqlu = $s -> query("SELECT waktu, SUM(totalRugi) AS totala FROM databencana  GROUP BY year(waktu), month(waktu)");
    while($rowu=$s -> arr($sqlu)){
        $monthu[] =date('M-Y', strtotime($rowu['waktu']));
        $rugiu[]=$rowu['totala'];
    } 
?>
// Area Chart Example
var ctx = document.getElementById("myAreaChartRugi");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($monthu); ?>,
    datasets: [{
      label: "Total Kerugian ",
      lineTension: 0.4,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($rugiu); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 10,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + "Rp. " + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>