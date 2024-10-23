<?php
include "config.php";

$kode = $_GET['kode'];

$data = $koneksi->query("SELECT * FROM data_barang WHERE Kode='$kode'");
// jika memiliki satu data array gunakan perintah di bawah ini
$stok_barang = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
   
    $nama = $_POST['Nama'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];

    $koneksi->query("UPDATE data_barang SET Nama='$nama',Harga='$harga',Stok='$stok' WHERE Kode='$kode'");

    header('location:readmysql.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data</title>
    <style>
        .background {
            background-image: url('./sky.jpg');
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background-repeat: no-repeat;
        }
        body {
            margin: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .container h2{
            font-size: 32px;
            text-align: center;
            color: navy;
        }
        .button a{
            color: white;
        }
        table{
            width: 30%;
            border: 1px solid black;
            margin: auto;
            margin-top: 50px;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100%; */
            background: transparent;
            backdrop-filter: blur(5px);
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            color: navy;
        }
    </style>
</head>
<body>
<div class="background"></div>
<div class="container">
    <h2>UPDATE DATA</h2>
    <div class="button">
        <center><a href="logoutmysql.php" class="logout">Logout</a></center>
        <center><a href="readmysql.php" class="kembali">Back</a></center>
    </div>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="Nama" value="<?=$stok_barang["Nama"]?>"required></td>
            </tr>
            <tr>
                <td><label for="">Harga</label></td>
                <td>:</td>
                <td><input type="text" name="Harga" value="<?=$stok_barang["Harga"]?>" required></td>
            </tr>
            <tr>
                <td><label for="">Stok</label></td>
                <td>:</td>
                <td><input type="text" name="Stok" value="<?=$stok_barang["Stok"]?>" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Save</button></td>
            </tr>
        </table> 
    </form>
</div>
</body>
</html>