$(document).ready(function(){
	$('input:radio[name="Electiontype"]').change(function(){
	    if($(this).val() == '1'){
	       alert("Presidential");
	    }
	    if($(this).val() == '2'){
		       alert("Provincial Council");
		    }
	    
	});

});