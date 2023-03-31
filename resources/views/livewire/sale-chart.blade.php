<!-- Chart's container -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Sales Chart</h5>
            <livewire:widget-stock-qty>
        </div>
        <div class="card-body d-flex justify-content-center" style="height:700px">
            <canvas id="saleChart" style="height:200px;"></canvas>
        </div>
    </div>
</div>

@push('after-script')
<script>
    var userData=<?php echo json_encode($userData)?>;
    var jan=<?php echo json_encode($jan)?>;
    var feb=<?php echo json_encode($feb)?>;
    var mar=<?php echo json_encode($mar)?>;
    var apr=<?php echo json_encode($apr)?>;
    var may=<?php echo json_encode($may)?>;
    var jun=<?php echo json_encode($jun)?>;
    var jul=<?php echo json_encode($jul)?>;
    var aug=<?php echo json_encode($aug)?>;
    var sep=<?php echo json_encode($sep)?>;
    var oct=<?php echo json_encode($oct)?>;
    var nov=<?php echo json_encode($nov)?>;
    var dec=<?php echo json_encode($dec)?>;
    const ctx = document.getElementById('saleChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: '2022',
          data: [jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec],
          borderWidth: 1
        },
        
    ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
@endpush
