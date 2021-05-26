<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
          Bandingkan jenis barang Dari: <form method="get" action="<?= base_url('Home/filter') ?>"><input class="form-control" type="date" name="from"> Sampai: <input class="form-control" type="date" name="to"> <button type="submit" class="btn btn-primary">Submit</button></form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Jumlah Terjual</th>
                  <th>Tanggal Transaksi</th>
                  <th>Jenis Barang</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                  foreach($data as $d) {
                    $d['sold'] = $d['sold'] ? $d['sold'] : 0;
                    $d['tanggal'] = $d['tanggal'] ? $d['tanggal'] : "-";
                    echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$d['name'].'</td>
                      <td>'.$d['stock'].'</td>
                      <td>'.$d['sold'].'</td>
                      <td>'.$d['tanggal'].'</td>
                      <td>'.$d['productType'].'</td>';
                      
                    $i++;
                  }
                ?>
              </tbody>
              <!-- <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Jenis Barang</th>
                  <th>Aksi</th>
                </tr>
              </tfoot> -->
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>