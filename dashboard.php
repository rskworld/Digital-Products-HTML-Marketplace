<?php
  /*
  Support / Licensing / Custom Dev: help@rskworld.in
  Phone/WhatsApp: +91 9330539277
  Website: rskworld.in
  Business Inquiries: help@rskworld.in
  🤝 Suggestions and improvements are welcome!
  */
  $pageTitle = 'Dashboard';
  include __DIR__ . '/includes/header.php';
?>
<main class="container my-4" data-aos="fade-up">
  <h1 class="h3 mb-4">Sales Analytics Dashboard</h1>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card tilt shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Total Sales</div>
          <div class="h3">1,284</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card tilt shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Revenue</div>
          <div class="h3">$24,670</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card tilt shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Conversion</div>
          <div class="h3">4.2%</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mt-1">
    <div class="col-lg-6">
      <div class="card shadow-sm" data-aos="fade-up">
        <div class="card-body">
          <h2 class="h6">Sales (Last 7 days)</h2>
          <canvas id="chartSales" height="140"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
          <h2 class="h6">Revenue by Day</h2>
          <canvas id="chartRevenue" height="140"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm" data-aos="fade-up" data-aos-delay="150">
        <div class="card-body">
          <h2 class="h6">Sales by Category</h2>
          <canvas id="chartCategory" height="180"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm tilt" data-aos="fade-up">
        <div class="card-body">
          <h2 class="h6">Sales by Category (7 days)</h2>
          <canvas id="chartStacked" height="160"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm tilt" data-aos="fade-up" data-aos-delay="80">
        <div class="card-body">
          <h2 class="h6">KPI Radar</h2>
          <canvas id="chartRadar" height="160"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card shadow-sm tilt" data-aos="fade-up" data-aos-delay="120">
        <div class="card-body">
          <h2 class="h6">Traffic vs Conversion</h2>
          <canvas id="chartBubble" height="140"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <h2 class="h6">Recent Orders</h2>
      <div class="table-responsive">
        <table class="table table-sm align-middle">
          <thead>
            <tr>
              <th>Order</th>
              <th>Customer</th>
              <th>Product</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 1; $i <= 6; $i++): ?>
              <tr>
                <td>#10<?php echo 20+$i; ?></td>
                <td>Buyer <?php echo $i; ?></td>
                <td>Digital Asset #<?php echo $i; ?></td>
                <td>$19</td>
                <td><span class="badge bg-success">Paid</span></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.Chart) {
      const textColor = getComputedStyle(document.body).color;
      const gridColor = 'rgba(0,0,0,0.08)';
      const ctxSales = document.getElementById('chartSales');
      if (ctxSales) new Chart(ctxSales, {
        type: 'line',
        data: {
          labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
          datasets: [{
            label: 'Sales',
            data: [120, 190, 150, 210, 180, 230, 260],
            fill: true,
            tension: .35,
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,.15)',
            pointRadius: 3,
          }]
        },
        options: {
          plugins: { legend: { display: false } },
          scales: {
            x: { ticks: { color: textColor }, grid: { color: gridColor } },
            y: { ticks: { color: textColor }, grid: { color: gridColor } }
          }
        }
      });

      const ctxRevenue = document.getElementById('chartRevenue');
      if (ctxRevenue) new Chart(ctxRevenue, {
        type: 'bar',
        data: {
          labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
          datasets: [{
            label: 'Revenue',
            data: [420, 690, 530, 800, 760, 920, 1040],
            backgroundColor: 'rgba(13,110,253,.7)'
          }]
        },
        options: {
          plugins: { legend: { display: false } },
          scales: {
            x: { ticks: { color: textColor }, grid: { display: false } },
            y: { ticks: { color: textColor }, grid: { color: gridColor } }
          }
        }
      });

      const ctxCategory = document.getElementById('chartCategory');
      if (ctxCategory) new Chart(ctxCategory, {
        type: 'doughnut',
        data: {
          labels: ['Ebooks', 'Courses', 'Software'],
          datasets: [{
            data: [34, 41, 25],
            backgroundColor: ['#93c5fd','#fbbf24','#86efac'],
            borderWidth: 0
          }]
        },
        options: {
          cutout: '60%',
          plugins: { legend: { position: 'bottom', labels: { color: textColor } } }
        }
      });

      // Stacked sales by category across 7 days
      const ctxStacked = document.getElementById('chartStacked');
      if (ctxStacked) new Chart(ctxStacked, {
        type: 'bar',
        data: {
          labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
          datasets: [
            { label: 'Ebooks', data: [12,16,14,18,17,19,22], backgroundColor: '#93c5fd' },
            { label: 'Courses', data: [15,18,17,19,20,22,24], backgroundColor: '#fbbf24' },
            { label: 'Software', data: [8,10,9,12,11,14,16], backgroundColor: '#86efac' }
          ]
        },
        options: {
          plugins: { legend: { position: 'bottom', labels: { color: textColor } } },
          responsive: true,
          scales: {
            x: { stacked: true, ticks: { color: textColor }, grid: { display: false } },
            y: { stacked: true, ticks: { color: textColor }, grid: { color: gridColor } }
          }
        }
      });

      // KPI Radar
      const ctxRadar = document.getElementById('chartRadar');
      if (ctxRadar) new Chart(ctxRadar, {
        type: 'radar',
        data: {
          labels: ['Traffic','Conversion','Retention','AOV','Refunds','NPS'],
          datasets: [{
            label: 'This Week',
            data: [80, 70, 65, 60, 30, 75],
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,.15)'
          }]
        },
        options: {
          plugins: { legend: { position: 'bottom', labels: { color: textColor } } },
          scales: {
            r: {
              angleLines: { color: gridColor },
              grid: { color: gridColor },
              pointLabels: { color: textColor },
              ticks: { display: false }
            }
          }
        }
      });

      // Traffic vs Conversion (Bubble)
      const ctxBubble = document.getElementById('chartBubble');
      if (ctxBubble) new Chart(ctxBubble, {
        type: 'bubble',
        data: {
          datasets: [
            { label: 'Ebooks', data: [{x: 1200, y: 2.8, r: 8},{x: 1600, y: 3.1, r: 10},{x: 1800, y: 3.4, r: 12}], backgroundColor: 'rgba(147,197,253,.7)' },
            { label: 'Courses', data: [{x: 1400, y: 3.6, r: 10},{x: 1900, y: 3.8, r: 12},{x: 2200, y: 4.1, r: 14}], backgroundColor: 'rgba(251,191,36,.7)' },
            { label: 'Software', data: [{x: 900, y: 2.9, r: 9},{x: 1300, y: 3.2, r: 11},{x: 1500, y: 3.5, r: 12}], backgroundColor: 'rgba(134,239,172,.7)' }
          ]
        },
        options: {
          plugins: { legend: { position: 'bottom', labels: { color: textColor } } },
          scales: {
            x: { title: { display: true, text: 'Traffic', color: textColor }, ticks: { color: textColor }, grid: { color: gridColor } },
            y: { title: { display: true, text: 'Conversion %', color: textColor }, ticks: { color: textColor }, grid: { color: gridColor } }
          }
        }
      });
    }
  });
</script>


