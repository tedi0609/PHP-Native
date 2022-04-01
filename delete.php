<?php
require 'file-storage.php';
$filename='DataAnggota.txt';
$result = remove($filename, $_GET["id_anggota"], 'id_anggota');

    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data berhasil dihapus...!');
                document.location.href = 'index.php';
            </script>";
    }else{
			echo "<script type='text/javascript'>
							alert('Data GAGAL disimpan...!');
							document.location.href = 'index.php';
					</script>";
    }

?>
