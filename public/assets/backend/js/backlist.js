
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

    // csrf token
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
                       if (form.classList.contains("createCategoryForm")) {
                           var categoryName = $("#createCategoryName").val();
                           var url = "/admin/category";
                           storeCategory(categoryName, url);

                       } else if (form.classList.contains("createPostForm")) {
                            var formData    = new FormData(this);
                            var url         = "/admin/post";
                            storePost(formData,url)
                        } else if (form.classList.contains("createRoleForm")) {
                            var formData = new FormData(this);
                            var url = "/admin/role";
                            storeRole(formData, url)
                        //    Edit Process
                        } else if (form.classList.contains("editCategoryForm")) {
                            var categoryName = $("#updateCategoryName").val();
                            var categoryId   = $("#categoryId").val();
                            var url          = "/admin/category/" + categoryId  ;
                            updateCategory(categoryName,url,categoryId);
                        } else if (form.classList.contains("editPostForm")) {
                            var postId      = $("#postId").val();
                            var statusId    = $("#statusId").val();
                            var reasonId    = $("#reasonId").val();
                            var url         = "/admin/post/" + postId;
                            var formData = {_token:token, post_id:postId, reason_id:reasonId, status_id:statusId}
                            loadingFunction();
                            updatePost(formData,url);
                        } else if (form.classList.contains("editUserRoleForm")) {
                            var formData = new FormData(this);
                            var userId   = $("#user_id").val();
                            var url = "/admin/user/" + userId;
                            updateUser(formData, url);
                        }

                    }

                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


    // deleting tag,status,reason,category process
    $(document).on("click",".deleteCategory",function () {
        var categoryId =  $(this).data("id");

        swal({
            title: "Alert",
            text: "Are you sure",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : 'category/' + categoryId,
                    method: 'delete',
                    data : {_token:token},
                    success: function (response) {
                        $("#category"+categoryId).fadeOut('slow');
                        $.toaster({ message : 'Category Deleted', priority : 'danger' });
                    }
                });
            }
        })
    });
    $(document).on("click",".deletePost",function () {
        var postId =  $(this).data("id");

        swal({
            title: "Alert",
            text: "Are you sure",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : 'post/' + postId,
                    method: 'delete',
                    data : {_token:token},
                    success: function (response) {
                        $("#post"+postId).fadeOut('slow');
                        $.toaster({ message : 'Post Deleted', priority : 'danger' });
                    }
                });
            }
        })
    });

    // toggle user
    $(document).on("click",".toggleUser",function () {
        var userId = $(this).data("id");
        userToggle(userId);
    });
    // showing reason select tag on selecting status
    $(document).on("change","#statusId",function () {
       var statusId = $(this).val();
       if (statusId == 3) { // status is rejected
           $("#reasonDiv").removeClass("d-none");
       } else { // else
           $("#reasonDiv").addClass("d-none");
       }
    });

    // editing tag,status,reason,category modal  process
    $(document).on("click",".editCategory",function () {
        var categoryId = $(this).data("id");         // fetching the tag id
        var categoryName =  $(this).closest('tr')["0"].cells["1"].innerHTML;  // fetching the tag name

        $("#updateCategoryName").val(categoryName);   // putting the value inside the model
        $("#categoryId").val(categoryId);             // putting the value of tag id inside the hidden field of model
    });
    $(document).on("click",".editPost",function () {
        var postId    = $(this).data("id");         // fetching the post id
        var statusId =  $(this).closest('tr')["0"].cells["3"].innerHTML;  // fetching the status id
        var reasonId =  $(this).closest('tr')["0"].cells["4"].innerHTML;  // fetching the reason id
        $("#postId").val(postId);

        if (statusId == 3){
            $("#statusId").val(3);  // selecting status option
            $("#reasonDiv").removeClass("d-none"); // removing d-none class
            $("#reasonId").val(reasonId);  // selecting reason option
        } else {
            $("#reasonDiv").addClass("d-none"); // adding d-none class
            $("#statusId").val(statusId);  // selecting status option
        }
    });


    // storing tag,status,reason,category process
    function storeCategory(name, action) {
        $("#createCategoryModal").modal("hide");
        $.ajax({
            url : action,
            type : "post",
            data : {_token: token ,name : name},
            success : function (response) {
                $.toaster({ message : 'Category Created Successfully', priority : 'success' });
                setTimeout(function() {
                    // wait for toaster message then load page after 2 second
                    window.location.href = "/admin/category" ;
                }, 1000);
            }
        });
    }
    function storePost(formData,action) {
        $.ajax({
            url : action,
            type : "post",
            data : formData,
            processData: false,
            contentType: false,
            success : function (response) {
                $.toaster({ message : 'Post Created Successfully', priority : 'success' });
                setTimeout(function() {
                    // wait for toaster message then load page after 2 second
                    window.location.href = "/admin/post/create" ;
                }, 1000);
            }
        });
    }


    // editing tag,status,reason,category process
    function updateCategory(name, action, categoryId) {
        $("#editCategoryModal").modal("hide");
        $.ajax({
            url : action,
            type : "put",
            data : {_token: token ,name : name, categoryId : categoryId},
            success : function (response) {
                $.toaster({ message : 'Category Updated Successfully', priority : 'info' });
                setTimeout(function() {
                    // wait for toaster message then load page after 2 second
                    window.location.href = "/admin/category" ;
                }, 1000);
            }
        });
    }
    function updatePost(formData,action) {
        $.ajax({
            url : action,
            type : "put",
            data : formData,
            success : function (response) {
                $.toaster({ message : 'Post Status Updated Successfully', priority : 'success' });
                setTimeout(function() {
                    // wait for toaster message then load page after 50 milli second
                    window.location.href = "/admin/post" ;
                }, 2000);
            }
        });
    }
    function updateUser(formData, url) {
        $("#editUserRoleModal").modal("hide");
        $.ajax({
            url : url,
            type : "post",
            data : formData,
            processData: false,
            contentType: false,
            success : function (response) {
                $.toaster({ message : 'User Role Updated Successfully', priority : 'info' });
                setTimeout(function() {
                    // wait for toaster message then load page after 50 milli second
                    window.location.href = "/admin/user" ;
                }, 1000);
            }
        });
    }
    // Toggle user active or inactive
    function userToggle(userId) {
        $.ajax({
           url:"/admin/user/"+userId,
           method:"delete",
            data:{_token:token},
           success:function (response) {
               $.toaster({ message : 'User Status Changed Successfully', priority : 'success' });
               $("#userTable tr#user"+ userId+"")[0].children[4].innerHTML = response; // 1 or 0
           }
        });
    }

});