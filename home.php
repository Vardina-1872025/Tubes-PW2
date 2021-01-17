<!-- NAMA : Dinda Ayu Febriani, Vardina Nava M K-->
<!-- NRP : 1872043, 1872025 -->

<?php
echo '<h3>Welcome ' . $_SESSION['session_user'] . '</h3>';
if($_SESSION['session_role']=="member"){
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/theme1.css"/>
  </head>
  <body>
	<br><br>
	<h3 align="left">Reminder Poin</h3><br>
    <div id="caleandar">

    </div>

    <script type="text/javascript" src="js/caleandar.js"></script>
    <script type="text/javascript" src="js/demo.js"></script>
  </body>
</html>
<?php
}
?>