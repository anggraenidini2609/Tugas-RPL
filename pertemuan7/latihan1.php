<?php
// $_GET
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
        <title>GET</title>
</head>
<body>
    <ul>
    <h1>Daftar Mahasiswa</h1>  
  <?php foreach( $mahasiswa as $mhs ) : ?>
      <li>
          <img  height="80" width="80" src="img/<?= $mhs["gambar"]; ?>">
  </li>
  <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>"><?= $mhs["nama"]; ?></a>
        <li>
  <?php endforeach; ?>
  </ul>
  </body>
  </html>