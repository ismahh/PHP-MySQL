function checkEmail(emailInput){
    $.ajax({
     method:"POST",
     url: "checkemail.php",
     data:{email:emailInput},
     success: function(data){
       $('#emailStatus').html(data);
     }
   });
}

$(document).on('input','#email',function(e){

    let emailInput = $('#email').val();
    let msg;
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(emailInput))
    {
      msg="<span style='color:red'>Email is not Valid</span>";
    }
    else
    {
      checkEmail(emailInput);
    }
    $('#emailStatus').html(msg);
});