<?php 
    session_start();
    require 'config.php';
    
    
    if(!isset($_SESSION['user'])){
       echo "<script>location='login.php'</script>";
    }

?>

<?php
include 'configBeli.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our comment table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM boxcomment ORDER BY id_comment LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$comment = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of comment, this is so we can determine whether there should be a next and previous button
$num_comment = $pdo->query('SELECT COUNT(*) FROM boxcomment')->fetchColumn();
?>





<?=template_header('Daftar Beli')?>

<div class="content read">
	<a href="index.php" class="create-contact">Beli</a>
    <form method= "get" action="">
            <input class="input-find" type="text" placeholder= "Cari Pembelian Game ..." name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];} ?>">
            <button class="find" type="submit">Cari</button>
    </form>  

	<table>
        <thead>
            <tr>
                <td>ID Beli</td>
                <td>ID Akun</td>
                <td>ID Game</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Nama Game</td>
                <td>ID User</td>
                <td>ID Server</td>
                <td>Jenis Pilihan</td>
                <td>Pembayaran</td>
                <td>Waktu Pembelian</td>
                <td></td>
            </tr>
        </thead>
        <tbody>

        <?php 
                 include "config.php";
                 $akun= $_SESSION['user']['id'];
                $query1 = mysqli_query($db, "SELECT * FROM akun where id=$akun");
             
                if(mysqli_num_rows($query1) > 0) {
                while($profil = mysqli_fetch_array($query1)){
 
                    ?>
                    


            <?php 
                include "config.php";
               
                if (isset($_GET['cari'])){
                    $pencarian= $_GET['cari'];
                    $query = "SELECT * FROM pembelian WHERE id_akun=$akun and nama_game LIKE '%".$pencarian."%'";  
                }else{
                    $query= "SELECT * FROM pembelian where id_akun=$akun";
                }


                $read = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($read)){
            ?>
            <tr>
            <td><?php echo $row['id_beli'] ?></td>
            <td><?php echo $row['id_akun'] ?></td>
            <td><?php echo $row['id_game'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['nama_game'] ?></td>
            <td><?php echo $row['id_user'] ?></td>
            <td><?php echo $row['server_id'] ?></td>
            <td><?php echo $row['jenis_pilihan'] ?></td>
            <td><?php echo $row['pembayaran'] ?></td>
            <td><?php echo $row['waktu'] ?></td>
            <td class="actions">
                    <a href="editbeli.php?id=<?=$row['id_beli'];?> " class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="deletebeli.php?id=<?=$row['id_beli'];?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
            </td>
            </tr>
                <?php } ?>

                <?php }} ?>
        </tbody>
        <br>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="daftarbeli.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_comment): ?>
		<a href="daftarbeli.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>