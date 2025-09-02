<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Barang</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
</head>

<body>
<div class="container mt-4">
    <h2>Stock Bahan</h2>
    <h4>(Inventory)</h4>
    <div class="data-tables datatable-dark">
        <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $ambilsemuadatastock = mysqli_query($conn,"SELECT * FROM stock"); 
                $i = 1; 
                while($data = mysqli_fetch_array($ambilsemuadatastock)){
                    $namabarang = $data['namabarang']; 
                    $deskripsi = $data['deskripsi']; 
                    $stock = $data['stock']; 
                ?>
                <tr>
                    <td><?= $i++; ?></td> 
                    <td><?= $namabarang; ?></td> 
                    <td><?= $deskripsi; ?></td> 
                    <td><?= $stock; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
$(document).ready(function() {
    $('#mauexport').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print']
    });
});
</script>

</body>
</html>
