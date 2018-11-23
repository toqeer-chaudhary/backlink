$(document).ready(function () {

    // loader plugin initialization
    function loadingOut(loading) {
        setTimeout(() => loading.out(), 3000);
    }

    // function to call loading function

    function loadingFunction() {
        var loading = new Loading();
        loadingOut(loading);
    }
// Example starter JavaScript for disabling form submissions if there are invalid fields
// globally form submission
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {


                    event.preventDefault();
                    event.stopPropagation();
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // looking form a particular's form claas to call a relative function
                        if (form.classList.contains("loginForm"))  {
                            var formData = new FormData(this);
                            loginRequest(formData);
                        } else if (form.classList.contains("updatePostForm")) {
                            var formData = new FormData(this);
                            var $postId = $("#updatePost").val();
                            updatePost(formData,$postId);
                        }

                    }

                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    // retrieve user info
    $(document).on("click","#user_info",function () {
        var userId = $(this).data("id");
        $.ajax({
           url:"/user/"+userId,
           method:"get",
           success:function (response) {
               console.log(response);
               $("#userImage").attr("src", "/assets/backend/images/user/"+response.image);
               $("#userName").text("Name :" + capitalizeFirstLetter(response.name));
               $("#userEmail").text("Email :" + response.email);
               // intentionally passing the edit route
               $("#userPostLink").attr("href","/user/"+userId+"/edit");
               $("#userPostLink").text(response.posts + " Posts");
           }
        });
    });

    $(document).on("click","#scrollComments",function () {
        $('html, body').animate({ scrollTop: 200 }, "slow");
    });

    // update post
    // function  updatePost(formData,postId) {
    //     var token  = $('input[type="hidden"]').val();
    //     $.ajax({
    //         url : "/post/"+postId,
    //         type : "post",
    //         data : formData,
    //         processData: false,
    //         contentType: false,
    //         success : function (success) {
    //             console.log("hello");
    //             // window.location.href="/login";
    //         }
    //     })
    // }

    // making first letter capital
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
});

