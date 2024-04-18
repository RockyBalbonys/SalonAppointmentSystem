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
                    <span class="fw-bold text-dark align-center justify-content-start d-none d-md-inline">
                    Admin Page
                </span>
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
                            <input type="submit" name="" id="">
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
                            <input type="submit" name="" id="">
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
                            <input type="submit" name="" id="">
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
                            <input type="submit" name="" id="">
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

            </div>

            <div>
            

            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
<?php
    }
?>