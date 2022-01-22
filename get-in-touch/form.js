(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    enquiry: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: "Please enter a valid email address",
                    enquiry: "Please enter your enquiry details",
                    agree: "Please accept our policy"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);


/*
$.validator.addMethod('captcha',
 function(value) {
   $result = ( parseInt($('<a class="_hootified" a="" href="#" #num1"="" onclick="javascript:var e = document.createEvent("CustomEvent"); e.initCustomEvent("hootletEvent", true, true, {type: "hash", value: "#num1"});  document.body.dispatchEvent(e); return false;">#num1</a>').val()) + parseInt($('<a class="_hootified" a="" href="#" #num2"="" onclick="javascript:var e = document.createEvent("CustomEvent"); e.initCustomEvent("hootletEvent", true, true, {type: "hash", value: "#num2"});  document.body.dispatchEvent(e); return false;">#num2</a>').val()) == parseInt($('<a class="_hootified" a="" href="#" #captcha"="" onclick="javascript:var e = document.createEvent("CustomEvent"); e.initCustomEvent("hootletEvent", true, true, {type: "hash", value: "#captcha"});  document.body.dispatchEvent(e); return false;">#captcha</a>').val()) ) ;
   $('<a class="_hootified" a="" href="#" #spambot"="" onclick="javascript:var e = document.createEvent("CustomEvent"); e.initCustomEvent("hootletEvent", true, true, {type: "hash", value: "#spambot"});  document.body.dispatchEvent(e); return false;">#spambot</a>').fadeOut('fast');
       return $result;
   },
       'Incorrect value, please try again.'
   );
*/