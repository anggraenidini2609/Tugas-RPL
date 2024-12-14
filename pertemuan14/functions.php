<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasarr");



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}



function tambah($data){
	global $conn;

	$nrp = htmlspecialchars($data["nrp"]);
	$nama =htmlspecialchars($data["nama"]);
	$email =htmlspecialchars($data["email"]);
	$jurusan =htmlspecialchars($data["jurusan"]);
	
	//uplod gambar
	$gambar = upload();
	if( !$gambar ){
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES ('', '$nrp', '$nama', '$email', '$jurusan',	'$gambar') ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function upload (){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['name'];

	//harus upload
	if( $error === 4) {
		echo "<script>
		alert('pilih gambar terlebih dahulu!');
		</script>";
	return false;

	}

	// cek apakah gambar valid
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
		alert('yang anda upload bukan gambar!');
		</script>";
	return false;

	}

	// cek ukuran
	if( $ukuranFile > 1000000 ) {
		echo "<script>
		alert('ukuran gambar terlalu besar!');
		</script>";
	return false;
	}

    // generate nama gambar baru

    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

    return $namaFilebaru;

}







	function hapus($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($conn);
	}



function ubah($data){
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama =htmlspecialchars($data["nama"]);
	$email =htmlspecialchars($data["email"]);
	$jurusan =htmlspecialchars($data["jurusan"]);
    $gambarLama =htmlspecialchars($data["gambarLama"]);

// ganti gak gambarny
	if( $_FILES['gambar']['error'] === 4 ){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}





	$query = "UPDATE mahasiswa SET
			nrp = '$nrp',
			nama = '$nama',
			email = '$email',
			jurusan = '$jurusan',
			gambar = '$gambar'
		   WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
			WHERE 
			nama LIKE '%$keyword%' OR 
			nrp LIKE '%$keyword%' OR 
			email LIKE '%$keyword%' OR 
			jurusan LIKE '%$keyword%'

	";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysql_real_escape_string($conn, $data["password"]);
	$password2 = mysql_real_escape_string($conn, $data["password2"]);

// konfirmasi user
   $result = mysqli_query($conn, "SELECT username FROM user WERE username = '$username'");

   if(mysqli_fetch_assoc($result) ) {
	   echo "<script>
	         alert('username sudah terdaftar!')
			 </script>";
		return false;
   }		 





	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
		alert('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	var_dump($password); die;

	// ditambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user values('', '$username', '$password')");

	return mysql_affected_rows($conn);
}







?>