<?php
    $koneksi = mysqli_connect("localhost", "root", "", "perusahaan_jasa_laundry");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>

<h1>Input Data karyawan</h1>

<form action="" method="post">
<table border="2">
    <tr>
        <td>nama_karyawan  </td>
        <td><input type="text" name="nama_karyawan"></td>
    </tr>
    <tr>
        <td>alamat  </td>
        <td><input type="text" name="alamat"></td>
    </tr>
    <tr>
        <td>no_telepon  </td>
        <td><input type="text" name="no_telepon"></td>
    </tr>
    <tr>
        <td>jenis_kelamin  </td>
        <td><input type="text" name="jenis_kelamin"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<h1>Hasil input data karyawan</h1>
<table border="2">
    <thead>
        <th>no</th>
        <th>nama_karyawan</th>
        <th>alamat</th>
        <th>no_telepon</th>
        <th>jenis_kelamin</th>
        <th>aksi</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `karyawan`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td>
                <a href="index.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `karyawan` (`nama_karyawan`,`alamat`,`no_telepon`,`jenis_kelamin`)
                VALUES ('$_POST[nama_karyawan]', '$_POST[alamat]', '$_POST[no_telepon]', '$_POST[jenis_kelamin]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `karyawan` WHERE
        `karyawan`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'index.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>