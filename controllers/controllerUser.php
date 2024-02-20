<?php 

@session_start();

if(isset($_POST['local'])){$local=filter_input(INPUT_POST,'local',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$local=null;}

$_SESSION['local'] = $local;
echo "
<script>
window.location.href='".DIRPAGE."atividades';
</script>
";