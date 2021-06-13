<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Penulis</title>
</head>
<body>
    <div class="container-fluid" id= "content" >
        <div class="card">
	        <div class="card-header">
		        Form Filter Buku Berdasarkan Penulis
	        </div>
	        <div class="card-body">
                <form method="post">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Penulis</label>
                <select type="text" name="nama_penulis" class="form-control" id="exampleFormControlInput1" required></select>
                <button class="btn btn-primary " style="height:40px; width:100px; text-align:center; margin-top:10px;" type="submit">Lihat</button>
            </form>
	    </div>
    </div>
</body>
</html>