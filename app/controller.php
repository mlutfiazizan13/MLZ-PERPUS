<?php 

class controller{

    //fungsi simpan 
    function simpan($con, $tabel, array $field, $redirect){
        $sql = "INSERT INTO $tabel SET ";
        //$sql-> insert into login set

        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
       
        $sql = rtrim($sql, ',');

        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Berhasil disimpan');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal tersimpan');document.location.href='$redirect'</script>";
        }
    }

    //fungsi tampil
    function tampil ($con, $tabel) {
        $sql ="SELECT * FROM $tabel";
        $jalan = mysqli_query($con,$sql);
        while($data = mysqli_fetch_assoc($jalan)) 
            $isi[] = $data;
            return @$isi;  
        
    }

    function hapus ($con, $tabel, $where, $redirect){
        $sql ="DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if ($jalan){
            echo "<script>alert('Data Berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Data Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }


    function edit ($con, $tabel,  $where) {
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan) ;
        return $tampung;
     }
     
    //fungsi ubah
     function ubah($con, $tabel, array $field, $where, $redirect){
        $sql = "UPDATE $tabel SET ";
        foreach($field as $key => $value){
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql.="WHERE $where";

        //$sql-> UPDATE login SET username='budi', password='123' WHERE id=1;

        $jalan = mysqli_query($con, $sql);

        if($jalan){
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }

}



?>