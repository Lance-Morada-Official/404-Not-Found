<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/cropperjs"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../Navigation/navigation_bar.css">
    <title>Profile</title>
</head>
<body class="vh-100 overflow-hidden">
<?php 
require('..\..\Frontend\Navigation\navigation_bar.php');
require('..\..\Backend\include\session-include.php');
	require('..\..\Backend\include\dbconnect-include.php');
	require('..\..\Backend\Search\searchbackend.php');

$connect->close();
?>
<div class="container-fluid vh-100">
    <div class="row h-100 g-0">
        <div class="col-lg-3">
            <div class="card shadow-sm p-3 mb-5 bg-white">
                <div class="text-center mb-3 position-relative profile-container">
                    <img src="profile_pics/<?php echo $user_id; ?>.jpg?<?php echo time(); ?>" alt="Profile Picture" class="profile-picture">

                    <div class="edit-overlay d-flex justify-content-center align-items-center">
                        <i class="bi bi-pencil-fill text-white"></i>
                    </div>
                    <input type="file" id="profilePicInput" class="d-none" accept="image/*">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>User ID:</strong> <?php echo $user_id; ?></li>
                    <li class="list-group-item"><strong>Username:</strong> <?php echo $user_name; ?></li>
                    <li class="list-group-item"><strong>Firstname:</strong> <?php echo $first_name; ?></li>
                    <li class="list-group-item"><strong>Lastname:</strong> <?php echo $last_name; ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                    <li class="list-group-item"><strong>Phone Number:</strong> <?php echo $phone_num; ?></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 HistoryContainer d-flex flex-column">
            <div class="table-responsive flex-grow-1 overflow-auto">
                <table class="table table-striped table-dark mb-0">
                    <thead>
                        <tr>
                            <th>Trade Partner</th>
                            <th>Trade Partner ID</th>
                            <th>Action</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable-row" data-url="details.php?id=12345">
                            <td>John Doe</td>
                            <td>12345</td>
                            <td>Buy</td>
                            <td>$100</td>
                            <td><span class="badge bg-success">Success</span></td>
                        </tr>
                        <tr class="clickable-row" data-url="details.php?id=67890">
                            <td>Jane Smith</td>
                            <td>67890</td>
                            <td>Sell</td>
                            <td>$200</td>
                            <td><span class="badge bg-warning text-dark">On-Going</span></td>
                        </tr>
                        <tr class="clickable-row" data-url="details.php?id=11223">
                            <td>Michael Brown</td>
                            <td>11223</td>
                            <td>Buy</td>
                            <td>$150</td>
                            <td><span class="badge bg-danger">Failed</span></td>
                        </tr>
                        <tr>
                            <td colspan="5">No more transactions available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for cropping -->
<div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Adjust Profile Picture</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="crop-container">
                    <img id="imageToCrop" src="" alt="To Crop" class="w-100">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="cropAndUploadBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Button -->
<button id="logoutBtn" class="btn btn-danger position-fixed bottom-0 end-0 m-3">Logout</button>

<script>
    const profilePicInput = document.getElementById("profilePicInput");
    const imageToCrop = document.getElementById("imageToCrop");
    const cropModal = new bootstrap.Modal(document.getElementById("cropModal"));
    const cropAndUploadBtn = document.getElementById("cropAndUploadBtn");
    let cropper;

    document.querySelector(".edit-overlay").addEventListener("click", () => {
        profilePicInput.click();
    });

    profilePicInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imageToCrop.src = reader.result;
                cropModal.show();
                if (cropper) cropper.destroy();
                cropper = new Cropper(imageToCrop, { aspectRatio: 1, viewMode: 1 });
            };
            reader.readAsDataURL(file);
        }
    });

    cropAndUploadBtn.addEventListener("click", () => {
        const croppedCanvas = cropper.getCroppedCanvas({ width: 160, height: 160 });
        croppedCanvas.toBlob((blob) => {
            const formData = new FormData();
            formData.append("profile_pic", blob);

            fetch("upload_profile_pic.php", { method: "POST", body: formData })
                .then(response => response.text())
                .then(() => location.reload())
                .catch(error => console.error("Error:", error));
        });
    });

    document.getElementById("logoutBtn").addEventListener("click", () => {
    // Terminate the session by sending a request to a logout PHP script
    fetch('../../Backend/Logout.logout.php')
        .then(response => {
            // After the session is destroyed, redirect the user to the login page
            window.location.href = '../Login/LoginPage.php';
        })
        .catch(error => {
            console.error('Error logging out:', error);
        });
});

</script>
</body>
</html>
