<?php
session_start();
session_destroy();
?>
<html>
<head>
<script>
alert("Successfully Logged Out");

window.location.href="index.php";
</script>
</head>
</html>