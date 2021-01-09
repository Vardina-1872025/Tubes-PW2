<h2>View Transaksi</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>ID Pegawai</th>
        <th>Tanggal Pembelian</th>
        <th>Jenis Bahan Bakar</th>
        <th>ID Member</th>
        <th>Poin</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_pegawai() . '</td>';
            echo '<td>' . $row->getTanggal() . '</td>';
            echo '<td>' . $row->getId_bahanbakar() . '</td>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getTot_poin() . '</td>';
        }
        $link = null;
        ?>
    </tbody>
</table>