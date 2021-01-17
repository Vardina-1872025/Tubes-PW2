<h2>Employee Of the Month</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>ID Pegawai</th>
		<th>Nama Pegawai</th>
		<th>Rating</th>
    </tr>
    </thead>
    <tbody>
    <?php
		/* @var $pegawai pegawai*/
            echo '<tr>';
            echo '<td>' . $pegawai->getId_pegawai() . '</td>';
			echo '<td>' . $pegawai->getNama_pegawai() . '</td>';
			echo '<td>' . $pegawai->getRating() . '</td>';
			echo '</tr>';
        ?>
    </tbody>
</table>