<h2>Update Data Kendaraan</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Plat Motor</label>
                <input class="input--style-4" type="text" name="txtPlatMotor" value="<?php echo $kendaraan->getPlat_motor(); ?>" >
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Plat Mobil</label>
                <input class="input--style-4" type="text" name="txtPlatMobil" value="<?php echo $kendaraan->getPlat_mobil(); ?>" >
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>