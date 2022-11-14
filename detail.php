<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>
    document.location.href = 'login.php';
    </script>";
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
            <?php 
                require 'config.php';
                $id = $_GET['id_game'];
                $gambar=mysqli_query($db,"SELECT * FROM game where id_game=$id");
                if(mysqli_num_rows($gambar)>0){
                    while($row=mysqli_fetch_array($gambar)){
                    
            ?>
             
        <div class="caption">
            
                <img src="admin/gambar/<?php echo $row['gambar']?>" alt="">
               
                
           
            
            <div>
                <h3>Top up</h3>
                <ol>
                    <li>Masukkan ID</li>
                    <li>Pilih Nominal top-up</li>
                    <li>Pilih Metode pembayaran</li>
                    <li>Klik Order Now & Lakukan Pembayaran</li>
                </ol>
            </div>
        </div>
        <div class="forms">

            <form method = "post"  action="tambah.php?id=<?php echo $row['id_game'] ?>" >
                <div class="data">
                        
               

                    
                <?php

                    $akun= $_SESSION['user']['id'];
                    $query = mysqli_query($db, "SELECT * FROM akun where id=$akun");
             
                if(mysqli_num_rows($query) > 0) {
                while($profil = mysqli_fetch_array($query)){
 
                    ?>  

                        <input name='nama' type="hidden" value = <?php echo $profil['nama'] ?>>
                        <input name='email' type="hidden" value = <?php echo $profil['email'] ?>>
                        <input name='id_game' type="hidden" value = <?php echo $row['id_game'] ?>>
                        <textarea style='display:none' name="nama_game" ><?php echo $row['nama'] ?></textarea>
                        <input name= 'id_akun' type="hidden" value = <?php echo $profil['id'] ?>>
                       
                        <br></br>
                        

                        <label for="id">ID</label>
                        <input type="text" name="id_user" placeholder="Masukkan ID (Contoh: abcde#1234)">
                        <br></br>
                        <label for="server_id">Server ID</label>
                        <input type="text" name="server_id" placeholder="Masukkan Server ID (Contoh: abcde#1234)" id="server_id">
                </div>
             
                <div class="nominal">
                    <h3>Masukkan Data</h3>
                    <?php 
                        require 'config.php';
                        $id = $_GET['id_game'];
                        $gambar=mysqli_query($db,"SELECT * FROM game where id_game=$id");
                       
                        if(mysqli_num_rows($gambar)>0){
                            while($row=mysqli_fetch_array($gambar)){
                                
                              
                               
                    ?>

                    <div>
                            
                            <label for="pil"><i><?php echo $row['jenis_pilihan']?></i></label>
                            <br>
                            <input type="text" name="jenis" placeholder="Masukkan Jenis Top Up, contoh : 300 Points Rp 34.000">
                        
                    </div>
                    <?php }} ?>


           
                </div>
                <div class="pembayaran">
                    <h3>Metode Pembayaran</h3>
                    
                            <div>
                            <input type="radio" id="E-Wallet" name="bayar" value="E-Wallet">
                            <label for="E-Wallet">E-Wallet <i>(Dana, Gopay, OVO)</i></label>
                            </div>      
                        
                            <div>
                            <input type="radio" id="transfer" name="bayar" value="transfer">
                            <label for="transfer">Bank Transfer <i>(BCA)</i></label>
                            </div>      

                            <div>
                            <input type="radio" id="virtual" name="bayar" value="virtual">
                            <label for="virtual">Virtual Account <i>(Mandiri, BNI, BRI)</i></label>
                            </div> 
                            
                            <br>

                            <div>
                            <label for="waktu">Waktu Pemesanan</label>
                            <input type="date" name="waktu" value=<?= date("d-m-Y")?>>
                            </div>
                       
                </div>
                
                <button method="post" class="order" name="pesan" type="submit" value="beli">Order Now</button>
                     <!-- user -->
                    <?php }} ?>
                    <!-- user -->

                    
                    <!-- gambar-->

                    <?php }} ?>
                    <!-- gambar -->

                    
                
                
            </form>

        </div>
    </section>
</body>
</html>


