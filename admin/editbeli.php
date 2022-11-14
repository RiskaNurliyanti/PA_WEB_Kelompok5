



<?php
    require 'config.php';

                    
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM pembelian WHERE id_beli = '$id'");
        $row = mysqli_fetch_array($result);
        
    }

        
 
        
                
        if(isset($_POST['update'])){
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
        $kirim = mysqli_query($db, "UPDATE pembelian SET id_akun = '$id_akun', id_game='$id_game', nama='$nama',email='$email',nama_game='$nama_game', id_user='$id_user', server_id='$server_id', jenis_pilihan='$jenis_pilihan', pembayaran='$pembayaran', waktu='$waktu' Where id_beli='$id'");
      
        if($kirim){
            echo "<script>
            alert('Data Terkirim, Update Berhasil!');
            document.location.href = 'daftarbeli.php';
            </script>";
            
        }else {
            echo "<script>
            alert('Gagal Mengupdate Data, Coba Lagi');
            document.location.href = 'daftarbeli.php';
            </script>";
            
      }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title & Web Icon -->
    <title>G-Store: Top up Games</title>
    <link rel="shortcut icon" href="assets/logoIcon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- CSS & script -->
    <link rel="stylesheet" href="css/detail.css">
    <script src="script.js" defer></script>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php" >
                Game Form
            </a>
        </div>
        <div class="menu">
            <ul >
                <li><a href="index.php">Home</a></li>
                <li><a href="readC.php">Box Comment</a></li>
                <li><a href="daftarbeli.php">Daftar Beli</a></li>
                <li id="log1"><a href="profil.php">Profil</a></li>
                
            </ul>
            <div class="mode">
                <i onclick="myFunction()" class="bi bi-brightness-high-fill" id="toggleDark"></i>
            </div>
        </div>
        <div class="menu-toggle">
            <input id="cek" type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <section>
            
             
        <div class="caption">
            
                <img src="assets/logoIcon.png" alt="">
               
                
           
            
            <div>
                <h3>Top up</h3>
                <ol>
                    <li>Masukkan ID</li>
                    <li>Nominal top-up tidak bisa diubah</li>
                    <li>Pilih Metode pembayaran</li>
                    <li>Klik update & Lakukan Pembayaran</li>
                </ol>
            </div>
        </div>
        <div class="forms">
            <form method='post'>
                <div class="data">
                <h3><?php echo $row['nama_game'] ?></h3>
                        <br></br>
                <h3>Masukkan Data</h3>

                        
               

         

                    <?php 
                            require 'config.php';
                            $id = $_GET['id'];
                            $result=mysqli_query($db,"SELECT * FROM pembelian where id_beli=$id");
                            $row=mysqli_fetch_array($result)
                            ?>

                        <input name='nama' type="hidden" value = <?php echo $row['nama'] ?>>
                        <input name='email' type="hidden" value = <?php echo $row['email'] ?>>
                        <input name='id_game' type="hidden" value = <?php echo $row['id_game'] ?>>
                        <textarea style='display:none' name="nama_game" ><?php echo $row['nama_game'] ?></textarea>
                        <input name= 'id_akun' type="hidden" value = <?php echo $row['id_akun'] ?>>
                       
                        <br></br>
                        
                       

                        <label for="id">ID</label>
                        <input type="text" name="id_user" placeholder="Masukkan ID (Contoh: abcde#1234)"  value = <?php echo $row['id_user'] ?> >
                        <br></br>
                        <label for="server_id">Server ID</label>
                        <input type="text" name="server_id" placeholder="Masukkan Server ID (Contoh: abcde#1234)" id="server_id"  value = <?php echo $row['server_id'] ?>>
                </div>

             
                <div class="nominal">
                    <h3>Nominal Pembelian</h3>

                    <?php 
                                    require 'config.php';
                                    $id = $_GET['id'];
                                    $result=mysqli_query($db,"SELECT * FROM pembelian where id_beli=$id");
                                   
                                    $row=mysqli_fetch_array($result)
                                        
                                ?>

                    <div>
                            <label name='jenis'><?php echo $row['jenis_pilihan'] ?></label>
                            <textarea style='display:none' name="jenis" placeholder="Masukkan Jenis Top Up, contoh : 300 Points Rp 34.000"  ><?php echo $row['jenis_pilihan'] ?></textarea>
                        
                    </div>

           
                </div>
                <br>
                <div class="pembayaran">
                    <h3>Metode Pembayaran</h3>
                    
                            <div>
                            <input type="radio" id="E-Wallet" name="bayar" <?= $row['pembayaran'] == "E-Wallet" ? "checked" : "" ?>  value=E-Wallet>
                            <label for="E-Wallet">E-Wallet <i>(Dana, Gopay, OVO)</i></label>
                            </div>      
                        
                            <div>
                            <input type="radio" id="transfer" name="bayar"  <?= $row['pembayaran'] == "transfer" ? "checked" : "" ?>   value="transfer">
                            <label for="transfer">Bank Transfer <i>(BCA)</i></label>
                            </div>      

                            <div>
                            <input type="radio" id="virtual" name="bayar"  <?= $row['pembayaran'] == "virtual" ? "checked" : "" ?>   value="virtual">
                            <label for="virtual">Virtual Account <i>(Mandiri, BNI, BRI)</i></label>
                            </div> 
                            
                            <br>

                            <div>
                                <?php 
                                    require 'config.php';
                                    $id = $_GET['id'];
                                    $result=mysqli_query($db,"SELECT * FROM pembelian where id_beli=$id");
                                   
                                    $row=mysqli_fetch_array($result)
                                        
                                ?>
                                    <label for="waktu">Waktu Pemesanan</label>
                                    <input type="hidden" name="waktu" value=<?=$row['waktu']?>>
                                   
                                </div>
                       
                </div>
                
                <button method="post" class="order" name="update" type="submit" value="update">Update</button>
                     <!-- user -->
                   
                    <!-- user -->

                    
                    <!-- gambar-->

                  
                    <!-- gambar -->

                    
                
                
            </form>

        </div>
    </section>
</body>
</html>


