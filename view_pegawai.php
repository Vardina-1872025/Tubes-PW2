<h2>Olah Data Pegawai</h2>
<h3>Form Tambah Pegawai</h3>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Id Pegawai</label>
                <input class="input--style-4" type="text" name="txtIdPeg" placeholder="Masukkan Id Pegawai" required="">
            </div>
        </div>
    </div>
	<div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Pegawai</label>
                <input class="input--style-4" type="text" name="txtNama" placeholder="Masukkan Nama Pegawai" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">NIP</label>
                <input class="input--style-4" type="text" name="txtNip" placeholder="Masukkan Nip" required="">
            </div>
        </div>
    </div>
	<div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Password</label>
                <input class="input--style-4" type="text" name="txtPass" placeholder="Masukkan Password" required="">
            </div>
        </div>
    </div>
	<div class="input-group">
        <label class="label">Cabang</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtCabang" required="">
                <?php
					$select="";
					/* @var $row Cabang*/
					foreach($allCabang as $row2){
						echo "<option value='".$row2->getId_cabang()."' >".$row2->getNama_cabang()."</options>";
					}
				?>
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