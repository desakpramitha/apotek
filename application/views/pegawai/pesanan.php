<div class="container-fluid">
    <h4>Pesanan Obat</h4>
    <form action="<?php echo base_url()?>pegawai/transaksi_controller/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
        <table class ="table table-bordered table-striped table-hover">
            <tr>
                <th>NO</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th width="10%">Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>

            <?php
                $grand_total = 0;
                $no=1;
                foreach ($this->cart->contents() as $items) : ?>
                    <!-- $grand_total = $grand_total + $items['subtotal'];                 -->

                    <input type="hidden" name="cart[<?php echo $items['id'];?>][id]" value="<?php echo $items['id'];?>" />
                    <input type="hidden" name="cart[<?php echo $items['id'];?>][rowid]" value="<?php echo $items['rowid'];?>" />
                    <input type="hidden" name="cart[<?php echo $items['id'];?>][name]" value="<?php echo $items['name'];?>" />
                    <input type="hidden" name="cart[<?php echo $items['id'];?>][price]" value="<?php echo $items['price'];?>" />
                    <input type="hidden" name="cart[<?php echo $items['id'];?>][gambar]" value="<?php echo $items['gambar'];?>" />
                    <input type="hidden" name="cart[<?php echo $items['id'];?>][qty]" value="<?php echo $items['qty'];?>" />

                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="<?php echo base_url().'/uploads/'.$items['gambar']?>" width ="100px" height = "100px" alt="">
                        <td><?php echo $items['name']?></td>
                        <td><input type="text" class="form-control input-sm" name="cart[<?php echo $items['id'];?>][qty]" value="<?php echo $items['qty'];?>" /></td>
                        <td align ="right">Rp. <?php echo number_format($items['price'], 0,'.','.')?></td>
                        <td align ="right">Rp. <?php echo number_format($items['subtotal'], 0,'.','.')?></td>
                        <td><a href="<?php echo base_url()?>pegawai/transaksi_controller/delete/<?php echo $items['rowid'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>

                <?php endforeach; ?>
                
                <tr>
                    <td colspan = 7 align ="right">Rp. <?php echo number_format($this->cart->total(), 0,'.','.')?></td>
                </tr>
        </table>

        <div align="right">
            <button class='btn btn-sm btn-warning'  type="submit">Update Pesanan</button>
            <a data-toggle="modal" data-target="#hapus"><div class="btn btn-sm btn-danger">Hapus Semua Pesanan</div></a>
            <a href="<?php echo base_url('pegawai/transaksi_controller/index') ?>"><div class="btn btn-sm btn-primary">Belanja lagi</div></a>
            <a href="<?php echo base_url('pegawai/transaksi_controller/proses_pembayaran') ?>"><div class="btn btn-sm btn-success">Proses Pembayaran</div></a>
        </div>
    </form>
</div>

<!-- Modal Logout-->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="hapus">Konfirmasi Hapus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url().'pegawai/transaksi_controller/hapus_cart';?>" method="post" enctype="multipart/form-data">

                <p>Anda yakin ingin hapus semua pesanan obat ?</p>

        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
        </div>
     </div>
</div>
<!-- End Modal -->

