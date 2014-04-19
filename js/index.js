$(document).ready(function() {
    $("#signupForm").validate({
      showErrors: function(errorMap, errorList) {
        var numErrors = this.numberOfInvalids();
        if (numErrors > 1) {
            $("#error").html("Please correct the errors below shown in red.");
            $("#error").show();
        } else if (numErrors == 1) {
            for (var key in errorMap) {
                $("#error").html(errorMap[key]);
            }
            $("#error").show();
        } else {
            $("#error").hide();
        }
        this.defaultShowErrors();
    },
    rules: {
        fname: {
            required: true
        },
        lname: {
            required: true
        },
        email: {
            required: true,
            email: true,
        },
        emailConfirm: {
            required: true,
            email: true,
            equalTo: "#email"
        }
    },
    messages: {
        fname: {
            required: "First name is required."
        },
        lname: {
            required: "Last name is required."
        },
        email: {
            required: "Email is required.",
            email: "Email format is invalid."
        },
        emailConfirm: {
            required: "Please confirm your email.",
            equalTo: "The emails don't match."
        }
    },
      errorPlacement: function(error,element) {
        return true;
      }
    });
    $("#signupForm").ajaxForm({
        target: '#output'
    });
    $('.btn').button();
});

