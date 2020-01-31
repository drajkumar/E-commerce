
	$(document).ready(function(){


    $("#rest").hide();
    $("#postcomment").click(function(){
        var blogid = $('#blogid').val();
    	var comment = $('#comment').val();
    	var name = $('#name').val();
    	var email = $('#email').val();
    	var website = $('#website').val();

    	var error = false;

        if(comment == ''){
         $( "#errormes" ).text('Your comment is empty');
        }else if(name == ''){
         $( "#errormes" ).text('Your name is empty');
        }else if(email == ''){
         $( "#errormes" ).text('Your email is empty');
        }else{
         var outpotcomment = '';
         outpotcomment += '<img src="assest/images/icons/icon-header-01.png" alt="IMG"><p>Name: '+name+'</p>';
         outpotcomment += '<p>Comment: '+comment+'</p><br/>';
         $('#showcomment').append(outpotcomment);

          $.ajax({
              type: "POST",
              url: "comment.php",
              data: {'blogid': blogid, 'comment' : comment, 'name' : name, 'email' : email, 'website' : website},
              success:  function(data){
                $("#rest").show();
                 $("#errormes").hide();
                $( "#rest" ).text(data);
                 // $(".header-icons-noti").load("count_cart.php", function(responseTxt, statusTxt, xhr){
                   // if(statusTxt == "success")

                    // return statusTxt
               // });

              }
              
            });
        }
  });
});