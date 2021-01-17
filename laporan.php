<h2>Laporan Keuntungan</h2>
<h4>Filter :</h4>
<form method="POST" action="">
	<div class="input-group">
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtFilter" required="">
                <option disabled="disabled" selected="selected">Semua</option>
				<option value="cabang">Per Cabang</option>
				<option value="bulan">Per Bulan</option>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>
<br>
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
        ?>
    </tbody>
</table>