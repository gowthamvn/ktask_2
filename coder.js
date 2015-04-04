$(document).ready(function(){

	console.log("working");
	
	$.post('temp.php',{},function(reply){

		console.log(reply);

	},'json');

});