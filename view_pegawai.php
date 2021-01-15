<h2>Daftar Pegawai</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Pegawai</th>
        <th>Nama</th>
		<th>NIP</th>
		<th>Cabang</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_pegawai() . '</td>';
            echo '<td>' . $row->getNama_pegawai() . '</td>';
            echo '<td>' . $row->getNip() . '</td>';
			$cbg = $row->getId_cabang();
			$cbgObj = $this->ownerDao->fetchCabang($cbg);
            echo '<td>' . $cbgObj->getNama_cabang() . '</td>';
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>