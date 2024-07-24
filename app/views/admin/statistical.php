<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống Kê</h1>
  </div>

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-4 mb-4">
      <div class="card border border-success border-2 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-4">Danh thu tuần này</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800">
                <?php echo !empty($totalWeekRevenue) ? Helper::formatCurrency($totalWeekRevenue['total']) : ''; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-4 mb-4 fs-4">
      <div class="card border border-info border-2 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-4">Danh thu tháng này</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo !empty($totalMonthRevenue) ? Helper::formatCurrency($totalMonthRevenue['total']) : ''; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-4 mb-4">
      <div class="card border border-primary border-2 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-4">Danh thu năm nay</div>
              <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo !empty($totalYearRevenue) ? Helper::formatCurrency($totalYearRevenue['total']) : ''; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title widget-card-title">Doanh thu các tháng trong năm nay</h5>
              </div>
            </div>
              <canvas id="revenueChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('revenueChart').getContext('2d');
    <?php // Convert the data to a format suitable for JavaScript
    $months = [];
    $revenues = [];
    foreach ($monthlyRevenue as $row) {
      $months[] = DateTime::createFromFormat('!m', $row['month'])->format('F'); // Convert month number to month name
      $revenues[] = $row['total_revenue'];
    }
    ?>
    var months = <?php echo json_encode($months); ?>;
    var revenues = <?php echo json_encode($revenues); ?>;

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: months,
        datasets: [{
          label: 'Doanh thu',
          data: revenues,
          borderColor: 'rgba(0, 123, 255, 1)',
          backgroundColor: 'rgba(0, 123, 255, 0.1)',
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function (value) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
              }
            }
          }
        },
        plugins: {
          tooltip: {
            callbacks: {
              label: function (context) {
                let value = context.raw;
                return 'Doanh thu: ' + new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
              }
            }
          }
        }
      }
    });
  });
</script>