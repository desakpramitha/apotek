<div class="container-fluid">
    <div class="mb-4">
        <h3><i class ="fas fa-edit"></i>EDIT DATA PEMBELI</h3>
    </div>
    
    <?php foreach ($pembeli as $pbl) : ?>
        <form method ="post" action="<?php echo base_url().'pegawai/pembeli_controller/update'?>">
            
            <div class="form-group">
                <label for="">Nama Pembeli<span style="color:red;">*</span></label>
                <input type="hidden" name="id_pembeli" class="form-control" value= "<?php echo $pbl->id_pembeli ?>" >
                <input type="text" name="nama_pembeli" class="form-control" value= "<?php echo $pbl->nama_pembeli ?>" >
            </div>

            <div class="form-group">
                <label for="">Alamat<span style="color:red;">*</span></label>
                <input type="text" name="alamat_pembeli" value ="<?php echo $pbl->alamat_pembeli ?>" class="form-control">
            </div>
            
            <div class="mt-4 mb-2">
                <button type ="submit" class="btn btn-primary bt-sm">Simpan</button>
                <?php echo anchor('pegawai/pembeli_controller/', '<div class ="btn btn-danger">Go Back</div>') ?>
            </div>
        </form>
    <?php endforeach; ?>

</div>