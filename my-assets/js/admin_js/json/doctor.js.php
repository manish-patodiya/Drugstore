<?php

$cache_file = "doctor.json";
header('Content-Type: text/javascript; charset=utf8');
?>
var doctorList = <?php echo file_get_contents($cache_file); ?> ;

APchange = function(event, ui){
$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
function producstList() {

$( ".doctorSelection" ).autocomplete(
{
source: doctorList,
delay:300,
focus: function(event, ui) {
$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
$(this).val(ui.item.label);
return false;
},
select: function(event, ui) {
$(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
$(this).val(ui.item.label);
$(this).unbind("change");
return false;
}
});
$( ".doctorSelection" ).focus(function(){
$(this).change(APchange);

});
}