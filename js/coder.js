$(document).ready(function(){

	var search,copy,len;
	var parent;
	var sub;
	console.log("jquery");

	$("#progress").hide();

	$("#submit").click(function(){

		
		var roll=$("#id").val();
		var password=$("#password").val();
		

		if(roll!="")
		{
			if(password!="")
			{
				
				$("#progress").fadeIn(500);
				$("#submit").fadeOut(1000);
				$.post("logincheck.php",{roll:roll,password:password},function(reply){
					console.log(reply);
					if(reply==1)
					{
						window.location.href="./";
					}
					else
					{
						if(reply==0)
						{
							
							$("#password").val("");
							$("#progress").fadeOut(1000);
							$("#submit").fadeIn(500);
							setTimeout(function(){

								alert("Wrong Password");

							},1000);
							
						}
						else
						{
							
							$("#id").val("");
							$("#password").val("");
							$("#progress").fadeOut(1000);
							$("#submit").fadeIn(500);
							setTimeout(function(){

								alert("Invalid Register Number");

							},1000);

							
						}
					}

				},'json');
			}
			else
			{
				alert("password field can't be empty");
			}
	}
	else
	{
		alert("register number field can't be empty");
	}
	});

	

	$("input").keypress(function(e){
	    if(e.keyCode==13)
	    {
    		

    		search=$("#searchtext").val();
    	

	    	console.log("calling wordfind "+search);

    		$.post("wordfind.php",{search:search},function(reply){

    			var i=0;
    			console.log(reply);
    			$("#suggest").empty();
				var len=Object.keys(reply).length;
				console.log(len);
				for(var i=0;i<len;i++)
				{
				    		  				
    				if(reply[0]['value']!=0)
    				{
	    				var parent=reply[0]['word'];
	    				console.log(parent);
    					$("#suggest").append(parent+" ");

    					$.post("subget.php",{search:search},function(rep){

    						console.log(rep);
    						var len=Object.keys(rep).length;

    						for(var i=0;i<len;i++)
							{
	    						if(rep[i]['value']!=0)
    							{
		    						 sub=rep[i]['word'];
	    							console.log(sub);
	    							if(sub!=parent)
	    							{
    									$("#suggest").append(parent+" ");
    								}
    							}
    						}
    					},'json');
    				}
    				
    				else
    				{
	    				$.post("subfind.php",{search:search},function(reply){

    						console.log(reply);

							var sub=reply[0]['word'];
							
	    						$("#suggest").append(reply[0]['word']+" ");
	    					

    					},'json');
    				}
    			}


    			

    		},'json');
    	

    	}

 	});
	
 
});