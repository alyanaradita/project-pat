<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Yang Sering Terjual</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    DATA BUKU BANYAK TERJUAL
	    </div>
	    <div class="card-body">
            <div style="padding:10px;">
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">Export Excel</button>
                </form>
                <div class="table-responsive">
                    <table align="center" border="1" class="mt-4 table table-stripped table-hover bg-white" id="data">
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Harga Jual</th>
                            <th>Total Jumlah Beli</th>
                            <th>Total Transaksi</th>
                        </tr>
                        <!-- <?php
                            $data = $go->tampil($con,$tabel);
                            $no = 0;
                            if($data ==""){
                                echo "<tr><td colspan='5'>No Record</td></tr>";
                            }else{
                                foreach($data as $r){
                                $no++
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['username']?></td>
                            <td><?php echo $r['password']?></td>
                            <td><a href="?menu=user&hapus&id=<?php echo $r['id']?>" onclick="return confirm('Hapus Data?')">Hapus</a></td>
                            <td><a href="?menu=user&edit&id=<?php echo $r['id']?>">Edit</a></td>
                        </tr>
                        <?php } } ?> -->
                    </table>
                </div>
            </div>
	    </div>
    </div>
</body>
</html>