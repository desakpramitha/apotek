<div class="container-fluid">
<div class="id">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <button class ="btn btn-sm btn-primary mr-auto my-2 my-md-0 mw-100" data-toggle = "modal" data-target="#tambah_pembeli"><i class ="fas fa-plus fa-sm"></i> Tambah Pembeli</button>


        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
         method ="post" action="<?php echo base_url().'pegawai/pembeli_controller/search'?>">
            
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
        <!-- Topbar Navbar -->
   
    <table class= "table table-striped">
        <tr>
            <th>NO</th>
            <th>ID Pembeli</th>
            <th>Nama pembeli</th>
            <th>Alamat</th>
            <th colspan ="3">Aksi</th>
        </tr>

        <?php 
        $no=1;
            foreach($pembeli as $pbl) : ?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $pbl->id_pembeli?></td>
                <td><?php echo $pbl->nama_pembeli?></td>
                <td><?php echo $pbl->alamat_pembeli?></td>
                
                <td><?php echo anchor ('pegawai/pembeli_controller/view_pembeli/'.$pbl->id_pembeli, 
                '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"><i></div>') ?></td>
                <td><?php echo anchor ('pegawai/pembeli_controller/edit/'.$pbl->id_pembeli, 
                '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"><i></div>') ?></td>
                <td><a href="<?= base_url(); ?>pegawai/pembeli_controller/delete_pembeli/<?= $pbl->id_pembeli ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini ?');"><i class="fas fa-trash"></i     ></a></td>
            
            </tr>
            <?php endforeach;?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_pembeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah pembeli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'pegawai/pembeli_controller/insert_pembeli';?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Nama pembeli<span style="color:red;">*</span></label>
                <input type="text" name="nama_pembeli" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Alamat<span style="color:red;">*</span></label>
                <input type="text" name="alamat_pembeli" class="form-control" required>
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