<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Buyer_Preview.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="Loading.css" />
    <link rel="stylesheet" href="BoxContainer.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    <title>Preview</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    <?php include '../../Frontend/Navigation/navigation_bar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 mt-3 mb-3 ms-3 Details">
                <div class="Details-Header">
                    <h2>Trading With</h2>
                </div>

                <div class="Profile-Pic-Wrapper">
                    <img src="../Assets/Test_IMG_1.JPG" id="Profile-Pic" alt="Buyer Profile" class="Buyer-IMG">
                </div>

                <?php
                $Details = ["Username", "User ID", "Email", "Phone"];
                foreach ($Details as $Detail) {
                    echo "<h6>$Detail:</h6>";
                }
                ?>

                <div class="Details-2">
                    <div class="mb-3">
                        <label for="paidbox">Paid:</label>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="paidbox" name="paidbox" placeholder="$00.00" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="durationbox">Duration:</label>
                    </div>
                    <div class="mb-3">
                        <input type="date" id="durationbox" name="durationbox" placeholder="MM/DD/YYYY" readonly>
                    </div>
                    <button type="button" id="btn-contract" class="btn btn-secondary">View Contract</button>
                </div>
            </div>

            <div class="col-lg-9 mt-3 ms-4 BoxContainer">
                <h1>Preview</h1>
                <div class="mx-2 UploadBox" id="upload-preview">
                    <h5 class="text-white">Preview</h5>
                    <div id="preview-content" class="mt-3">
                        <p class="text-muted">Preview of the Digital Product will appear here.</p>
                    </div>
                </div>
                <div class="mt-2">
                    <label for="file-title">Title</label>
                    <input type="text" id="file-title" class="form-control" placeholder="File title here" readonly />
                </div>

                <div class="mt-2">
                    <label for="file-size">Size</label>
                    <input type="text" id="file-size" class="form-control" placeholder="File size here" readonly />
                </div>

                <div class="mt-2">
                    <label for="file-type">Type</label>
                    <input type="text" id="file-type" class="form-control" placeholder="File type here" readonly />
                </div>

                <div class="mb-3">
                    <label for="user-paragraph" class="form-label">Notes:</label>
                    <textarea id="user-paragraph" class="form-control" rows="6" placeholder="Additional notes or details here..." readonly></textarea>
                </div>
                <div class="buttons d-flex">
    <button type="button" id="btn-decline" class="btn btn-secondary me-2">Decline</button>
    <button type="button" id="btn-trade" class="btn btn-success">Trade</button>
</div>
            </div>

        </div>
    </div>
</body>

</html>
