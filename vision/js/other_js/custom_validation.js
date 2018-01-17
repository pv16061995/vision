$(document).ready(function(){
  //$('.loader').show();
  //$("#sbtValBtn").addClass('disabled');
  /*Match password*/
  $.validator.addMethod( 'passwordMatch', function(value, element) {

      // The two password inputs
      var password = $("#Password").val();
      var confirmPassword = $("#Confirm_Password").val();

      // Check for equality with the password inputs
      if (password != confirmPassword ) {
          return false;
      } else {
          return true;
      }

  }, "Your Passwords Must Match");
  /*match sending password*/
  $.validator.addMethod( 'sendingPasswordMatch', function(value, element) {

      // The two password inputs
      var sendingPassword = $("#Sending_Password").val();
      var confirmSendingPassword = $("#Confirm_Sending_Password").val();

      // Check for equality with the password inputs
      if (sendingPassword != confirmSendingPassword ) {
          return false;
      } else {
          return true;
      }

  }, "Your Transaction Passwords Must Match");
  /*match sending password*/

  /*password and transaction password match*/
  $.validator.addMethod( 'passwordTransactionPasswordMatch', function(value, element) {

      // The  password inputs
      var password = $("#Password").val();
      // The transaction  password inputs
      var sendingPassword = $("#Sending_Password").val();
      // Check for equality with the password inputs
      if (password == sendingPassword ) {
          return false;
      } else {
          return true;
      }

  }, "Your password and transaction passwords must not match");
  /*password and transaction password match*/

  $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{1,16}$/.test(value);
}, "Password must contain only combination of capital and small letters, numbers, or dashes.");

  /*Signup Validation*/
  $("#signupForm").validate({
    rules:{
      UserName:{
        required:true,
        email:true
      },
      Password:
      {
        required:true,
        minlength:5,
        alphanumeric:true
      },
      Confirm_Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
        passwordMatch:true
      },
      Sending_Password:
      {
        required:true,
        minlength:5,
        alphanumeric:true,
        passwordTransactionPasswordMatch:true
      },
      Confirm_Sending_Password:
      {
        required:true,
        minlength:5,
        alphanumeric:true,
        sendingPasswordMatch:true
      }
    },
    messages:{
      UserName:{
        required:"The email address is required.",
        email:"The email address is invalid."
      },
    Password:
    {
      required:"The Password field is required.",
      minlength:"The Password will 5 character in length"
    }
    ,
    Confirm_Password:
    {
      required:"The Confirm Password field is required.",
      minlength:"The Confirm Password will 5 character in length"
    },
    Sending_Password:
    {
      required:"The Transaction Password field is required.",
      minlength:"The Transaction Password will 5 character in length"
    },
    Confirm_Sending_Password:
    {
      required:"The Confirm Transaction Password field is required.",
      minlength:"The Confirm Transaction Password will 5 character in length"
    }
    }
    ,
    submitHandler: function(form) {
      $('.loader').show();
      $("#sbtValBtn").addClass('disabled');
      var userEmail=$("#UserName").val();
      var userPassword=$("#Password").val();
      var sendingPassword=$("#Sending_Password").val();
      $.post("ajax/ajax.php",{
        q:"signup",
        email:userEmail,
        pass:userPassword,
        sendingpass:sendingPassword,
        },
        function(data){
          str=data.split('^');
          if(str[1]==200)
          {
            swal("Success", str[2], "success");
            $('.loader').hide();
            $("#sbtValBtn").removeClass('disabled');
            setTimeout(function(){window.location.href="login.php";},2000);
          }
          else if(str[1]==400)
          {
            swal("Warning", str[2], "warning");
            $('.loader').hide();
            $("#sbtValBtn").removeClass('disabled');
          }
          else {
            swal("Warning", str[2], "warning");
            $('.loader').hide();
            $("#sbtValBtn").removeClass('disabled');
          }

        }
      );

    }
  });
  /*Login validation*/
  $("#loginForm").validate({
    rules:{
      UserName:{
        required:true,
        email:true
      },
      Password:
      {
        required:true

      }
    },
    messages:{
      UserName:{
        required:"The email address is required.",
        email:"The email address is invalid."
      },
    Password:
    {
      required:"The Password field is required."

    }
    }
    ,
    submitHandler: function(form) {
      var userEmail=$("#UserName").val();
      var userPassword=$("#Password").val();
      $.post("ajax/ajax.php",{
        q:"login",
        email:userEmail,
        pass:userPassword,
        },
        function(data){
          dat=data.split('^');
          if(dat[1]==200)
          {
          window.location.href="wallet.php";
          }
          else if(dat[1]==201)
          {
          window.location.href="device_confirmations.php";
          }
          else if(dat[1]==401){
            swal("Warning", dat[2], "warning");
          }
          else {
            swal("Warning", dat[2], "warning");
          }
        }
      );

    }
  });
  /*password reseet*/
  $("#resetForm").validate({
    rules:{
      EmailAddress:{
        required:true,
        email:true
      },
      // Agree:{
      //   required:true
      // }
    },
    messages:{
      EmailAddress:{
        required:"E-mail is required",
        email:"E-mail is invalid"
      },
      // Agree:{
      //   required:"Please check the checkbox for agreement<br/>."
      // }
    },
    submitHandler: function(form) {
      var email=$("#EmailAddress").val();
      $.post("ajax/ajax.php",{
        q:"resetPass",
        emailId:email
        },
        function(data){

          var str=data.split("^");

          if(str[0]==200)
          {
              swal("Success", str[1], "success");
            setTimeout(function(){window.location.href="verify_otp.php?id="+btoa(str[2]);},3000);
          }else{
              swal("Warning", str[1], "warning");
          }
        }
      );

    }
  });
  /*OTP VERIFICATION*/
  $("#otpForm").validate({
    rules:{
      EmailAddress:{
        required:true,
        email:true
      },
      otp:{
        required:true
      }
    },
    messages:{
      EmailAddress:{
        required:"E-mail is required",
        email:"E-mail is invalid"
      },
      otp:{
        required:"OTP is required."
      }
    },
    submitHandler: function(form) {
      var email=$("#EmailAddress").val();
      var otp=$("#otp").val();
      $.post("ajax/ajax.php",{
        q:"userotp",
        emailId:email,
        userotp:otp
        },
        function(data){
          var str=data.split("^");
          if(str[0]==200)
          {
            swal("Success", str[1], "success");
            setTimeout(function(){window.location.href="update_password.php?id="+btoa(str[2]);},3000);
          }
          else {
            swal("Warning", str[1], "warning");
          }
        }
      );

    }
  });
  /*FINAL PASSWORD RESET*/
  $("#finalPassReset").validate({
    rules:{
      EmailAddress:{
        required:true,
        email:true
      },
      Password:{
        required:true,
        minlength:5,
        alphanumeric:true
      },
      Confirm_Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
        passwordMatch:true
      }
    },
    messages:{
      EmailAddress:{
        required:"EmailAddress is required",
        email:"EmailAddress is invalid"
      },
      Password:{
        required:"Password is required.",
        minlength:"The Password will 5 character in length"
      },
      Confirm_Password:{
        required:"Confirm Password is required.",
        minlength:"The Confirm Password will 5 character in length"
      }
    },
    submitHandler: function(form) {
      var email=$("#EmailAddress").val();
      var password=$("#Password").val();
      var confirm_password=$("#Confirm_Password").val();
      $.post("ajax/ajax.php",{
        q:"final_reset",
        emailId:email,
        pass:password,
        new_pass:confirm_password
        },
        function(data){
          //alert(data);
          var str=data.split("_");
          if(str[0]==200)
          {
              swal("Success", str[1], "success");
            setTimeout(function(){window.location.href="login.php";},3000);
          }
          else {
              swal("Warning", str[1], "warning");
          }
        }
      );
    }
  });
  /*CHANGE PASSWORD AFTER LOGIN*/
  $("#changePassReset").validate({
    rules:{
      Current_Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
      },
      Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
      },
      Confirm_Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
        passwordMatch:true
      }
    },
    messages:{
      Current_Password:{
        required:"Current Password is required.",
        minlength:"The Current Password will 5 character in length"
      },
      Password:{
        required:"Password is required.",
        minlength:"The Password will 5 character in length"
      },
      Confirm_Password:{
        required:"Confirm Password is required.",
        minlength:"The Confirm Password will 5 character in length"
      }
    },
    submitHandler: function(form) {
      var current_password=$("#Current_Password").val();
      var password=$("#Password").val();
      var confirm_password=$("#Confirm_Password").val();
      $.post("ajax/ajax.php",{
        q:"final_changepass",
        cpass:current_password,
        pass:password,
        new_pass:confirm_password
        },
        function(data){
          //alert(data);
          var str=data.split("_");
          //swal("Success", str[1], "success");
          if(str[0]==200)
          {
            swal("Success", str[1], "success");
            setTimeout(function(){window.location.reload();},3000);
          }
          else {
            swal("Warning", str[1], "warning");
          }
        }
      );
    }
  });
