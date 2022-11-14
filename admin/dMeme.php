<?php 

require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM meme WHERE id='$id'");

    if($hapus){
       
            echo "<script>
            confirm('Apakah Anda Ingin Menghapus Meme Ini?');  
            alert('Data Terhapus!');
            document.location.href = 'meme.php';
            </script>";
            
      
        }else {
            echo "<script>
            alert('Gagal Menghapus, Coba Lagi');
            document.location.href = 'meme.php';
            </script>";
                
        }
       
    }

?>