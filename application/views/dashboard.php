<div class ="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo base_url('/assets/img/banner1.jpg') ?>" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo base_url('/assets/img/banner.jpg') ?>" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    <div class = "row text-center mt-3 ">
        <?php foreach ($obat as $obt) : ?> 
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$obt->gambar?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $obt->nama_obat?></h5>
                    <small><?php echo $obt->manfaat?></small><br>
                    <span class="badge badge-danger mb-3">Rp. <?php echo $obt->harga_obat?></span><br>
                    <!-- ubah 
                        <a href="#" class="btn btn-sm btn-success">Beli</a> -->

                    <?php echo anchor('dashboard/beli/'. $obt->id_obat, '<div class ="btn btn-sm btn-success">Beli</div>') ?>
                    
                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>