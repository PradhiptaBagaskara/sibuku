<?php
// session_start();

// membuat fungsi Simpan
function simpanData()
{
  include 'koneksi.php';

  $isbn       = mysqli_escape_string($konek,$_POST['isbn']);
  $judul_buku = mysqli_escape_string($konek,$_POST['judul_buku']);
  $kategori    = mysqli_escape_string($konek,$_POST['kategori']);
  $penulis    = mysqli_escape_string($konek,$_POST['penulis']);
  $deskripsi  = mysqli_escape_string($konek,$_POST['deskripsi']);
  $harga      = mysqli_escape_string($konek,$_POST['harga']);

  $file_name = $_FILES['cover']['name'];
  $file_tmp  = $_FILES['cover']['tmp_name'];
  $ukuran	= $_FILES['cover']['size'];
  $x = explode('.', $file_name);
  $ekstensi = strtolower(end($x));
  $ijin = array('png', 'jpg', 'gif' );

  // filter extensi image
  if(in_array($ekstensi, $ijin) === true){
					move_uploaded_file($file_tmp, 'cover/'.$file_name);
          // insert data kedalam db
					$query = mysqli_query($konek, "INSERT INTO buku SET isbn='". $isbn ."',
                                judul_buku    = '". $judul_buku ."',
                                harga         = '". $harga ."',
                                id_kategori   = '". $kategori ."',
                                id_penulis    = '". $penulis ."',
                                deskripsi     = '". $deskripsi ."',
                                cover         = '". $file_name ."'
                              ");
    					if($query){
    						 $_SESSION['msg'] = "Data Tersimpan";
    					}else{
                 $_SESSION['msg'] = "Gagal Tersimpan".mysqli_errno($konek);
    					}

			}
      else{
				$_SESSION['msg'] =  'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
    }

function updateData(){
  include 'koneksi.php';
  $id_buku    = mysqli_escape_string($konek,$_GET['id_buku']);
  $isbn       = mysqli_escape_string($konek,$_POST['isbn']);
  $judul_buku = mysqli_escape_string($konek,$_POST['judul_buku']);
  $kategori    = mysqli_escape_string($konek,$_POST['kategori']);
  $penulis    = mysqli_escape_string($konek,$_POST['penulis']);
  $deskripsi  = mysqli_escape_string($konek,$_POST['deskripsi']);
  $harga      = mysqli_escape_string($konek,$_POST['harga']);

  $file_name = $_FILES['cover']['name'];
  $file_tmp  = $_FILES['cover']['tmp_name'];
  $ukuran	= $_FILES['cover']['size'];
  $x = explode('.', $file_name);
  $ekstensi = strtolower(end($x));
  $ijin = array('png', 'jpg', 'gif' );

  // jika gambar ikut di update
  if ($file_tmp != "" && $file_name != "") {

  if(in_array($ekstensi, $ijin) === true){
				// if($ukuran < 1044070){
            $img = $konek->query("select cover from buku where id_buku = '".$id_buku."'");
          	$fetch = $img->fetch_array(MYSQLI_ASSOC);
            @unlink('cover/'.$fetch['cover']);
          	// echo $fetch['cover'];

            move_uploaded_file($file_tmp, 'cover/'.$file_name);

          // insert data kedalam db
          $sql = "update buku SET isbn='". $isbn ."',
                                judul_buku    = '". $judul_buku ."',
                                harga         = '". $harga ."',
                                id_kategori   = '". $kategori ."',
                                id_penulis    = '". $penulis ."',
                                deskripsi     = '". $deskripsi ."',
                                cover         = '". $file_name ."'
                                where id_buku = '". $id_buku ."'";
        }



			}
      else{
        $sql = "update buku SET isbn='". $isbn ."',
                              judul_buku    = '". $judul_buku ."',
                              harga         = '". $harga ."',
                              id_kategori   = '". $kategori ."',
                              id_penulis    = '". $penulis ."',
                              deskripsi     = '". $deskripsi ."'
                              where id_buku = '". $id_buku ."'
                            ";
				$_SESSION['msg'] =  "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
			}
      $query = mysqli_query($konek, $sql);
      if($query){
         $_SESSION['msg'] = "Data Diupdate";
      }else{
         $_SESSION['msg'] = "Gagal Update";
      }


}



function imageBuku($id_nuku)
{
  include 'koneksi.php';
  $id_buku = $_GET['id_buku'];
  $ambil_gambar = mysqli_query($konek, "select cover from buku where id_buku = '".$id_buku."'");
  while ($gambar = mysqli_fetch_array($ambil_gambar)) {
    return $gambar['cover'];
  }
}


 ?>
