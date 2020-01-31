<!-- mengambil dari template.blade.php dari folderlayout,, dan di yield -->



<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('chartjs/Chart.min.css')); ?>">
<script src="<?php echo e(asset('chartjs/Chart.min.js')); ?>"></script>


            <div class = "row">
                <div class="col-md-12">
                    <div class="box-header with-border">
                        //ini bagian header
                    </div>
                    <div class="box-body">
                    <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Produk</span>
                <span class="info-box-number"><?php echo e($produk); ?></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-list-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Agen</span>
                <span class="info-box-number"><?php echo e($agen); ?></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Penjualan</span>
                <span class="info-box-number"><?php echo e($transaksi); ?></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan</span>
                <span class="info-box-number">Rp. <?php echo number_format($pendapatan,0,',','.'); ?></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
            <!-- /.col -->
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                   Grafik Penjualan         
            </div>
            <div class="box-body">
                    <canvas id="myChart">

                    
                    </canvas>
            </div>
          </div>
        </div>
</div>
<script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($nama_produk); ?>,
          datasets: [{
            label: 'Grafik Penjualan',
            data: <?php echo json_encode($jumlah_penjualan); ?>,
            backgroundColor: 'rgba(9, 99,, 0.2)',
            borderColor: 'rgba(85,9,13,4)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\penjualan\resources\views/home.blade.php ENDPATH**/ ?>