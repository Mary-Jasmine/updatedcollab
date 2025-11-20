<?php

require_once 'config.php';
redirectIfNotLogged();

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $incident_type = sanitizeInput($_POST['incidentType']);
    $description = sanitizeInput($_POST['incidentDescription']);
    $location = sanitizeInput($_POST['incidentLocation']);
    $barangay = sanitizeInput($_POST['barangay']);
    $user_id = $_SESSION['user_id'];
    
    try {
        $query = "INSERT INTO incidents (user_id, incident_type, description, location, barangay) 
                  VALUES (:user_id, :incident_type, :description, :location, :barangay)";
        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':incident_type', $incident_type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':barangay', $barangay);
        
        if ($stmt->execute()) {
            $incident_id = $db->lastInsertId();
            
            // Handle file upload
            if (!empty($_FILES['fileUpload']['name'][0])) {
                $upload_dir = "uploads/incidents/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                foreach ($_FILES['fileUpload']['tmp_name'] as $key => $tmp_name) {
                    $file_name = basename($_FILES['fileUpload']['name'][$key]);
                    $file_path = $upload_dir . uniqid() . '_' . $file_name;
                    
                    if (move_uploaded_file($tmp_name, $file_path)) {
                        $file_query = "INSERT INTO incident_files (incident_id, file_name, file_path) 
                                       VALUES (:incident_id, :file_name, :file_path)";
                        $file_stmt = $db->prepare($file_query);
                        $file_stmt->bindParam(':incident_id', $incident_id);
                        $file_stmt->bindParam(':file_name', $file_name);
                        $file_stmt->bindParam(':file_path', $file_path);
                        $file_stmt->execute();
                    }
                }
            }
            


            
            $success = "Incident report submitted successfully! Your incident ID is: #" . str_pad($incident_id, 5, '0', STR_PAD_LEFT);
        }
    } catch(PDOException $e) {
        $error = "Failed to submit report: " . $e->getMessage();
    }
}

