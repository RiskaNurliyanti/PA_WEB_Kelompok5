<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}
?>


<?php
    require 'config.php';

                    
    
   
    $id = $_GET['id'];
    $gambar=mysqli_query($db,"SELECT * FROM game where id_game=$id");
    
        
 
                
                
        if(isset($_POST['pesan'])){
        $id_game = $_POST['id_game'];
        $id_akun = $_POST['id_akun'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nama_game = $_POST['nama_game'];
        $id_user = $_POST['id_user'];
        $server_id = $_POST['server_id'];
        $jenis_pilihan = $_POST['jenis'];
        $pembayaran = $_POST['bayar'];
        $waktu = $_POST['waktu'];
        


        //$kirim = mysqli_query($db, "INSERT INTO aaa (id_user, server_id, jenis_pilihan,pembayaran) VALUES ('$id_user','$server_id', '$jenis_pilihan', '$pembayaran')");
        $kirim = mysqli_query($db, "INSERT INTO pembelian (id_akun, id_game, nama,email,nama_game, id_user, server_id, jenis_pilihan, pembayaran, waktu) VALUES ('$id_akun','$id_game','$nama','$email','$nama_game','$id_user','$server_id', '$jenis_pilihan', '$pembayaran', '$waktu')");
      
        if($kirim){
            echo "<script>
            alert('Data Terkirim, Pembelian Berhasil!');
            document.location.href = 'daftarbeli.php';
            </script>";
            
        }else {
            echo "<script>
            alert('Gagal Membeli, Coba Lagi!');
            document.location.href = 'index.php';
            </script>";
            
    }
}

?>



