<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
$tabel = "tbl_distributor";
@$field = array('id_distributor'=>$_POST[''],'nama_distributor'=>$_POST['nama'], 'alamat'=>$_POST['alamat'], 'telpon'=>$_POST['telpon']);
$redirect = "?menu=input_distri";
@$where = "id_distributor = $_GET[id]";

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
    <title>Input Distributor</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
            <body OnLoad="document.myform.nama.focus();">

                <!-- form-title -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Form Distributor</h4>
                        </div>
                    </div>
                
                    <!-- form-body -->
                    <div class="panel-body">
                        <form class="form form-vertical" method="post" name="myform">
                            <div class="control-group">
                                <label>Nama Distributor</label>
                                <div class="controls">
                                    <input type="text" name="nama" setFocus class="form-control" value="<?php echo @$edit['nama_distibutor'] ?>" required placeholder="Masukan nama distributor" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label>Alamat</label>
                                <div class="controls">
                                    <textarea class="form-control" name="alamat" value="<?php echo @$edit['alamat'] ?>"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label>Telpon</label>
                                <div class="controls">
                                    <input type="number" name="telpon" class="form-control" value="<?php echo @$edit['telpon'] ?>" placeholder="Masukan Telpon">
                                </div>
                            </div>
                            <div class="control-group">
                                <label></label>
                                <div class="controls">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="SIMPAN">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <div style="padding:10px;">
        <form class="d-flex">
            <label class="me-3">Pencarian</label>
            <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary me-2" type="submit">Cari</button>
            <button class="btn btn-outline-success" type="submit">Refresh</button>
        </form>
        <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
            <tr>
                <th>No.</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Telpon</th>
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
                <td><?php echo $r['id_distributor']?></td>
                <td><?php echo $r['nama_distributor']?></td>
                <td><?php echo $r['alamat']?></td>
                <td><?php echo $r['telpon']?></td>
                <td><a class="btn btn-danger" href="?menu=input_distri&hapus&id=<?php echo $r['id_distributor']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                <td><a class="btn btn-warning" href="?menu=input_distri&edit&id=<?php echo $r['id_distributor']?>">Edit</a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
            </body>
        </div>
    </div>
</body>
</html>
