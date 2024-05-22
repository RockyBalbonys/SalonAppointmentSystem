<?php
    include "connection.php";  
    include "sessions.php";
    if (!isset($_SESSION["admin_username"])) {
        header("Location: 404.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #fcf0e1;
        margin-top: 20px;
        margin-bottom: 20px;

    }

    .sidebar {
        background-color: #f8d7da; 
        min-height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px; 
        padding: 20px;
    }

    .sidebar a {
        display: block;
        margin-bottom: 40px;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }


 
    .logo{
        font-family: 'Lucida Calligraphy', cursive;
        margin-top: 20px; 
        margin-bottom: 30px;
        color: #381d1a;
        font-weight: 600;
        font-size: 20px;
        margin-left: 10px; 
    }



    </style>
</head>
<body>
    <div class="sidebar">
            <div class="logo">recover.hair</div>
            <hr style="border: 1px solid black;">
                    <ul class="nav flex-column mt-4">
                        <li class="nav-item text-dark">
                            <a class="nav-link text-dark fw-bold" href="adminpage.php">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="messages.php">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="history.php">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fw-bold" href="content.php">Content</a>
                        </li>
                        <li class="nav-item ms-2 d-none d-md-inline">
                            <a class="btn btn-dark" href="logout.php">Log Out</a>
                        </li>
                    </ul>
            </div>      
        </nav>
        <div class= "content">
        <div class="text-center mt-5">
            <h2>Edit Content</h2>
            <form method="POST">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Content..." id="floatingTextarea" style="height: 100px" name="inputAboutContent"></textarea>
                    <label for="floatingTextarea">Update About Content</label>
                    <input type="submit">
                    <?php
                        if (isset($_POST["inputAboutContent"])) {
                            $inputAboutContent = $_POST["inputAboutContent"];
                            $edit = "UPDATE `tbl_content_about` SET `content`='$inputAboutContent'";
                            
                            if (mysqli_query($conn, $edit)) {
                                echo "<script>alert('About Content Updated Successfully');</script>";
                            } else {
                                echo "<script>alert('About Content Not Updated');</script>";
                            }
                        }
                    ?>
                </div>
            </form>
            <div>
                <div>Edit Contact Info</div>
                <form method="POST">
                    <input type="text" name="editContactName" placeholder="Name...">
                    <input type="submit">
                    <?php
                        if (isset($_POST["editContactName"])) {
                            $editContactName = $_POST["editContactName"];
                            $editContact = "UPDATE `tbl_content_contact` SET `contact_info`='$editContactName' WHERE `contact` = 'name'"; 
                            if (mysqli_query($conn, $editContact)) {
                                echo "<script>alert('About Content Updated Successfully');</script>";
                            } else {
                                echo "<script>alert('About Content Not Updated');</script>";
                            }
                        }
                    ?>
                </form>
                <form method="POST">
                    <input type="text" name="editContactAddress" placeholder="Address...">
                    <input type="submit">
                    <?php
                        if (isset($_POST["editContactAddress"])) {
                            $editContactAddress = $_POST["editContactAddress"];
                            $editContact = "UPDATE `tbl_content_contact` SET `contact_info`='$editContactAddress' WHERE `contact` = 'address'"; 
                            
                            if (mysqli_query($conn, $editContact)) {
                                echo "<script>alert('About Content Updated Successfully');</script>";
                            } else {
                                echo "<script>alert('About Content Not Updated');</script>";
                            }
                        }
                    ?>
                </form>
                <form method="POST">
                    <input type="text" name="editContactNumber" placeholder="Number...">
                    <input type="submit">
                    <?php
                        if (isset($_POST["editContactNumber"])) {
                            $editContactNumber = $_POST["editContactNumber"];
                            $editContact = "UPDATE `tbl_content_contact` SET `contact_info`='$editContactNumber' WHERE `contact` = 'number'"; 
                            
                            if (mysqli_query($conn, $editContact)) {
                                echo "<script>alert('About Content Updated Successfully');</script>";
                            } else {
                                echo "<script>alert('About Content Not Updated');</script>";
                            }
                        }
                    ?>
                </form>
                <form method="POST">
                    <input type="text" name="editContactEmail" placeholder="Email...">
                    <input type="submit">
                    <?php
                        if (isset($_POST["editContactEmail"])) {
                            $editContactEmail = $_POST["editContactEmail"];
                            $editContact = "UPDATE `tbl_content_contact` SET `contact_info`='$editContactEmail' WHERE `contact` = 'email'"; 
                            if (mysqli_query($conn, $editContact)) {
                                echo "<script>alert('About Content Updated Successfully');</script>";
                            } else {
                                echo "<script>alert('About Content Not Updated');</script>";
                            }
                        }
                    ?>
                </form>
            </div>  
        </div>
    </div>
<div class= "content">
    <div class="text-center mt-5">
    <h2>Services</h2>
    <table class="table table-striped">
        <thead>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                    <th class="service-status">Active</th>
                    <th>Edit Photo</th>
                    <th>Actions</th>
                </tr>
        </thead>
        <tbody>
                <?php
                    // Query to fetch services data
                    $query = "SELECT * FROM tbl_booking_services";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $serviceID = $row['service_id'];
                        $serviceName = $row['service'];
                        $serviceCost = $row['service_cost'];
                        $isActive = $row['isActive'];
                ?>
                <tr data-service-id="<?= $serviceID ?>">
                    <form class="update-service-form" method="post" action="update_service.php">
                        <input type="hidden" class="service-id-input" name="service_id" value="<?= $serviceID ?>">
                        <td>
                            <span class="service-name-view"><?= $serviceName ?></span>
                            <input type="text" class="service-name-edit form-control form-control-sm d-none" value="<?= $serviceName ?>">
                            <input type="hidden" class="service-name-input" name="service_name" value="">
                        </td>
                        <td>
                            <span class="service-cost-view"><?= $serviceCost ?></span>
                            <input type="number" class="service-cost-edit form-control form-control-sm d-none" value="<?= $serviceCost ?>">
                            <input type="hidden" class="service-cost-input" name="service_cost" value="">
                        </td>
                        <td class="service-status"><?= $isActive ? 'Yes' : 'No' ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm edit-photo">Edit Photo</button>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm edit-service">Edit</a>
                            <button type="button" class="btn btn-sm <?= $isActive ? 'btn-danger' : 'btn-success' ?> toggle-service"><?= $isActive ? 'Deactivate' : 'Activate' ?></button>
                            <button type="button" class="btn btn-danger btn-sm delete-service" data-service-id="<?= $serviceID ?>" data-service-name="<?= $serviceName ?>">Delete</button>
                        </td>
                    </form>
                </tr>
                <?php
                    }
                ?>
            </tbody>
    </table>

    <!-- Add Service Button -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addServiceModal">Add Service</button>

