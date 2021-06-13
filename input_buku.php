<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_buku";
@$field = array('id_buku'=>$_POST[''],'judul'=>$_POST['judul'], 'noisbn'=>$_POST['noisbn'], 'penulis'=>$_POST['penulis'], 'penerbit'=>$_POST['penerbit'], 'tahun'=>$_POST['tahun'], 'stok'=>$_POST['stok'], 'harga_pokok'=>$_POST['harga_pokok'], 'harga_jual'=>$_POST['harga_jual'], 'ppn'=>$_POST['ppn'], 'diskon'=>$_POST['diskon']);
$redirect = "?menu=input_buku";
@$where = "id_buku = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $tabel, $field, $redirect);
}
if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}
if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $tabel, $where);
}
if (isset($_POST['ubah'])) {
    $go->ubah($con, $tabel, $field, $where, $redirect);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    Form Buku
	    </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Kode Buku</label>
                    <input type="text" name="kode" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['kode']?>" readonly placeholder="">  
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Judul Buku</label>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['judul']?>" required placeholder="Masukan judul buku">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">NO ISBN</label>
                    <input type="text" name="noisbn" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['noisbn']?>" required placeholder="Masukan ISBN">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Penulis</label>
                    <input type="text" name="penulis" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['penulis']?>" placeholder="Masukan Penerbit">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['penerbit']?>" placeholder="Masukan Penerbit">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['tahun']?>" placeholder="Masukan Tahun">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Harga Pokok</label>
                    <input type="text" name="harga_pokok" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['harga_pokok']?>" placeholder="Masukan harga pokok" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Harga Jual</label>
                    <input type="text" name="harga_jual" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['harga_jual']?>" placeholder="Masukan harga jual" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-bold">Diskon (%)</label>
                    <input type="number" name="diskon" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['diskon']?>" placeholder="Masukan diskon">
                </div>
                <button class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">Simpan</button>
        </form>
	    </div>
    </div>
    <div style="padding:10px;">
        <form class="d-flex">
            <label class="me-3">Pencarian</label>
            <input class="form-control me-3" type="search" placeholder="Judul Buku/Penulis" aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">Cari</button>
            <button class="btn btn-outline-success" type="submit">Refresh</button>
        </form>
        <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>NO ISBN</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Harga Pokok</th>
                <th>Harga Jual</th>
                <th>Diskon</th>
                <th>Hapus</th>
                <th>Edit</th>
            </tr>
            <?php
                $data = $go->tampil($con, $tabel);
                $no = 0;
                if($data ==""){
                    echo "<tr><td colspan='5'>No Record</td></tr>";
                }else{
                    foreach($data as $r){
                    $no++
            ?>
            <tr>
                <td><?php echo $r['id_buku']?></td>
                <td><?php echo $r['judul']?></td>
                <td><?php echo $r['noisbn']?></td>
                <td><?php echo $r['penulis']?></td>
                <td><?php echo $r['penerbit']?></td>
                <td><?php echo $r['tahun']?></td>
                <td><?php echo $r['harga_pokok']?></td>
                <td><?php echo $r['harga_jual']?></td>
                <td><?php echo $r['diskon']?></td>
                <td><a class="btn btn-danger" href="?menu=input_buku&hapus&id=<?php echo $r['id_buku']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                <td><a class="btn btn-warning" href="?menu=input_buku&edit&id=<?php echo $r['id_buku']?>">Edit</a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
</div>
    </body>
</html>
