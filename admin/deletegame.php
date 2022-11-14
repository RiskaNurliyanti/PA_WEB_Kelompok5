<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM game WHERE id_game='$id'");

    if($hapus){
        echo "<script>
        confirm('Apakah Anda Ingin Menghapus Data Game?');  
        alert('Data Terhapus!');
        document.location.href = 'index.php';
        </script>";
        }else {
            echo "<script>
            alert('Gagal Menghapus, Coba Lagi');
            document.location.href = 'index.php';
            </script>";
                
        }
       
    }

?>