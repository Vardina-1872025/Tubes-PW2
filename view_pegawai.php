<h2>Olah Data Pegawai</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Pegawai</th>
        <th>Nama</th>
		<th>NIP</th>
		<th>Cabang</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
		/* @var $row pegawai*/
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_pegawai() . '</td>';
            echo '<td>' . $row->getNama_pegawai() . '</td>';
            echo '<td>' . $row->getNip() . '</td>';
			$cbg = $row->getId_cabang();
			$cbgObj = $this->ownerDao->fetchCabang($cbg);
            echo '<td>' . $cbgObj->getNama_cabang() . '</td>';
			echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateOwner(\''.$row->getId_pegawai().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteOwner(\''.$row->getId_pegawai().'\')">Delete</button></td>';
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>