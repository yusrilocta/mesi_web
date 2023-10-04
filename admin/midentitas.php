<?php include 'header.php';
include '../koneksi.php';
?>
 <div class="container mt-5">
        <h1>Edit Data Sekolah</h1>

        <?php

        // Mengecek apakah ada parameter ID yang diterima dari URL
            $id = 1;

            // Mengambil data sekolah berdasarkan ID
            $sql = "SELECT * FROM data_sekolah WHERE id = $id";
            $result = $koneksi->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Nomer Hp:</label>
                        <input type="text" class="form-control" id="link" name="link" value="<?php echo $row['link']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun:</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $row['tahun']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="akreditas" class="form-label">Akreditas:</label>
                        <input type="text" class="form-control" id="akreditas" name="akreditas" value="<?php echo $row['akreditas']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update_data_sekolah">Update</button>
                </form>
        <?php
            } else {
                echo "Data sekolah tidak ditemukan.";
            }

        // Proses pembaruan data sekolah
        if (isset($_POST['update_data_sekolah'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $link = $_POST['link'];
            $tahun = $_POST['tahun'];
            $akreditas = $_POST['akreditas'];

            $sql = "UPDATE data_sekolah SET nama='$nama', alamat='$alamat', link='$link', tahun='$tahun', akreditas='$akreditas' WHERE id=$id";

            if ($koneksi->query($sql) === TRUE) {
                echo "Data sekolah berhasil diperbarui.";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
        ?>
    </div>


<?php include 'footer.php' ?>