<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action=<?= base_url('Transaction/save/'.$data['id']) ?>>
            <div class="card-body">
              <div class="form-group">
                <label>Pilih Barang</label>
                <select required class="form-control" name="productId">                
                  <?php foreach($data_barang as $d) { ?>
                    <option <?php if($d['id'] == $data['productId']) echo 'selected'; ?> value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input value="<?= $data['quantity'] ?>" required name="quantity" type="number" class="form-control" placeholder="Enter jumlah barang">
              </div>
              <div class="form-group">
                <label>Tanggal transaksi</label>
                <input required value="<?= $data['tanggal'] ?>" name="tanggal" type="date" class="form-control" placeholder="Enter tanggal transaksi">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>