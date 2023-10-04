<?php 
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Input Judul dan Isi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include TinyMCE library -->
    <script src="https://cdn.tiny.cloud/1/9scwvziek51j8nf7gr17459ohcukr7js3i63c7ylcbe46bng/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#isi', // ID dari textarea TinyMCE
            plugins: 'image', // Aktifkan plugin image
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat', // Toolbar TinyMCE
            height: 300, // Tinggi textarea
        /* enable title field in the Image dialog*/
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  
    images_upload_url: 'postAcceptor.php',

  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'images/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});

    </script>
</head>
<body>

<?php 
if (isset($_POST['submit_posting'])) {
$host = 'sql309.infinityfree.com';
$username = 'if0_35117480';
$password = 'ayAa8KGwz8zI3ir';
$database = 'if0_35117480_sekolah';
  
  $conn = new mysqli($host, $username, $password, $database);
  
  if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
  }
  
  // Ambil data dari form
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tanggal = date("Y-m-d");
  
  // Simpan data ke dalam tabel di database
  $sql = "INSERT INTO posting (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')";
  
  if ($conn->query($sql) === TRUE) {
      echo "Data berhasil disimpan.";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  header('location:admin/mposting.php');
}
?>

    <div class="container mt-5">
        <h1>Form</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi:</label>
                <textarea class="form-control" id="isi" name="isi" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit_posting">Submit</button>
        </form>
    </div>
</body>
</html>
