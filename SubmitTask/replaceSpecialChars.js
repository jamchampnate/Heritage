<!--
            /*
             * Name: replaceSpecialCharacters
             * Parameters: string str
             * Returns: string str
             * Description: Creates two arrays, with each numbered element corresponding to that same numbered element of the other array. str is
             *   			searched for RegExp(chars[i], 'g') and replaced with escapeChars[i].
             */
            function replaceSpecialCharacters(str){
                var chars = new Array("&", "#");
                var escapeChars = new Array("%26", "%23");
                for(var i = 0; i < chars.length; i ++){
                    var search = new RegExp(chars[i], 'g');
                    str = str.replace(search, escapeChars[i]);
                }
                return str;
            }
	
            $(document).ready(function(){
                $("#name").focus();
                $("#submit").click(function(){
                    /* Form check */
                    if($("#name").val() == ''){
                        alert("Please fill out your name");
                        return;
                    }
                    var ok = /^[0-9]{3}$/.test($("#extension").val());
                    if(!ok){
                        alert("Please fill out your three digit extension");
                        return;
                    }
                    ok = /^[a-zA-Z0-9\._]{3,}@heritagertc.org/.test($("#email").val());
                    if(!ok){
                        alert("Please fill out your Heritage email address");
                        return;
                    }
                    if($("#department").val() == ''){
                        alert("Please fill out your department");
                        return;
                    }
                    if($("#issue").val() == ''){
                        alert("Please input the issue");
                        return;
                    }
                    if($("#description").val() == ''){
                        alert("Please input a description of the issue");
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "insiteProcessor.php",
                        data: "module=submitMaintRequest" +
                            "&name=" + $("#name").val() +
                            "&extension=" + $("#extension").val() +
                            "&email=" + $("#email").val() +
                            "&department=" + $("#department").val() +
                            "&issue=" + replaceSpecialCharacters($("#issue").val()) +
                            "&location=" + replaceSpecialCharacters($("#location").val()) +
                            "&priority=" + $("#priority").val() +
                            "&description=" + replaceSpecialCharacters($("#description").val()),
                        success: function(returnData){
                            if(returnData == '0'){
                                alert("Confirmation: Thank you for submitting your request. It has been emailed  to maintenance and will be assessed. You will be notified of any status change.");
                            }
                            else if(returnData == '1'){
                                alert("Your request was submitted but a notification email could not be sent.<br />If problem persists, please call Sonia Hall at x353 in reference to your request.");
                            }
                            else if(returnData == '2'){
                                alert("Your request could not be submitted. Please try again.");
                                return;
                            }
                            window.close();
					
				
                        },
                        error: function(){
                            alert("There was a problem connecting to the database. Please try again");
                        }
                    });
                });
            });
            //-->