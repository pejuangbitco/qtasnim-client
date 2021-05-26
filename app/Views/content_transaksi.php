<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
          <a href=<?= base_url("Transaction/create") ?> class="btn btn-success">Create Data</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal transaksi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 1;
                  foreach($data as $d) {
                    echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$d['Product']['name'].'</td>
                      <td>'.$d['quantity'].'</td>
                      <td>'.$d['Product']['productType'].'</td>
                      <td>'.$d['tanggal'].'</td>
                      <td><a href='.base_url("Transaction/edit/".$d['id']).' class="btn btn-warning">Edit</a> 
                       <a href='.base_url("Transaction/delete/".$d['id']).' class="btn btn-danger">Delete</a></td>
                      </tr>';
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