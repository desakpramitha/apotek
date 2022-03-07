<div class="container-fluid">
    <div class="mb-4">
        <h3><i class ="fas fa-edit"></i>EDIT DATA SUPPLIER</h3>
    </div>
    
    <?php foreach ($supplier as $sup) : ?>
        <form method ="post" action="<?php echo base_url().'pegawai/supplier_controller/update'?>">
            
            <div class="form-group">
                <label for="">Nama Supplier<span style="color:red;">*</span></label>
                <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $sup->id_supplier; ?>" >
                <input type="text" name="nama_supplier" class="form-control" value="<?php echo $sup->nama_supplier; ?>" >
            </div>

            <div class="form-group">
                <label for="">Alamat<span style="color:red;">*</span></label>
                <input type="text" name="alamat" value ="<?php echo $sup->alamat ?>" class="form-control">
            </div>
            
            <div class="mt-4 mb-2">
                <button type ="submit" class="btn btn-primary bt-sm">Simpan</button>
                <?php echo anchor('pegawai/supplier_controller/', '<div class ="btn btn-danger">Go Back</div>') ?>
            </div>
            
        </form>
    <?php endforeach; ?>

</div>