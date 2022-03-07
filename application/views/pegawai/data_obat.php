<div class="container-fluid">
    <div class="id">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Button Tambah Obat -->
        <button class ="btn btn-primary mr-auto my-2 my-md-0 mw-100" data-toggle = "modal" data-target="#tambah_obat"><i class ="fas fa-plus fa-sm"></i> Tambah Obat</button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
         method ="post" action="<?php echo base_url().'pegawai/obat_controller/search'?>">
            
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        
        </form>      
    </div>


    <!-- Tabel -->
    <div class="overflow-auto">
    <table class= "table table-striped">
        <tr>
            <th>NO</th>
            <th>Nama Obat</th>
            <th>Manfaat</th>
            <th>Kategori</th>
            <th>Konsumen</th>
            <th>Stock</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th colspan ="3">Aksi</th>
        </tr>

        <?php 
        $no=1;
            foreach($obat as $obt) : ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $obt->nama_obat?></td>
                <td><?= $obt->manfaat?></td>
                <td><?= $obt->kategori?></td>
                <td><?= $obt->konsumen?></td>
                <td><?= $obt->stock?></td>
                <td><?= number_format($obt->harga_obat, 0,'.','.')?></td>
                <td><img class="card-img-top" src="<?= base_url().'/uploads/'.$obt->gambar?>" alt="Card image cap"></td>
                
                <!-- Aksi -->
                <td><?php echo anchor('pegawai/obat_controller/view_obat/'. $obt->id_obat,
                '<div class="btn btn-success"><i class="fas fa-search-plus"><i></div>') ?></td>
                <td><?php echo anchor('pegawai/obat_controller/edit/'.$obt->id_obat, 
                '<div class="btn btn-primary"><i class="fas fa-edit"><i></div>') ?></td>
                <td><a href="<?= base_url(); ?>pegawai/obat_controller/delete_obat/<?= $obt->id_obat; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini ?');"><i class="fas fa-trash"></i     ></a></td>
            </tr>
            <?php endforeach;?>
    </table>
    </div>
</div>


<!-- Modal Tambah-->
<div class="modal fade" id="tambah_obat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('/pegawai/obat_controller/insert_obat');?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Nama Obat<span style="color:red;">*</span></label>
                <input type="text" name="nama_obat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Manfaat<span style="color:red;">*</span></label>
                <input type="text" name="manfaat" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="">Kategori<span style="color:red;">*</span></label>
			    <select class="form-control" name="kategori" class="form-control" required>
                    <option value="">- Pilih Kategori -</option>
                    <option name="kategori" value="Tablet">Tablet</option>
                    <option name="kategori" value="Kapsul">Kapsul</option>
                    <option name="kategori" alue="Sirup">Sirup</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Konsumen<span style="color:red;">*</span></label>
			    <select class="form-control" name="konsumen" class="form-control" required>
                    <option value="">- Pilih Konsumen -</option>
                    <option name="konsumen" value="Anak">Anak-anak</option>
                    <option name="konsumen" value="Dewasa">Dewasa</option>
                    <option name="konsumen" value="Semua Umur">Semua Umur</option>
                </select>
            </div>


            <div class="form-group">
                <label for="">Stock<span style="color:red;">*</span></label>
			          <input type="number" name="stock" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Harga<span style="color:red;">*</span></label>
			          <input type="text" name="harga_obat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Gambar Obat<span style="color:red;">*</span></label>
                <input type="file" name="gambar" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">ID Supplier<span style="color:red;">*</span></label>
                <select class="form-control" required name="id_supplier" value="<?php echo $id_supplier->id_supplier;?>">
                    <option value="">- Pilih ID Supplier -</option>
                    <?php foreach($id_supplier as $supl) : ?>
						          <option value="<?php echo $supl->id_supplier?>"><?php echo $supl->id_supplier?> | <?php echo $supl->nama_supplier?></option>
                    <?php endforeach?>
                </select>
                   <!-- <small class="form-text text-danger"><?php echo form_error('id_supplier');?></small>
                        --> 
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

