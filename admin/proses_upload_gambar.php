<?php
// Tentukan folder tempat gambar akan disimpan
$uploadDirectory = 'uploads';

// Jika folder tidak ada, buat folder
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Cek apakah ada file yang diunggah
if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Ambil informasi file yang diunggah
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];

    // Tentukan ekstensi yang diperbolehkan (contoh: jpg, jpeg, png)
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    // Ambil ekstensi file yang diunggah
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Cek apakah ekstensi file diijinkan
    if(in_array($fileExtension, $allowedExtensions)) {
        // Generate nama unik untuk file yang diunggah
        $uniqueFileName = time() . '_' . uniqid() . '.' . $fileExtension;

        // Pindahkan file yang diunggah ke folder tujuan
        $destination = $uploadDirectory . $uniqueFileName;

        if(move_uploaded_file($fileTmpName, $destination)) {
            // Konfigurasi respons JSON
            $response = [
                'success' => true,
                'message' => 'File berhasil diunggah!',
                'url' => $destination, // URL gambar yang diunggah
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Gagal mengunggah file.'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Ekstensi file tidak diijinkan.'
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Tidak ada file yang diunggah.'
    ];
}

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