/*CHANGE Transaction PASSWORD AFTER LOGIN*/
  $("#changetransPassReset").validate({
    rules:{
      currentsendingPassword:{
        required:true,
        minlength:5,
        alphanumeric:true,
      },
      sendingPassword:{
        required:true,
        minlength:5,
        alphanumeric:true,
      },
      sending_Confirm_Password:{
        required:true,
        minlength:5,
        alphanumeric:true,
        passwordMatch:true
      }
    },
    messages:{
      currentsendingPassword:{
        required:"Current Transaction Password is required.",
        minlength:"The Current Transaction Password will 5 character in length"
      },
      sendingPassword:{
        required:"Transaction Password is required.",
        minlength:"The Transaction Password will 5 character in length"
      },
      sending_Confirm_Password:{
        required:"Confirm Transaction Password is required.",
        minlength:"The Confirm Transaction Password will 5 character in length"
      }
    },
    submitHandler: function(form) {
      var current_password=$("#currentsendingPassword").val();
      var password=$("#sendingPassword").val();
      var confirm_password=$("#sending_Confirm_Password").val();
      $.post("ajax/ajax.php",{
        q:"reset_trans",
        cpass:current_password,
        pass:password,
        new_pass:confirm_password
        },
        function(data){
          //alert(data);
          var str=data.split("_");

          if(str[0]==200)
          {
            swal("Success", str[1], "success");
            setTimeout(function(){window.location.reload();},3000);
          }
          else {
            swal("Warning", str[1], "warning");
          }
        }
      );
    }
  });
