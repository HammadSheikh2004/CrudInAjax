<?php
include "Header.php";
?>

<style>
    #modal {
        background-color: rgb(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
    }

    #modal #modal-form {
        background-color: #fff;
        width: 40%;
        height: auto;
        position: relative;
        top: 10%;
        left: calc(50% - 15%);
        padding: 15px;
        border-radius: 4px;
    }

    #modal #modal-form #close-btn {
        background-color: red;
        color: #fff;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top: -15px;
        left: -15px;
        cursor: pointer;
    }
</style>


<div class="container my-3">
    <div class="row">

        <div class="col-md-12">
            <h2 class="bg-primary shadow mt-3 mb-4 text-center rounded py-2 text-white">Display Student Data</h2>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="utitle">Search Data</label>
                <input type="text" id="search" class="form-control">
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="dataTable">
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div id="modal" style="display: none;">
                <div id="modal-form">
                    <h2 class="bg-primary shadow mt-3 mb-4 text-center rounded py-2 text-white">Update Student Data</h2>
                    <div id="updateForm">
                        <div class="modal-body">
                        </div>
                    </div>
                    <div id="close-btn">X</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script For Select Data
    $(document).ready(function() {
        function loadTable() {
            $.ajax({
                url: "SelectQuery.php",
                type: "Post",
                success: function(mydata) {
                    $("#dataTable").html(mydata);
                }
            });
        }
        loadTable();

        // Script For Open Modal
        $(document).on("click", ".edit-btn", function() {
            $("#modal").show();

            // Script For FetchUpdate Data
            var studentId = $(this).data("eid");
            $.ajax({
                url: "updateForm.php",
                type: "POST",
                data: {
                    id: studentId
                },
                success: function(updateData) {
                    $("#modal #updateForm").html(updateData);
                }
            })
        });

        // Script For UpdatingData
        $(document).on("click", "#updateBtn", function() {
            var id = $("#edit_id").val();
            var name = $("#edit_name").val();
            var email = $("#edit_email").val();
            var phone = $("#edit_phone").val();
            var city = $("#edit_city").val();
            $.ajax({
                url: "updateQuery.php",
                type: "POST",
                data: {
                    stuId: id,
                    stuName: name,
                    stuEmail: email,
                    stuPhone: phone,
                    stuCity: city
                },
                success: function(data) {
                    if (data == 1) {
                        $("#modal").hide();
                        loadTable();
                    }
                }
            });
        });

        // Script For Delete Data
        $(document).on("click", ".delete-btn", function() {
            if (confirm("Do You Want To Really Delete This Data")) {
                var studentId = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "deleteQuery.php",
                    type: "POST",
                    data: {
                        id: studentId
                    },
                    success: function(deleteData) {
                        if (deleteData == 1) {
                            $(element).closest("tr").fadeOut();
                        } else {
                            alert("Data Can't Deleted");
                        }
                    }
                });
            };
        });

        // Script For Close Modal
        $("#close-btn").on("click", function() {
            $("#modal").hide();
        });

        // Script For Live Search
        $("#search").on("keyup",function(){
            var search_term = $(this).val();
            
            $.ajax({
                url : "liveSearch.php",
                method : "POST",
                data : {
                    search : search_term
                },
                success : function(data){
                    $("#dataTable").html(data)
                }
            });            
        });

    });
</script>


<?php
include "Footer.php";
?>