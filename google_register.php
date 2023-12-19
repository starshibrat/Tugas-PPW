<?php 
session_start();
$id_mhw = $_SESSION["id_mhw"];
$user_id = $_SESSION["user_id"];
?>

Masukkan NIM terlebih dahulu sebelum melanjutkan.
<form action='services/google_update_nim.php' method='post'>
    <input type='text' id='NIM' name='NIM'>
    <input type='hidden' id='id_mhw' name='id_mhw' value=<?php echo $id_mhw ?>>
    <input type='hidden' id='user_id' name='user_id' value=<?php echo $user_id ?>>
    
    <button type='submit' class='btn btn-primary'>Submit</button>
</form>