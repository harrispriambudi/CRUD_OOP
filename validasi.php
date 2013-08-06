<?php
class validasi {

public $form;
public $attribut;
public $error;


function start_js($form){
echo "
<script type='text/javascript'>
$(document).ready(function(){
$('#$form').submit(function(){
";
}

function end_js(){
echo 
"
});
});
</script>
";
}

function validasi_notnull($attribut, $error){
echo 
"
if ($.trim($('#$attribut').val()) == ''){
alert('$error;');
$('#$attribut').focus();
return false;
}
";
}

}