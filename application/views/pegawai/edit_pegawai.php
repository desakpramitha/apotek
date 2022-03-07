<div class="container-fluid">
    <div class="mb-4">
        <h3><i class ="fas fa-edit"></i>EDIT DATA PEGAWAI</h3>
    </div>

    <?php foreach ($pegawai as $pgw) : ?>
        <form method ="post" action="<?php echo base_url().'pegawai/pegawai_controller/update'?>">
            
            <div class="form-group">
                <label for="">Nama Pegawai<span style="color:red;">*</span></label>
                <input type="hidden" name="id_pegawai" class="form-control" value= "<?php echo $pgw->id_pegawai ?>" >
                <input type="text" name="nama_pegawai" class="form-control" value= "<?php echo $pgw->nama_pegawai ?>" >
            </div>

            <div class="form-group">
                <label for="">Email<span style="color:red;">*</span></label>
                <input type="text" name="email" value ="<?php echo $pgw->email ?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Username<span style="color:red;">*</span></label>
			    <input type="text" name="username" value ="<?php echo $pgw->username?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Password<span style="color:red;">*</span></label>
			    <input type="password" name="password" value ="" placeholder ="Masukan Password" class="form-control">
            </div>

            <!-- <div class="form-group">
                <label for="">Foto Profil<span style="color:red;">*</span></label><br>
                <img src="<?php echo base_url().'/uploads/'.$pgw->foto?>" alt="">
                <input type="file" name="foto" value ="<?php echo base_url().'/uploads/'.$pgw->foto?>" class="form-control">
            </div> -->

            <div class="mt-4 mb-2">
                <button type ="submit" class="btn btn-primary bt-sm">Simpan</button>
                <?php echo anchor('pegawai/pegawai_controller/', '<div class ="btn btn-danger">Go Back</div>') ?>
            </div>
        </form>
    <?php endforeach ?>

</div>