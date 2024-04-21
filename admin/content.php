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
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-lg">
                <span class="fw-bold text-dark align-center justify-content-start d-none d-md-inline">Admin Page</span>
                <div class="justify-content-end d-none d-sm-inline">
                    <ul class="nav justify-content-end">
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
            </div>      
        </nav>

        <div class="text-center mt-4 mb-4">
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

    <!-- Table for displaying services -->
    <div class="mt-4">
        <h2>Services</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                    <th class="service-status">Active</th>
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
                            <a href="#" class="btn btn-primary btn-sm edit-service">Edit</a>
                            <button type="button" class="btn btn-sm <?= $isActive ? 'btn-danger' : 'btn-success' ?> toggle-service"><?= $isActive ? 'Deactivate' : 'Activate' ?></button>
                        </td>
                    </form>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
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

</body>
</html>
<?php
    }
?>
