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
$redirect = '?menu=lihat';
@$where = "id = $_GET[id]";


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

<div class="container-sm mt-5">
<table class="table table-bordered display">
    <thead>
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th class="col-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = $go->tampil($con, $tabel);

            if($data==""){
                echo "<tr><td colspan='5'>Tidak Ada Data</td></tr>";
            } else {

            foreach($data as $r){
        ?>
        <tr>
            <td><?php echo $r['id_buku'] ?></td>
            <td><?php echo $r['judul'] ?></td>
            <td><?php echo $r['pengarang'] ?></td>
            <td><?php echo $r['penerbit'] ?></td>
            <td><a class="btn btn-danger" href="?menu=lihat&hapus&id=<?php echo $r['id']?>" onclick="return confirm('Hapus Data?')"><i class="fas fa-trash-alt me-2"></i>HAPUS</a>  
                <a class="btn btn-warning" href="?menu=edit&edit&id=<?php echo $r['id']?>"><i class="fas fa-edit me-2"></i>EDIT</a></td>
        </tr>
            <?php } } ?>
    </tbody>
</table>
</div>

