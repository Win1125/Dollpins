<?php

require '../login/header.php';

if (!isset($_SESSION['id'])) {
    header("Location: ./login.php");
}

session_unset();
session_destroy();

echo "<script>
		Swal.fire({
			icon : 'success',
			title: 'Adiós',
			text: 'Muchas gracias',
			type: 'success'
		}).then((result) => {
			if(result.isConfirmed){
			    window.location='" . LOGOUT . "';
			}
		});
	</script>";