<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="Seller_Contract.css" />
    <link rel="stylesheet" href="Details.css" />
    <link rel="stylesheet" href="BoxContainer.css" />
    <link rel="stylesheet" href="../Navigation/navigation_bar.css" />
    
    <title>Contract</title>
</head>

<body class="vh-100 overflow-hidden" style="font-family: 'Poppins', sans-serif; background-color: #161530;">
    
    <!-- Navigation Bar -->
    <?php 
	include '..\..\Frontend\Navigation\navigation_bar.php'; 
	include '..\..\Backend\include\sessionbuyer-include.php';
	include '..\..\Backend\include\dbconnect-include.php';
	include '..\..\Backend\Contract\Seller_View_Contract_Backend.php';
	?>

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
                    $Details = ["Username"=>"Username: $buyername", "User ID"=>"User ID: $buyerid", "Email"=>"Email Address: $buyeremail", "Phone"=>"Phone Number: $buyerphone"];
                    foreach ($Details as $Detail) {
                        echo "<h6>$Detail</h6>";
                    }
                ?>
            </div>
		
            <div class="col-lg-9 mt-3 ms-4 BoxContainer">
			
                <div id="Top-Form" class="form-container row">
				
                    <div class="form-item">
			<form method="post" >
                        <label for="paidbox">Paid</label>
                        <input type="number" id="paidbox" name="paidbox" value="<?php echo $payment ?>" readonly>
                    </div>

                    <div class="form-item">
                        <label for="durationbox">Duration:</label>
                        <input type="date" id="durationbox" name="durationbox" value="<?php echo $duration ?>" readonly>
                    </div>
                </div>

                <div id="Bottom-Form" class="form-container row mt-3">
                    <div class="col-12 form-item mt-3">
                        <label for="projectdetails">Project Details:</label>
                        <textarea id="projectdetails" name="projectdetails" rows="4" placeholder="" class="form-control" readonly><?php echo $projectdetails ?></textarea>
                    </div>

                    <div class="col-12 form-item mt-3">
                        <label for="intellectualproperty">Intellectual Property:</label>
                        <textarea id="intellectualproperty" name="intellectualproperty" rows="4" placeholder="" class="form-control" readonly><?php echo $intellectualproperty ?></textarea>
                    </div>

                    <div class="col-12 form-item mt-3">
                        <label for="notes">Notes:</label>
                        <textarea id="notes" name="notes" rows="4" placeholder="" class="form-control" readonly><?php echo $notes ?></textarea>
                    </div>
                </div>
            
                <!-- Buttons Section -->
                <button name="action" type="submit" value="send" id="btn-Action" class="btn btn-success" style="display: none;">Send</button>
				
				<button id="btn-edit" class="btn btn-primary pencil-btn" type="button">
				<i class="bi bi-pencil fs-4"></i>
				</button>
				
				<button  id="btn-save" class="btn btn-success" name="action" value="save" style="display: none;">Save</button>
				<button id="btn-cancel" class="btn btn-danger" type="button" style="display: none;">
				<i class="bi bi-x fs-4"></i>
				</button>
				<button id="btn-accept" class="btn btn-success"  name="action" value="accept" style="display: inline-block;">Accept</button>

			</form>
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.getElementById("btn-edit");
    const saveButton = document.getElementById("btn-save");
    const cancelButton = document.getElementById("btn-cancel");
    const actionButton = document.getElementById("btn-Action");
    const acceptButton = document.getElementById("btn-accept");
    const formElements = document.querySelectorAll(
        "#paidbox, #durationbox, #projectdetails, #intellectualproperty, #notes"
    );
    let editMode = false;
    let formChanged = false;
    let originalValues = {}; // To store the original form values

    // Initially disable form elements
    toggleFormElements(false); // Disable form fields initially
    saveButton.style.display = "none"; // Hide Save button initially
    cancelButton.style.display = "none"; // Hide Cancel button initially
    actionButton.style.display = "none"; // Hide Action button initially
    acceptButton.style.display = "inline-block"; // Show Accept button initially

    // Save original form values
    saveOriginalValues();

    // Toggle Edit Button Functionality
    editButton.addEventListener("click", () => {
        if (editMode) {
            // Switch to non-editing mode (Cancel)
            toggleFormElements(false); // Disable form fields
            editButton.innerHTML = '<i class="bi bi-pencil fs-4"></i>'; // Change button to pencil
            saveButton.style.display = "none"; // Hide Save button
            cancelButton.style.display = "none"; // Hide Cancel button
            actionButton.style.display = formChanged ? "inline-block" : "none"; // Show Send button if changes were made
            acceptButton.style.display = !formChanged ? "inline-block" : "none"; // Show Accept button if no changes

            // Discard changes if cancel button is pressed
            if (!formChanged) {
                restoreOriginalValues();
            }
        } else {
            // Switch to editing mode (Enable form fields)
            toggleFormElements(true); // Enable form fields
            editButton.innerHTML = '<i class="bi bi-x fs-4"></i>'; // Change button to X (cancel icon)
            saveButton.style.display = "inline-block"; // Show Save button
            cancelButton.style.display = "inline-block"; // Show Cancel button
            actionButton.style.display = "none"; // Hide Send button in edit mode
            acceptButton.style.display = "none"; // Hide Accept button during edit mode
        }
        editMode = !editMode; // Toggle edit mode
    });

    // Track changes in the form to know when to show "Send"
    formElements.forEach((element) => {
        element.addEventListener("input", () => {
            formChanged = true;
            // Update action button visibility based on editing status
            actionButton.style.display = !editMode && formChanged ? "inline-block" : "none"; // Show Send button only outside edit mode and if changes were made
            acceptButton.style.display = !editMode && !formChanged ? "inline-block" : "none";  // Show Accept button if no edit mode and no changes
        });
    });

    // Function to enable/disable form elements
    function toggleFormElements(enable) {
        formElements.forEach((element) => {
            element.readOnly = !enable;
        });
    }

    // Save the original values before editing
    function saveOriginalValues() {
        formElements.forEach((element) => {
            originalValues[element.id] = element.value;
        });
    }

    // Restore the original values after canceling edit
    function restoreOriginalValues() {
        formElements.forEach((element) => {
            element.value = originalValues[element.id];
        });
    }

    // Action button "Save" functionality
    saveButton.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent the form submission that causes a page reload

        // Save changes (you can send them to the server or process here)
        console.log("Changes saved", {
            paidbox: document.getElementById("paidbox").value,
            durationbox: document.getElementById("durationbox").value,
            projectdetails: document.getElementById("projectdetails").value,
            intellectualproperty: document.getElementById("intellectualproperty").value,
            notes: document.getElementById("notes").value
        });

        // After saving, revert to "Send" state and disable edit mode
        toggleFormElements(false);
        editButton.innerHTML = '<i class="bi bi-pencil fs-4"></i>';
        saveButton.style.display = "none";
        cancelButton.style.display = "none";

        // Show Send button if changes were made, otherwise show Accept button
        actionButton.style.display = formChanged ? "inline-block" : "none";
        acceptButton.style.display = formChanged ? "none" : "inline-block"; // Show Accept button if no changes were made

        editMode = false;
        formChanged = false; // Reset the form changed flag
    });

    // Action button "Cancel" functionality
    cancelButton.addEventListener("click", () => {
        // Discard changes and restore original values
        restoreOriginalValues();

        // Switch back to Accept button view
        toggleFormElements(false);
        editButton.innerHTML = '<i class="bi bi-pencil fs-4"></i>';
        saveButton.style.display = "none";
        cancelButton.style.display = "none";
        actionButton.style.display = "none";
        acceptButton.style.display = "inline-block";
        editMode = false;
        formChanged = false;
    });
});
    </script>
</body>
</html>
