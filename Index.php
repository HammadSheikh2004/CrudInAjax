<?php
include "Header.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="bg-primary shadow mt-3 mb-4 text-center rounded py-2 text-white">Insert Student Data</h2>
        </div>
        <div class="col-md-12">
            <a href="#AddData" class="btn btn-primary" data-toggle="modal">Add Data</a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AddData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="Query.php" method="POST" id="user_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="type">
                    <button type="button" id="add-btn" class="btn btn-Close">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $("#add-btn").on("click", function() {

            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var city = $("#city").val();

            $.ajax({
                url: "Query.php",
                type: "POST",
                data: {
                    name_key: name,
                    email_key: email,
                    phone_key: phone,
                    city_key: city,
                },
                success: function() {
                    $("#name").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#city").val('');
                }
            });

        });


    });
</script>

<?php include "Footer.php" ?>