<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    <title>Emergency Hotlines - Municipality Incident Reporting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?>
    <div class="dashboard-container">
        <!-- This is a comment
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="municipality-logo">🏛️</div>
                <h3>OFFICIAL TOOLS</h3>
            </div>
            
            <nav class="sidebar-nav">
                
                <a href="dashboard.php" class="nav-item">
                    <span class="nav-icon"></span>
                    Analytics Dashboard
                </a>
                <a href="submit-report.php" class="nav-item">
                    <span class="nav-icon"></span>
                    Submit Report
                </a>
                <a href="hotlines.php" class="nav-item active">
                    <span class="nav-icon"></span>
                    Hotlines
                </a>
                
                <div class="nav-section">
                    <h4>EXPLORE</h4>
                    <a href="heatmap.php" class="nav-item">
                        <span class="nav-icon"></span>
                        Heatmap
                    </a>
                    <a href="announcement.php" class="nav-item">
                        <span class="nav-icon"></span>
                        Announcements
                    </a>
                    <a href="" class="nav-item">
                        <span class="nav-icon"></span>
                        First Aid Resources
                    </a>
                    <a href="#" class="nav-item">
                        <span class="nav-icon"></span>
                        Settings
                    </a>
                </div>
            </nav>
            
            <div class="sidebar-footer">
                <button class="logout-btn"> Logout</button>
            </div>
        </div>
         -->
        <div class="hot-content">
            <header class="page-header">
                <h1>Emergency Hotlines</h1>
                <p class="page-subtitle">A quick and comprehensive reference for essential emergency contact numbers in the Municipality of San Pablo City, Laguna Philippines. Find immediate help from various agencies.</p>
            </header>

            <div class="search-section">
                <div class="search-box-large">
                    <input type="text" id="hotlineSearch" placeholder="Search agencies or numbers...">
                    <button class="search-btn">🔍</button>
                </div>
            </div>

            <div class="contacts-section">
                <div class="section-card">
                    <h2>Emergency Contact List</h2>
                    <p class="section-subtitle">Quick access to essential services</p>
                    
                    <div class="contacts-table-container">
                        <table class="contacts-table">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Agency</th>
                                    <th>Description</th>
                                    <th>Phone Number</th>
                                    <th>Landline Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="agency-logo red"></div></td>
                                    <td><strong>PDRRMC</strong></td>
                                    <td>Provincial Disaster Risk Reduction and Management Office</td>
                                    <td><span class="phone-number">0968-887-2529</span></td>
                                    <td><span class="landline-number">📞 (049) 536-0584</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo dark"></div></td>
                                    <td><strong>PHIVOLCS</strong></td>
                                    <td>Philippine Institute of Volcanology and Seismology</td>
                                    <td><span class="phone-number"> 0905-313-4677</span></td>
                                    <td><span class="landline-number">📞 (02) 426-1468 to 79 Loc. 124/125</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo red"></div></td>
                                    <td><strong>Red Cross Tabuk</strong></td>
                                    <td>Philippine Red Cross Tabuk Chapter, Provincial Office</td>
                                    <td><span class="phone-number"> 0998-984-9871</span></td>
                                    <td><span class="landline-number">📞 (049) 982-0318</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo brown"></div></td>
                                    <td><strong>LGU Ramos</strong></td>
                                    <td>Local Government Unit of San Pablo City, Laguna</td>
                                    <td><span class="phone-number"> 0917-217-9815</span></td>
                                    <td><span class="landline-number">📞 (049) 497-7870</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo red"></div></td>
                                    <td><strong>MDRRMC</strong></td>
                                    <td>Municipal Disaster Risk Reduction and Management Office</td>
                                    <td><span class="phone-number"> 0916-651-2407</span></td>
                                    <td><span class="landline-number">📞 47-7870</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo blue"></div></td>
                                    <td><strong>RHU</strong></td>
                                    <td>Rural Health Unit of San Pablo City. Provides primary healthcare services</td>
                                    <td><span class="phone-number"> N/A</span></td>
                                    <td><span class="landline-number">📞 (049) 497-7369</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo yellow"></div></td>
                                    <td><strong>LGU GUTTER</strong></td>
                                    <td>Local Government Unit of Guttob, handles emergency response</td>
                                    <td><span class="phone-number"> 0949-536-9193</span></td>
                                    <td><span class="landline-number">📞 -</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo brown"></div></td>
                                    <td><strong>BFP San Pablo City</strong></td>
                                    <td>Bureau of Fire Protection San Pablo City, Regional Fire Station</td>
                                    <td><span class="phone-number"> 0958-516-2470</span></td>
                                    <td><span class="landline-number">📞 (049) 497-6835</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                                <tr>
                                    <td><div class="agency-logo dark"></div></td>
                                    <td><strong>PNP San Pablo City</strong></td>
                                    <td>Philippine National Police Ramos, Municipal Police Station</td>
                                    <td><span class="phone-number"> 0999-598-5489</span></td>
                                    <td><span class="landline-number">📞 (049) 497-7672</span></td>
                                    <td><button class="view-details-btn">View Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
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
<?php include 'footer.html'; ?>