$user_incidents_query = "SELECT * FROM incidents WHERE user_id = :user_id ORDER BY submitted_at DESC";
$user_incidents_stmt = $db->prepare($user_incidents_query);
$user_incidents_stmt->bindParam(':user_id', $_SESSION['user_id']);
$user_incidents_stmt->execute();
$user_incidents = $user_incidents_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Report - Municipality Incident Reporting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-page">

    <?php include 'header.php'; ?>

    <div class="report-container">

   
        <div class="report-content">
            <header class="page-header">
                <h1>Submit Report</h1>
            </header>
            
            <div class="report-section">
                <div class="section-card">
                    <h2>Submit New Incident Report</h2>
                    <p class="section-subtitle">Please provide details about the incident you wish to report.</p>
                    
                    <?php if (isset($success)): ?>
                        <div class="success-message" style="color: green; margin-bottom: 15px;"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($error)): ?>
                        <div class="error-message" style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form class="incident-form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="incidentType">Incident Type</label>
                            <select id="incidentType" name="incidentType" required>
                                <option value="">Select incident type</option>
                                <option value="road-hazard">Road Hazard</option>
                                <option value="waste-management">Waste Management</option>
                                <option value="public-safety">Public Safety</option>
                                <option value="infrastructure">Infrastructure Damage</option>
                                <option value="traffic">Traffic Congestion</option>
                                <option value="environmental">Environmental Issue</option>
                                <option value="emergency">Emergency</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="incidentDescription">Detailed Description</label>
                            <textarea id="incidentDescription" name="incidentDescription" rows="5" 
                                placeholder="Describe the incident, its location, specific details, and any other relevant information." required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="incidentLocation">Location</label>
                            <input type="text" id="incidentLocation" name="incidentLocation" 
                                placeholder="Enter the specific location of the incident" required>
                        </div>
                        
        <div class="form-group">
            <label for="incidentLocation">
                <button type="button" id="getLocationBtn"
                    style="margin-left:8px; padding:3px 8px; font-size:11px; cursor:pointer;
                           border:1px solid #b92c2cff; border-radius:4px; background:#f0f0f0;">
                    Use My Current Location
                </button>
            </label>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority" required>
                <option value="">Select priority</option>
                <option value="Low">Low</option>
                <option value="Normal">Normal</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
            </select>
        </div>



                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <input type="text" id="barangay" name="barangay" 
                                placeholder="Enter your barangay" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="fileUpload">Upload Photos/Videos (Optional)</label>
                            <div class="file-upload-area" style="max-width:650px;height: 8p%">
                                <input type="file" id="fileUpload" name="fileUpload[]" multiple accept="image/*,video/*">
                                <div class="upload-placeholder">
                                    <span class="upload-icon">📁</span>
                                    <span class="upload-text">Select Files</span>
                                    <span class="upload-subtext">No files chosen</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="clear-btn" onclick="clearForm()">Clear Form</button>
                            <button type="submit" class="submit-btn">Submit Report</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="history-section">
                <div class="section-card">
                    <h2>My Incident Report History</h2>
                    <p class="section-subtitle">View and track the status of your submitted incident reports.</p>
                    
                    <div class="history-table-container">
                        <table class="history-table">
                            <thead>
                                <tr>
                                    <th>Incident ID</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date Submitted</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_incidents as $incident): ?>
                                <tr>
                                    <td>#<?php echo str_pad($incident['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                    <td><?php echo ucfirst(str_replace('-', ' ', $incident['incident_type'])); ?></td>
                                    <td>
                                        <span class="status-badge <?php echo $incident['status']; ?>">
                                            <?php echo ucfirst($incident['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('Y-m-d', strtotime($incident['submitted_at'])); ?></td>
                                    <td><?php echo $incident['location']; ?></td>
                                    <td>
                                        <button class="action-btn" onclick="viewIncident(<?php echo $incident['id']; ?>)">👁️</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="history-footer">
                        <p>Total Reports: <?php echo count($user_incidents); ?></p>
                    </div>
                                                    <!-- INCIDENT PREVIEW MODAL -->
                            <div id="incidentModal" class="modal" style="display:none;">
                                <div class="modal-content" style="max-width:650px;height: 80%;">
                                    <span class="close" onclick="closeIncidentModal()">&times;</span>

                                    <h2 style="margin-bottom:15px;">Incident Report Details</h2>

                                    <div id="modalBody" style="line-height:1.6;">
                                        Loading...
                                    </div>
                                </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
document.getElementById("getLocationBtn").addEventListener("click", function () {
    const btn = document.getElementById("getLocationBtn");
    const input = document.getElementById("incidentLocation");

    if (!navigator.geolocation) {
        alert("Your device doesn't support location access.");
        return;
    }

    btn.textContent = "Retrieving…";
    btn.disabled = true;

    navigator.geolocation.getCurrentPosition(
        async function (pos) {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;

            try {
                const url =
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
                
                const response = await fetch(url, {
                    headers: {
                        "User-Agent": "IncidentReportingSystem/1.0"
                    }
                });

                const data = await response.json();
                let fullAddress = "";

                if (data && data.address) {
                    const adr = data.address;

                    // Build final readable address
                    fullAddress = [
                        adr.road,
                        adr.neighbourhood,
                        adr.suburb,
                        adr.village,
                        adr.barangay,
                        adr.town,
                        adr.city,
                        adr.county,
                        adr.state
                    ].filter(Boolean).join(", ");

                    input.value = `${fullAddress} (${lat.toFixed(6)}, ${lng.toFixed(6)})`;
                } else {
                    input.value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                }

                btn.textContent = "Location Added ✔";
                btn.disabled = false;

            } catch (error) {
                alert("Location found but address details unavailable.");
                input.value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;
                btn.textContent = "Use My Current Location";
                btn.disabled = false;
            }
        },

        function () {
            alert("Permission denied or unable to determine location.");
            btn.textContent = "Use My Current Location";
            btn.disabled = false;
        }
    );
});
</script>



    
    <script>
        function clearForm() {
            document.querySelector('.incident-form').reset();
            document.querySelector('.upload-subtext').textContent = 'No files chosen';
        }
        
        function viewIncident(incidentId) {
            alert('Viewing details for incident #' + incidentId);
        }
        
        document.getElementById('fileUpload').addEventListener('change', function(e) {
            const files = e.target.files;
            const uploadText = document.querySelector('.upload-subtext');
            
            if (files.length > 0) {
                uploadText.textContent = files.length + ' file(s) selected';
            } else {
                uploadText.textContent = 'No files chosen';
            }
        });
    </script>

<script>
function viewIncident(id) {
    const modal = document.getElementById("incidentModal");
    const modalBody = document.getElementById("modalBody");

    modal.style.display = "block";
    modalBody.innerHTML = "Loading…";

    fetch("fetch_incident.php?id=" + id)
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                modalBody.innerHTML = `<p style='color:red;'>${data.error}</p>`;
                return;
            }

            const inc = data.incident;
            const files = data.files;

            let fileHTML = "No attachments.";
            if (files.length > 0) {
                fileHTML = files.map(f => {
                    const ext = f.file_path.split(".").pop().toLowerCase();
                    if (["jpg","jpeg","png","gif","webp"].includes(ext)) {
                        return `<img src="${f.file_path}" style="width:100%;margin-bottom:30%;border-radius:5px; height:70%">`;
                    }
                    return `
                        <video controls style="width:100%;margin-bottom:30%;border-radius:5px;">
                            <source src="${f.file_path}">
                        </video>
                    `;
                }).join("");
            }

            modalBody.innerHTML = `
                <p><strong>Incident ID:</strong> #${String(inc.id).padStart(5, '0')}</p>
                <p><strong>Type:</strong> ${inc.incident_type.replace("-", " ")}</p>
                <p><strong>Status:</strong> ${inc.status}</p>
                <p><strong>Date Submitted:</strong> ${inc.submitted_at}</p>
                <p><strong>Location:</strong> ${inc.location}</p>
                <p><strong>Barangay:</strong> ${inc.barangay}</p>
                <p><strong>Description:</strong><br>${inc.description}</p>

                <h3 style="margin-top:20px;">Attachments</h3>
                ${fileHTML}
            `;
        });
}

function closeIncidentModal() {
    document.getElementById("incidentModal").style.display = "none";
}


window.onclick = function(e) {
    const modal = document.getElementById("incidentModal");
    if (e.target === modal) {
        modal.style.display = "none";
    }
};
</script>


</body>
    <script>
        window.addEventListener('scroll', function() {
            const footer = document.querySelector('.footer');
            const scrollPosition = window.scrollY + window.innerHeight;
            const documentHeight = document.body.scrollHeight;
            if (scrollPosition >= documentHeight - 100) {
                footer.classList.add('visible');
            } else {
                footer.classList.remove('visible');
            }
        });
    </script>
</html>
<?php include "footer.html"; ?>