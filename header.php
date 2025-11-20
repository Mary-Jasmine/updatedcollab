
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Municipality Incident Reporting'; ?></title>

   <style>
    body {
        margin: 0;
        font-family: "Poppins", Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .header {
        background: linear-gradient(to right, #980718, #6d0010);
        padding: 10px 20px;
        color: #fff;
        width: 100%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1300px;
        margin: 0 auto; 
        padding: 0 25px;
        gap: 20px;
    }


    .header-left {
        display: flex; 
        margin-right: 20px;
        gap: 50px;  
        font-size: 20px;
    }

    .logo {
        font-weight: 700;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo span {
        white-space: nowrap;
    }

    /* CENTER NAV */
    .header-center {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .header-nav {
        display: flex;
        gap: 5px;
    }

    .header-nav .nav-link {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: background 0.3s, color 0.3s;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .header-nav .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .header-nav .nav-link.active {
        background: #c62828;
    }

 
    .header-right {
        display: flex;
        align-items: center; 
        gap: 120px; 
    }

    .search-box {
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        background-color: rgba(255, 255, 255, 0.15);
        color: white;
        width: 190px;  
        margin-right: 30px;
    }

    .search-box::placeholder {
        color: #eee;
        width: 190px;
    }

    .user-profile {
        background-color: rgba(255, 255, 255, 0.15);
        border-radius: 5px;
        display: flex;
        align-items: center;  
        gap: 10px;
        white-space: nowrap;
        margin-left: 90px;
    }

    @media (max-width: 900px) {
        .header-container {
            flex-direction: column;
            gap: 10px;
        }

        .header-center {
            order: 3;
        }

        .header-right {
            order: 2;
            justify-content: flex-end;
        }
    }

    .logo
{
    display: fixed;
    margin: 10px;
    top: 50%;
    width: 0.1%;
    height: 1px;
    margin-top: 2%;
    margin-left: 0;
    margin-right: 0;
    border-right: 20p;
}

    </style>
</head>
<body class="dashboard-page">
    <div class="header">
        <div class="header-container">
            <div class="logo">
            </div>

            <div class="header-left">
                <div class="logo"> <span>Municipality Incident Reporting</span></div>
            </div>

            <div class="header-center">
                <nav class="header-nav">
                    <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">Analytics</a>
                    <a href="submit-report.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'submit-report.php' ? 'active' : ''; ?>">Report</a>
                    <a href="hotlines.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'hotlines.php' ? 'active' : ''; ?>">Hotlines</a>
                    <a href="heatmap.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'heatmap.php' ? 'active' : ''; ?>">Heatmap</a>
                    <a href="announcements.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'announcements.php' ? 'active' : ''; ?>">Announcements</a>
                    <a href="firstaid.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'firstaid.php' ? 'active' : ''; ?>">Resources</a>
                </nav>
            </div>
            <div class="header-right">

                <div class="user-profile border-radius"> 👤 

                </div>
        
                <br>
            </div>
        </div>
    </div> <br> <br> 
</body>
</html>
