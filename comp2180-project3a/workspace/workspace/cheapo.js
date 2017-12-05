"use strict";

$(document).ready(function(){
	$("#").on('click', function(event){
		event.preventDefault(); 

		var username = $("#username").value();
		var password = $("#password").value();

		var url = "username="+ username + "&password=" + password;
		var request = new XMLHttpRequest();

		request.onreadystatechange = function(){
			if (this.readystatechange == 4){
				if(this.status==200){
					if (request.responseText == "User Found"){
						$("#main").load("home.html")
					} else{
						$("#status").text("The username or password is incorrect. Please try again.")
					}
				} else{
					$("#status").text("Error.")
				}
			}
		}
	});
	
	request.open("POST", "login.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(urlInfo);

    function read(divID, messageID){
        
        var info = "read_id="+messageID;
        var aXMLhttp = new XMLHttpRequest();
        
        aXMLhttp.onreadystatechange = function() {
            if (this.readyState == 4){
                if (this.status == 200) {
                    if (aXMLhttp.responseText == "Read"){
                        $(divID).addClass("read");
                    }
                }
            }
        };
        
        aXMLhttp.open("POST", "home.php", true);
        aXMLhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        aXMLhttp.send(info);
    }

    function fetch(){
        var link = 'home.php?mail=true';
        $.ajax(link,{ method: 'GET' }).done(function(result){
            $("#msglist").html(result); 
        }).fail(function(){
            $("#msglist").html("<p>Error: Unknown</p>");
        });
    }

    if ($(this).attr("href") == "index.html"){
        $("#logout").on('click', function(event){
            
        
            var XMLhttp = new XMLHttpRequest();
            
            var info ="logout=true";
        
            XMLhttp.onreadystatechange = function() {
                if (this.readyState == 4){
                    if (this.status == 200) {
                        $("#main").load("index.html");
                    }
                }
            };
        
            XMLhttp.open("POST", "cheapo.php", true);
            XMLhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XMLhttp.send(info);
        }
    }     
});

