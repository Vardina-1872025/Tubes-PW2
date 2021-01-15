<h2>Form Input Cabang</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Cabang</label>
                <input class="input--style-4" type="text" name="txtNama" placeholder="Masukkan Nama Cabang" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Alamat</label>
                <input class="input--style-4" type="text" name="txtAlamat" placeholder="Masukkan Alamat" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">No Telepon</label>
                <input class="input--style-4" type="text" name="txtTelp" placeholder="Masukkan Nomor Telepon" required="">
            </div>
        </div>
    </div>
	<div class="input-group">
        <label class="label">Owner</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtOwner" required="">
                <option disabled="disabled" selected="selected">Choose option</option>
					<?php 
						/* @var $row2 Owner*/
						foreach($allOwner as $row2) {
					?>
					<option value="<?php echo $row2->getId_owner(); ?>"><?php echo $row2->getNama_owner(); ?></option>
					<?php
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
<br/>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Cabang</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Owner</th>
        <th>Action</th>
		
    </tr>
    </thead>
    <tbody>
    <?php
        /* @var $row Cabang*/
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_cabang() . '</td>';
            echo '<td>' . $row->getNama_cabang() . '</td>';
            echo '<td>' . $row->getAlamat() . '</td>';
            echo '<td>' . $row->getNo_telp_cabang() . '</td>';
			$ido = $row->getId_owner();
			$ownObj = $this->ownerDao->fetchOwner($ido);
			echo '<td>' . $ownObj->getNama_owner() . '</td>';
			echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateOwner(\''.$row->getId_cabang().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteOwner(\''.$row->getId_cabang().'\')">Delete</button></td>';
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>