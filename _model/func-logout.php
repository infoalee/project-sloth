<?
	ob_start();
	session_start();
	session_destroy(); 
?>
<script src="js/jquery.session.js"></script>
<script>
		$.session.clear()
</script>
<?
	$LOGIN_OK=false;
	$url = "..";

	if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");

	?>
	<!--<SCRIPT LANGUAGE="JavaScript1.2">
		<!-- Begin
		window.location = 'index.php';
		// End -->
<!--		</script> -->
