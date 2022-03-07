<div class="container-fluid">
    <div class="mb-4">
        <h3><i class ="fas fa-edit"></i>EDIT DATA OBAT</h3>
    </div>

    <?php foreach ($obat as $obt) : ?>
        <form method ="post" action="<?php echo base_url().'pegawai/obat_controller/update'?>">
            
            <div class="form-group">
                <label for="">Nama Obat<span style="color:red;">*</span></label>
                <input type="hidden" name="id_obat" class="form-control" value= "<?php echo $obt->id_obat ?>" >
                <input type="text" name="nama_obat" class="form-control" value= "<?php echo $obt->nama_obat ?>" >
            </div>

            <div class="form-group">
                <label for="">Manfaat<span style="color:red;">*</span></label>
                <input type="text" name="manfaat" value ="<?php echo $obt->manfaat ?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Kategori<span style="color:red;">*</span></label>
			    <select class="form-control" name="kategori" value="<?php echo $obt->kategori ?>" class="form-control">
                    <option value ="<?php echo $obt->kategori ?>" disabled><?php echo $obt->kategori ?></option>
                    <option name="kategori" value="Tablet">Tablet</option>
                    <option name="kategori" value="Kapsul">Kapsul</option>
                    <option name="kategori" alue="Sirup">Sirup</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Konsumen<span style="color:red;">*</span></label>
			    <select class="form-control" name="konsumen"  class="form-control">
                    <option value ="<?php echo $obt->konsumen ?>"><?php echo $obt->konsumen ?></option>
                    <option name="konsumen" value="Anak-anak">Anak-anak</option>
                    <option name="konsumen" value="Dewasa">Dewasa</option>
                    <option name="konsumen" value="Semua Umur">Semua Umur</option>
                </select>
            </div>


            <div class="form-group">
                <label for="">Stock<span style="color:red;">*</span></label>
			    <input type="number" name="stock" value ="<?php echo $obt->stock?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Harga<span style="color:red;">*</span></label>
			    <input type="text" name="harga_obat" value ="<?php echo $obt->harga_obat?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Gambar Obat<span style="color:red; max-width:200px;">*</span></label><br>
                <img style="max-width:200px;" src="<?php echo base_url().'/uploads/'.$obt->gambar?>" alt="">
                <!-- <input type="file" name="gambar" value ="<?php echo base_url().'/uploads/'.$obt->gambar?>" class="form-control"> -->
            </div>

            <div class="form-group">
                <label for="">ID Supplier<span style="color:red;">*</span></label>
                <select class="form-control" name="id_supplier" value="<?php echo $id_supplier->id_supplier;?>">
                    <option value="<?php echo $obt->id_supplier ?>">- <?php echo $obt->id_supplier ?> -</option>
                    <?php foreach($id_supplier as $supl) : ?>
						<option value="<?php echo $supl->id_supplier?>"><?php echo $supl->id_supplier?> | <?php echo $supl->nama_supplier?></option>
                    <?php endforeach?>
                </select>
            </div>

            <div class="mt-4 mb-2">
                <button type ="submit" class="btn btn-primary bt-sm">Simpan</button>
                <?php echo anchor('pegawai/obat_controller/', '<div class ="btn btn-danger">Go Back</div>') ?>
            </div>
        </form>
    <?php endforeach ?>

</div>