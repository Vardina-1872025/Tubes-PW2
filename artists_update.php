<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<h2>Update Artists</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Artists Name</label>
                <input class="input--style-4" type="text" name="txtName" placeholder="New Artists Name" required="" value="<?php echo $artists->getName(); ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Debut</label>
                <input class="input--style-4" type="text" name="txtDebut" placeholder="YYYY-MM-DD" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Company</label>
                <input class="input--style-4" type="text" name="txtCompany" placeholder="New Company" required="">
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>