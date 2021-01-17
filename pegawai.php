<!-- NAMA : Dinda Ayu Febriani, Vardina Nava M K -->
<!-- NRP : 1872043, 1872025 -->

<h2>Form Pegawai</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Pegawai</label>
                <input class="input--style-4" type="text" name="txtNama" value="<?php echo $pegawai->getNama_pegawai(); ?>" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">NIP</label>
                <input class="input--style-4" type="text" name="txtNip" value="<?php echo $pegawai->getNip(); ?>" required="">
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
						if ($row2->getId_cabang() == $pegawai->getId_cabang()){
							$select = "selected";
						} else {$select="";}
						echo "<option value='".$row2->getId_cabang()."' ".$select." >".$row2->getNama_cabang()."</options>";
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
