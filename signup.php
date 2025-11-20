<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = sanitizeInput($_POST['fullName']);
    $email = sanitizeInput($_POST['emailAddress']);
    $contact_number = sanitizeInput($_POST['contactNumber']);
    $barangay = sanitizeInput($_POST['barangay']);
    $sex = sanitizeInput($_POST['sex']);
    $age_group = sanitizeInput($_POST['age']);
    $password = password_hash($_POST['regPassword'], PASSWORD_DEFAULT);
    
    $database = new Database();
    $db = $database->getConnection();
    
    try {
        $query = "INSERT INTO users (full_name, email, password, contact_number, barangay, sex, age_group) 
                  VALUES (:full_name, :email, :password, :contact_number, :barangay, :sex, :age_group)";
        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':barangay', $barangay);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':age_group', $age_group);
        
        if ($stmt->execute()) {
            header("Location: index.php?registered=1");
            exit();
        }
    } catch(PDOException $e) {
        if ($e->getCode() == 23000) {
            $error = "Email already exists";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    <title>Municipality Incident Reporting - Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="register-page">
    <div class="register-container">
        <div class="register-card">
            <div class="app-header">
                <h1 class="app-title">Municipality Incident Reporting</h1>
                <p class="app-subtitle">Web-App</p>
                <div class="app-logo">
                    <img src="logowo.png" alt="">
                </div>
            </div>
            
            <h2 class="register-title">Create Your Account</h2>
            <p class="register-subtitle">Join us to report incidents and help build a safer, more responsive community.</p>
            
            <?php if (isset($error)): ?>
                <div class="error-message" style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form class="register-form" method="POST">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" id="emailAddress" name="emailAddress" required>
                </div>
                
                <div class="form-group">
                    <label for="contactNumber">Contact Number</label>
                    <input type="tel" id="contactNumber" name="contactNumber" required>
                </div>
                
                <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <input type="text" id="barangay" name="barangay" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group half">
                        <label for="sex">Sex</label>
                        <select id="sex" name="sex" required>
                            <option value="">Choose</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group half">
                        <label for="age">Age</label>
                        <select id="age" name="age" required>
                            <option value="">Choose</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-45">36-45</option>
                            <option value="46-55">46-55</option>
                            <option value="56+">56+</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="regPassword">Password</label>
                    <input type="password" id="regPassword" name="regPassword" placeholder="Create a strong password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
                </div>
                
                <button type="submit" class="signup-btn">Sign Up</button>
                
                <p class="login-link">Already have an account? <a href="index.php">Login</a></p>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('regPassword').addEventListener('input', validatePassword);
        document.getElementById('confirmPassword').addEventListener('input', validatePassword);
        
        function validatePassword() {
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                document.getElementById('confirmPassword').style.borderColor = 'red';
            } else {
                document.getElementById('confirmPassword').style.borderColor = '#ddd';
            }
        }
    </script>
</body>
</html>