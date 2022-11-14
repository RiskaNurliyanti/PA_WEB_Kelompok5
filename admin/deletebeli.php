<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM pembelian WHERE id_beli='$id'");

    if($hapus){
       
            echo "<script>
            confirm('Apakah Anda Ingin Menghapus Daftar Beli?');  
            alert('Data Terhapus!');
            document.location.href = 'daftarbeli.php';
            </script>";
            
      
        }else {
            echo "<script>
            alert('Gagal Menghapus, Coba Lagi');
            document.location.href = 'daftarbeli.php';
            </script>";
                
        }
       
    }

?>