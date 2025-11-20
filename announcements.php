<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcements and Alerts</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f5;
      min-height: 100vh;
    }

    .sidebar {

    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 900vh;
    overflow-y: auto;
    background-color: #8B0B0B;
    z-index: 1 1; 
    }

    .sidebar-header {
      padding: 80px 20px 10px; 
      text-align: center;
    }

    .sidebar-header-icon {
      font-size: 40px;
      margin-bottom: 10px;
    }

    .sidebar-header h3 {
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      margin-top: 5px;
      color: rgba(255, 255, 255, 0.7);
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav {
      padding: 0 0 20px 0;
    }

    .sidebar-nav a.nav-item {
      display: block;
      padding: 10px 20px;
      color: rgba(255, 255, 255, 0.85);
      text-decoration: none;
      font-size: 15px;
      transition: background-color 0.2s;
      border-left: 3px solid transparent;
      margin-bottom: 2px;
    }

    .sidebar-nav a.nav-item:hover {
      background-color: rgba(0, 0, 0, 0.1);
    }

    .sidebar-nav a.nav-item.active {
      background-color: #C41E3A;
      color: white;
      border-left: 3px solid #FFD700;
      font-weight: 600;
    }
    
    .nav-section {
      padding-top: 15px;
    }

    .nav-section h4 {
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.7);
      padding: 10px 20px 5px;
      margin-top: 10px;
    }
    .content {
      margin-left: 260px;
      margin-right: 16px;
      padding: 30px 40px;
      background-color: #f5f5f5;
      min-height: calc(100vh - 50px); 
      padding-top: 100px; 
    }

    .page-title {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 30px;
      color: #333;
    }

    .main-container {
      display: grid; 
      grid-template-columns: 1fr 300px;
      gap: 30px;
    }

    .main-content {
    margin-left: 250px;
    padding: 20px;
}

    .section-title {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 20px;
      color: #333;
    }

    .announcements-grid {
      display: grid;
      grid-template-columns: repeat(2,1fr);
      gap: 20px;
    }

    .announcement-card {
      background-color: white;
      border-radius: 4px;
      overflow: hidden;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .card-image {
      width: 100%;
      height: 150px;
      background: linear-gradient(135deg,#e8e8e8 0%,#d0d0d0 100%);
    }

    .card-content {
      padding: 20px;
    }

    .card-type {
      font-size: 11px;
      color: #999;
      text-transform: uppercase;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .card-title {
      font-size: 15px;
      font-weight: 600;
      color: #333;
      margin-bottom: 10px;
    }

    .card-description {
      font-size: 13px;
      color: #666;
      line-height: 1.5;
      margin-bottom: 15px;
    }

    .card-date {
      font-size: 12px;
      color: #999;
      margin-bottom: 12px;
    }

    .read-more {
      color: #2d7a3a;
      text-decoration: none;
      font-size: 12px;
      font-weight: 600;
    }

    .alert-category {
      padding: 6px 12px;
      background-color: #c41e3a;
      color: white;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .category-tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .category-tag {
      padding: 6px 12px;
      background-color: #f0f0f0;
      color: #666;
      border-radius: 3px;
      font-size: 12px;
      cursor: pointer;
    }

    .alert-item {
      background-color: white;
      padding: 15px;
      border-radius: 4px;
      margin-bottom: 15px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }

    .footer {
      background-color: #4caf50;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      margin: 0; 
      position: relative;
      z-index: 500; 
    }
  </style>
</head>

<body>
<?php include 'header.php';?>
<!-- This is a comment
<div class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-header-icon">🏛️</div>
        <h3>OFFICIAL TOOLS</h3>
    </div>
    
    <nav class="sidebar-nav">
        <a href="dashboard.php" class="nav-item">Analytics Dashboard</a>
        <a href="submit-report.php" class="nav-item">Submit Report</a>
        <a href="hotlines.php" class="nav-item">Hotlines</a>

        <div class="nav-section">
            <h4>EXPLORE</h4>
            <a href="heatmap.php" class="nav-item">Heatmap</a>
            <a href="announcements.php" class="nav-item active">Announcements</a>
            <a href="firstaid.php" class="nav-item">First Aid Resources</a>
            <a href="settings.php" class="nav-item">Settings</a>
        </div>
        
        <div class="nav-section">
            <a href="logout.php" class="nav-item" style="margin-top: 15px;">Log Out</a>
        </div>
    </nav>
</div>
--->
<div class="content">
    <h1 class="page-title">Announcements and Alerts</h1>

    <div class="annooun-container">

      <div>
        <h2 class="section-title">Recent Municipal Announcements</h2>

        <div class="announcements-grid">

          <div class="announcement-card">
            <div class="card-image"></div>
            <div class="card-content">
              <div class="card-type">Community Event</div>
              <div class="card-title">Barangay Clean-up Drive</div>
              <div class="card-description">
                Join our clean-up event this Saturday!
              </div>
              <div class="card-date">October 25, 2025</div>
              <a class="read-more" href="#">Read More</a>
            </div>
          </div>

          <div class="announcement-card">
            <div class="card-image"></div>
            <div class="card-content">
              <div class="card-type">Public Service</div>
              <div class="card-title">Vaccination Drive</div>
              <div class="card-description">
                Free flu vaccination for senior citizens.
              </div>
              <div class="card-date">October 22, 2025</div>
              <a class="read-more" href="#">Read More</a>
            </div>
          </div>

        </div>
      </div>

      <div>
        <h2 class="section-title">Browse Alert Categories</h2>

        <div class="alert-category">Disaster Warnings</div>
        <div class="category-tags">
          <div class="category-tag">Public Works</div>
          <div class="category-tag">Road Closures</div>
        </div>

        <div class="category-tags">
          <div class="category-tag">Health Advisories</div>
        </div>

        <div class="alert-category">Emergency Evacuation</div>
        <div class="category-tags">
          <div class="category-tag">Water Interruption</div>
        </div>

        <h3 style="margin: 25px 0 15px;">Active Safety Alerts</h3>

        <div class="alert-item">
          <strong>Typhoon Warning</strong><br>
          Urgent<br><br>
          Landfall expected tomorrow morning.<br>
          <strong>Issued:</strong> October 24, 2025<br>
          <strong>Source:</strong> PAGASA
        </div>

      </div>

    </div>
</div>
   <script src="script.js"></script>
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
</body>

</html>
<?php include "footer.html"; ?>
