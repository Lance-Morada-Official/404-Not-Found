<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="Seller_Upload.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    
    <title>Upload</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    
    <!-- Navigation Bar -->
    <?php include '../../Frontend/Navigation/navigation_bar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            
            <!-- Left Column for Buyer Details -->
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

            <!-- Right Column for File Upload -->
            <div class="col-lg-9 mt-3 ms-4 Upload">
                <h1>Upload</h1>

                <div class="mx-2 UploadBox">
                    <label for="file-upload" class="btn btn-primary">Upload File</label>
                    <input type="file" id="file-upload" name="file-upload" style="display: none;" onchange="Display_File_Details()" />
                </div>

                <!-- File Title -->
                <div class="mt-2">
                    <label for="file-title">Title</label>
                    <input type="text" id="file-title" class="form-control" placeholder="No file selected" />
                </div>

                <!-- File Size -->
                <div class="mt-2">
                    <label for="file-size">Size</label>
                    <input type="text" id="file-size" class="form-control" readonly placeholder="No file selected" />
                </div>

                <!-- File Type -->
                <div class="mt-2">
                    <label for="file-type">Type</label>
                    <input type="text" id="file-type" class="form-control" readonly placeholder="No file selected" />
                </div>

                <!-- User Text Input -->
                <div class="mb-3">
                    <label for="user-paragraph" class="form-label">Notes:</label>
                    <textarea id="user-paragraph" class="form-control" rows="6" placeholder="Type your paragraph(s) here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="button" id="btn-submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        function Display_File_Details() {
            var file_name_input = document.getElementById("file-upload");
            var file = file_name_input.files[0];

            if (file) {
                var fileName = file.name;
                var fileSize = (file.size / (1024 * 1024)).toFixed(2) + " MB";
                var fileType = file.type;

                // Map MIME types to user-friendly file types
                var friendlyFileType = getFriendlyFileType(fileType);

                // Display details in the corresponding fields
                document.getElementById("file-title").value = fileName;
                document.getElementById("file-size").value = fileSize;
                document.getElementById("file-type").value = friendlyFileType;
            } else {
                document.getElementById("file-title").value = "No file selected";
                document.getElementById("file-size").value = "No file selected";
                document.getElementById("file-type").value = "No file selected";
            }
        }

        // Return a user-friendly file type name BTW RUSSEL NIGGA
        function getFriendlyFileType(fileType) {
            var typeMapping = {
                "image/png": "PNG Image",
                "image/jpeg": "JPEG Image",
                "image/gif": "GIF Image",
                "application/pdf": "PDF Document",
                "video/mp4": "MP4 Video",
                "text/plain": "Text File",
                "application/msword": "Microsoft Word Document",
                "application/vnd.ms-excel": "Microsoft Excel Document",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document": "Word Document (DOCX)",
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": "Excel Document (XLSX)"
            };

            // Return friendly name if found, else return MIME type
            return typeMapping[fileType] || fileType;
        }
    </script>

</body>

</html>
