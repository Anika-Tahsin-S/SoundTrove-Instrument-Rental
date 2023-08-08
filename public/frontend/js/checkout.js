$(document).ready(function () {
    $(".razorpay-btn").click(function (e) {
        e.preventDefault();
        var firstname = $(".firstname").val();
        var lastname = $(".lastname").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var city = $(".city").val();
        var country = $(".country").val();
        var pincode = $(".pincode").val();
        // alert(firstname);
        if (!firstname) {
            fname_error = "First name required";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }

        if (!lastname) {
            lname_error = "Last name required";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "Emailrequired";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "Contact no. required";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "Address1 required";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            address2_error = "Address 2 required";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!city) {
            city_error = "City name required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!country) {
            country_error = "Country name required";
            $("#country_error").html("");
            $("#country_error").html(country_error);
        } else {
            country_error = "";
            $("#country_error").html("");
        }

        if (!pincode) {
            pincode_error = "Zip Code required";
            $("#pincode_error").html("");
            $("#pincode_error").html(pincode_error);
        } else {
            pincode_error = "";
            $("#pincode_error").html("");
        }

        // if (fname_error != null) {
        //     if (lname_error != null) {
        //         if(email_error != null){
        //             if(phone_error != null){
        //                 if(address1_error != null){
        //                     if(address2_error != null){
        //                         if(city_error != null){
        //                             if(country_error != null){
        //                                 if(pincode_error != null){
        //                                     alert("Yes");
        //                                 }
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }

        //     }
        // } else {
        //     alert("Null");
        // }

        if (
            fname_error == null ||
            lname_error == null ||
            email_error == null ||
            phone_error == null ||
            address1_error == null ||
            address2_error == null ||
            city_error == null ||
            country_error == null ||
            pincode_error == null
        ) {
            return false;
        } else {
            var data = {
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
                address1: address1,
                address2: address2,
                city: city,
                country: country,
                pincode: pincode,
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                method: "POST",
                url: "procced-to-pay",
                data: data,
                success: function (response) {
                    swal("Done Payment","success");
                },
            });
        }
    });
});
