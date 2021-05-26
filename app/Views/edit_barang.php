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
          <form method="POST" action=<?= base_url('Product/save/'.$data['id']) ?>>
            <div class="card-body">
              <div class="form-group">
                <label>Nama Barang</label>
                <input required value="<?= $data['name'] ?>" name="name" type="text" class="form-control" placeholder="Enter nama barang">
              </div>
              <div class="form-group">
                <label>Stok Barang</label>
                <input required value="<?= $data['stock'] ?>" name="stock" type="number" class="form-control" placeholder="Enter stok barang">
              </div>
              <div class="form-group">
                <label>Jenis Barang</label>
                <input required value="<?= $data['productType'] ?>" name="productType" type="text" class="form-control" placeholder="Enter jenis barang">
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