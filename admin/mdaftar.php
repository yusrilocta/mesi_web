<?php include 'header.php';
include '../koneksi.php';
?>
<div class="container mt-5">
        <h1>Daftar Calon Siswa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th class='d-none d-sm-table-cell'>Lahir</th>
                    <th class='d-none d-sm-table-cell'>Asal Sekolah</th>
                    <th class='d-none d-sm-table-cell'>Alamat</th>
                    <th class='d-none d-sm-table-cell'>NISN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM daftar";
                $result = mysqli_query($koneksi, $sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nohp'] . "</td>";
                        echo "<td class='d-none d-sm-table-cell'>" . $row['ttl'] . "</td>";
                        echo "<td class='d-none d-sm-table-cell'>" . $row['asalsek'] . "</td>";
                        echo "<td class='d-none d-sm-table-cell'>" . $row['alamat'] . "</td>";
                        echo "<td class='d-none d-sm-table-cell'>" . $row['nisn'] . "</td>";
                        echo "<td>";
                        echo "<a href='https://wa.me/".$row['nohp']."' class='btn btn-warning btn-sm'>Follow UP</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data siswa.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

<?php include 'footer.php' ?>
