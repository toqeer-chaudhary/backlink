
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
                       if (form.classList.contains("createProjectForm")) {
                           var formData = new FormData(this);
                           var url = "/project";
                           storeProject(formData, url);

                       } else if (form.classList.contains("createLinkForm")){
                           var formData = new FormData(this);
                           var url = "/link";
                           storeLink(formData, url);
                       }
                        //    Edit Process
                         else if (form.classList.contains("editProjectForm")) {
                           var formData     = new FormData(this);
                            var projectId   = $("#projectId").val();
                            var url         = "/project/" + projectId;
                            // loadingFunction();
                            updateProject(formData,url);
                        } else if (form.classList.contains("editLinkForm")) {
                            var formData  = new FormData(this);
                            var linkId = $("#linkId").val();
                            var url = "/link/" + userId;
                            updateLink(formData, url);
                        }

                    }

                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


    // deleting process
    $(document).on("click",".deleteProject",function () {
        var projectId =  $(this).data("id");

        swal({
            title: "Alert",
            text: "Are you sure",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : 'project/' + projectId,
                    method: 'delete',
                    data : {_token:token},
                    success: function (response) {
                        $("#project"+projectId).fadeOut('slow');
                        $.toaster({ message : 'Project Deleted', priority : 'danger' });
                    }
                });
            }
        })
    });

    // editing tag,status,reason,category modal  process
    $(document).on("click",".editProject",function () {
        var projectId          = $(this).data("id");         // fetching the project id
        var projectTitle       =  $(this).closest('tr')["0"].cells["1"].innerHTML;  // fetching the Project Name
        var projectDescription =  $(this).closest('tr')["0"].cells["2"].innerHTML;  // fetching the Project Description
        var projectLink        =  $(this).closest('tr')["0"].children[3].innerText;  // fetching the Project Link
        var CategoryId         =  $(this).closest('tr')["0"].children[4].id;  // fetching the role icon

        $("#projectId").val(projectId);
        $("#editProjectTitle").val(projectTitle);
        $("#editProjectDescription").val(projectDescription);
        $("#editProjectUrl").val(projectLink);
        $("#editProjectCategory").val(CategoryId);

    });

    // storing process
    function storeProject(formData,action) {
        $("#createProjectModal").modal("hide");
        $.ajax({
            url : action,
            type : "post",
            data : formData,
            processData: false,
            contentType: false,
            success : function (response) {
                $.toaster({ message : 'Project Created Successfully', priority : 'success' });
                setTimeout(function() {
                    // wait for toaster message then load page after 2 second
                    window.location.href = "/project" ;
                }, 1000);
            }
        });
    }

    // editing  process
    function updateProject(formData,action) {
        $("#editProjectModal").modal("hide");
        $.ajax({
            url : action,
            type : "post",
            data : formData,
            processData: false,
            contentType: false,
            success : function (response) {
                $.toaster({ message : 'Project Updated Successfully', priority : 'info' });
                setTimeout(function() {
                    // wait for toaster message then load page after 50 milli second
                    window.location.href = "/project" ;
                }, 1000);
            }
        });
    }

});