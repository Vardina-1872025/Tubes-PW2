<h2>Update Data Cabang</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Cabang</label>
                <input class="input--style-4" type="text" name="txtNama" value="<?php echo $cabang->getNama_cabang(); ?>" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Alamat</label>
                <input class="input--style-4" type="text" name="txtAlamat" value="<?php echo $cabang->getAlamat(); ?>" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">No Telepon</label>
                <input class="input--style-4" type="text" name="txtTelp" value="<?php echo $cabang->getNo_telp_cabang(); ?>" required="">
            </div>
        </div>
    </div>
	<div class="input-group">
        <label class="label">Owner</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtOwner" required="">
				<?php 
				$select="";
					/* @var $row2 Owner*/
					foreach($allOwner as $row2){
						if ($row2->getId_owner() == $cabang->getId_owner()){
							$select = "selected";
						} else {$select="";}
						echo "<option value='".$row2->getId_owner()."' ".$select." >".$row2->getNama_owner()."</options>";
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