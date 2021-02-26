$(document).ready(function() {
    
    //Register User
    $(document).on("click",'#registerUser',function(e){
     e.preventDefault();
    
    const email = $("#emailRegister").val();
    const username = $("#usernameRegister").val();
    const password = $("#passwordRegister").val();

    if(email == '' || username == '' || password == ''){
        alert('Please fill form properly');
        return;
    }
    
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: { registerEmail:email,registerUsername:username,registerPassword:password },
        success: function(response){    
            if(response == 1){
                window.location.replace("index.php");
            }else if(response == 2){
                alert('You already have an account!');
            }       
    }});
    //Ajax Ends
       
    });  
   //Register User ends  


   //Login User
   $(document).on("click",'#loginUser',function(e){
    e.preventDefault();
   
   const email = $("#loginEmail").val();
   const password = $("#loginPassword").val();

   if(email == '' || password == ''){
       alert('Please fill properly');
       return;
   }
   
   $.ajax({
       url: 'ajax.php',
       type: 'POST',
       data: { loginEmail:email,loginPassword:password },
       success: function(response){    
           if(response == 1){
            window.location.replace("index.php");
           }else{
               alert('Please enter correct information');
           }       
   }});

});
 //Login User Ends   

    //Jquery Ends here
});