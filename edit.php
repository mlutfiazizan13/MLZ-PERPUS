<?php 
include "app/koneksi.php";
include "app/controller.php";

$go = new Controller();

$tabel = 'tbl_buku';
@$field = array('id_buku'=>$_POST['id_buku'],
                'judul'=>$_POST['judul'],
                'pengarang'=>$_POST['pengarang'],
                'penerbit'=>$_POST['penerbit']
); 
$redirect = '?menu=lihat';
@$where = "id = $_GET[id]";


if(isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}

if(isset($_GET['edit'])){
    $edit = $go->edit($con, $tabel, $where);
}

if(isset($_POST['ubah'])){
    $go->ubah($con, $tabel, $field, $where, $redirect);
}




?>


<h3 class="text-center">Edit Buku</h3>
<form action ="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID BUKU</label>
    <input type="text" class="form-control" name="id_buku" value="<?php echo @$edit['id_buku'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Judul</label>
    <input type="judul" class="form-control" name="judul" value="<?php echo @$edit['judul'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Pengarang</label>
    <input type="text" class="form-control" name="pengarang" value="<?php echo @$edit['pengarang'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Penerbit</label>
    <input type="text" class="form-control" name="penerbit" value="<?php echo @$edit['penerbit'] ?>" required>
  </div>
  <button type="submit" name="ubah" class="btn btn-primary">UBAH</button>
</form>