<?php
// $mahasiswa = [
// ["Selly Windiarti", "043040023", "sellywindiarti@unpas.ac.id", "Hukum"],
// ["Nuraini Nadhifah Khoerunissa", "033040001", "Nuraininadhifahkhoerunissa@yahoo.com", "Psikologi"],
// ];

// Array Associative
// derinisinya sama seperti array numerik,kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama" => "Selly Windiarti",
        "nrp" => "043040023",
        "email" => "sellywindiarti@unpas.ac.id",
        "jurusan" => "Hukum",
        "gambar" => "Selly.jpg.jpg"
    ],
    [
        "nama" => "Nuraini Nadhifah Khoerunissa",
        "nrp" => "033040001",
        "email" => "Nuraininadhifahkhoerunissa@yahoo.com",
        "jurusan" => "Psikologi",
        "gambar" => "Nuraini.jpg.jpg"
    ]
];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img height="100" width="100" src="img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        </ul>
    <?php endforeach; ?>




</body>

</html>