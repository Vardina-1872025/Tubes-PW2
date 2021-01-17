<h2>View Transaksi</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>ID Pegawai</th>
		<th>ID Member</th>
        <th>Tanggal Pembelian</th>
        <th>Tanggal Expired Poin</th>
        <th>Jenis Bahan Bakar</th>
        <th>Jumlah Liter</th>
        <th>Poin</th>
    </tr>
    </thead>
    <tbody>
    <?php
		/* @var $row bertransaksi*/
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_pegawai() . '</td>';
			echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getTanggal() . '</td>';
            echo '<td>' . $row->getTanggal_exp_poin() . '</td>';
            echo '<td>' . $row->getId_bahanbakar() . '</td>';
            echo '<td>' . $row->getLiter() . '</td>';
            echo '<td>' . $row->getTot_poin() . '</td>';
        }
        $link = null;
        ?>
    </tbody>
</table>