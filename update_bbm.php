<h2>Update Harga Bahan Bakar</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Harga</label>
                <input class="input--style-4" type="text" name="txtHrg" value="<?php echo $bbm->getHarga(); ?>" required="">
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>