$("#formManageBasic").validate({
  rules:{
    fname:{
      required:true
    },
    lname:{
      required:true
    },
    dob_month:{
      required:true
    },
    dob_day:{
      required:true
    },
    dob_year:{
      required:true
    },
    user_country:
    {
      required:true
    },
    street:{
      required:true
    },
    city:{
      required:true
    },
    zipcode:{
      required:true
    }
  },
  messages:{
    fname:{
      required:"First name is required."
    },
    lname:{
      required:"Last name is required."
    },
    dob_month:{
      required:"Birth month is required."
    },
    dob_day:{
      required:"Birth day is required."
    },
    dob_year:{
      required:"Birth year is required."
    },
    user_country:
    {
      required:"Country is required."
    },
    street:{
      required:"Street is required."
    },
    city:{
      required:"City is required."
    },
    zipcode:{
      required:"Zipcode is required"
    }
  },
  submitHandler: function(form) {
    $.post("ajax/ajax.php",{
      q:"basic_verification",
      data:$("#formManageBasic").serialize()
      },
      function(data){
        alert(data);
        // var str=data.split("_");
        // swal("Success", str[1], "success");
        // if(str[0]==200)
        // {
        //   setTimeout(function(){window.location.href="login.php";},2000);
        // }
      }
    );
  }
});
});
