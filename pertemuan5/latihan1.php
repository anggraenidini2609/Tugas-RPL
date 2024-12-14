<?php
$mahasiswa = [
    ["Selly Windiarti", "043040023", "Hukum", "sellwindiarti@unpas.ac.id"],
    ["Nuraini Nadhifah Khoerunissa", "033040001", "Psikolog", "Nuraininadhifahkhoerunissa@yahoo.com"],
    ["Annisa", "023040123", "Ekonomi","Annisa@gmail.com"]
];

?>
<!DOCTYPE html>
<html>
<head>
     <title>Daftar Mahasiswa</title>
</head>
<body>

<hl>Daftar Mahasiswa</hl>

<?php foreach( $mahasiswa as $mhs ) : ?>
<ul>
    <li>Nama : <?=$mhs[0]; ?></li>
    <li>NRP : <?=$mhs[1]; ?></li>
    <li>Jurusan : <?=$mhs[2]; ?></li>
    <li>Email : <?=$mhs[3]; ?></li>
</ul> 
<?php endforeach; ?>   
        