</div>

<!-- Delete Service Modal -->
<div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceModalLabel">Delete Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span class="service-name-to-delete"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger confirm-delete-service">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- edit photo modal -->
<div class="modal fade" id="editPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPhotoModalLabel">Edit Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editPhotoForm" method="post" action="edit_photo.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" class="service-id-input" name="service_id" value="">
                        <div class="form-group">
                            <label for="servicePhoto">Service Photo</label>
                            <input type="file" class="form-control-file" id="servicePhoto" name="service_photo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $('.edit-photo').on('click', function(){
                var serviceID = $(this).closest('tr').data('service-id');
                $('#editPhotoModal').modal('show');
                $('.service-id-input').val(serviceID);
            });
        // Delete Service Button Clicked
        $('.delete-service').on('click', function(){
            var serviceID = $(this).data('service-id');
            var serviceName = $(this).data('service-name');
            $('.service-name-to-delete').text(serviceName);
            $('#deleteServiceModal').modal('show');
            $('.confirm-delete-service').data('service-id', serviceID);
        });

        // Confirm Delete Service
        $('.confirm-delete-service').on('click', function(){
            var serviceID = $(this).data('service-id');
            // AJAX call to delete service
            $.ajax({
                type: 'POST',
                url: 'delete_service.php',
                data: {service_id: serviceID},
                success: function(response){
                    if(response == 'success'){
                        $('#deleteServiceModal').modal('hide');
                        // Reload the page or remove the deleted row
                        // location.reload();
                        $('tr[data-service-id="' + serviceID + '"]').remove();
                    } else {
                        alert('Failed to delete service');
                    }
                }
            });
        });
    });
</script>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addServiceForm" method="post" action="add_service.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="serviceName">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="service_name">
                    </div>
                    <div class="form-group">
                        <label for="serviceCost">Service Cost</label>
                        <input type="number" class="form-control" id="serviceCost" name="service_cost">
                    </div>
                    <div class="form-group">
                        <label for="serviceImage">Image</label>
                        <input type="file" class="form-control-file" id="serviceImage" name="service_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </div>
            </form>

        </div>
    </div>
</div>



    <script>
        $(document).ready(function() {
            var editingRow = null; // Track currently editing row

            // Handle click event on edit buttons with class "edit-service"
            $(document).on('click', '.edit-service', function(e) {
                e.preventDefault();

                var currentRow = $(this).closest('tr');

                if (editingRow === currentRow) { // If already editing, save changes
                    saveService(currentRow);
                } else { // If not editing, enter edit mode
                    if (editingRow) {
                        saveService(editingRow); // Save changes in previous row if any
                    }
                    editingRow = currentRow;
                    toggleEditMode(currentRow, true);
                }
            });

            // Handle click event on toggle-service buttons
            $(document).on('click', '.toggle-service', function(e) {
                e.preventDefault();
                var currentButton = $(this);
                var currentRow = currentButton.closest('tr');
                var serviceId = currentRow.data('service-id');
                var isActive = currentButton.hasClass('btn-success') ? 0 : 1;

                // Send AJAX request to toggle service status
                $.ajax({
                    url: 'toggle_service.php',
                    type: 'POST',
                    dataType: 'json', // Specify the data type of the response
                    data: { service_id: serviceId },
                    success: function(response) {
                        if (response.success) {
                            currentButton.toggleClass('btn-success btn-danger').text(response.isActive ? 'Deactivate' : 'Activate');
                            if (response.isActive) {
                                currentRow.find('.service-status').html('<span class="text-success">Yes</span>');
                            } else {
                                currentRow.find('.service-status').html('<span class="text-danger">No</span>');
                            }
                        } else {
                            console.error('Error toggling service status:', response.message);
                            // Handle toggle errors (optional)
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                        // Handle AJAX request errors (optional)
                    }
                });
            });

            function toggleEditMode(row, isEdit) {
                row.find('.service-name-view, .service-cost-view').toggleClass('d-none');
                row.find('.service-name-edit, .service-cost-edit').toggleClass('d-none');
                row.find('.edit-service').text(isEdit ? 'Save' : 'Edit');
            }

            function saveService(row) {
                var serviceId = row.data('service-id');
                var serviceName = row.find('.service-name-edit').val();
                var serviceCost = row.find('.service-cost-edit').val();

                // Update the form values
                row.find('.service-id-input').val(serviceId);
                row.find('.service-name-input').val(serviceName);
                row.find('.service-cost-input').val(serviceCost);

                // Submit the form
                row.find('.update-service-form').submit();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
    }
?>
