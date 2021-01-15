<h2>Olah Data Bahan Bakar</h2>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Bahan Bakar</th>
        <th>Nama</th>
		<th>Poin per Liter</th>
		<th>Harga per Liter</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
	
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_bahanbakar() . '</td>';
            echo '<td>' . $row->getNama_bahanbakar() . '</td>';
			echo '<td>' . $row->getPoin() . '</td>';
            echo '<td>' . $row->getHarga() . '</td>';
			echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateOwner(\''.$row->getId_bahanbakar().'\')">Update</button>';
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>