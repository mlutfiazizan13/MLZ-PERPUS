<?php 
include "app/koneksi.php";
include "app/controller.php";

$go = new controller();

$tabel = 'tbl_buku';
@$field = array(
                'id_buku'=>$_POST['id_buku'],
                'judul'=>$_POST['judul'],
                'pengarang'=>$_POST['pengarang'],
                'penerbit'=>$_POST['penerbit']
);
$redirect = '?menu=tambah';

@$where = "id = $_GET[id]";

$query = mysqli_query($con, "SELECT max(id_buku) as maxId FROM tbl_buku");
$data = mysqli_fetch_array($query);
$idBuku = $data['maxId'];
$no = (int) substr($idBuku, 4, 4); 

$no++;

$huruf = "BK";
$newIdBuku = $huruf . sprintf("%05s", $no);



if(isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}

if(isset($_GET['hapus'])){
    $go->hapus($con, $tabel, $where, $redirect);
}

if(isset($_GET['edit'])){
    $edit = $go->edit($con, $tabel, $where);
}

if(isset($_POST['ubah'])){
    $go->ubah($con, $tabel, $field, $where, $redirect);
}


?>

<h3 class="text-center">Tambah Buku</h3>
<form action ="" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID BUKU</label>
    <input type="text" class="form-control" name="id_buku" value="<?php echo @$newIdBuku ?>" required readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Judul</label>
    <input type="text" class="form-control" name="judul" value="<?php echo @$edit['judul'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Pengarang</label>
    <input type="text" class="form-control" name="pengarang" value="<?php echo @$edit['pengarang'] ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Penerbit</label>
    <input type="text" class="form-control" name="penerbit" value="<?php echo @$edit['penerbit'] ?>" required>
  </div>
    <input type="submit" class="btn btn-primary" name="simpan" value="SIMPAN">
</form>