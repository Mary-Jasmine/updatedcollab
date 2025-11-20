<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://public-frontend-cos.metadl.com/mgx/img/favicon.png" type="image/png">
    <title>Heatmap Visualization - Municipality Incident Reporting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-page">
    <?php include 'header.php'; ?>
    <div class="dashboard-container">   
<!---            
         <div class="sidebar">
            <div class="sidebar-header">
                <div class="municipality-logo">🏛️</div>
                <h3>OFFICIAL TOOLS</h3>
            </div>
            
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item active">Analytics Dashboard</a>
                <a href="submit-report.php" class="nav-item">Submit Report</a>
                <a href="hotlines.php" class="nav-item">Hotlines</a>
                
                <div class="nav-section">
                    <h4>EXPLORE</h4>
                    <a href="heatmap.php" class="nav-item">Heatmap</a>
                    <a href="announcements.php" class="nav-item">Announcements</a>
                    <a href="firstaid.php" class="nav-item">First Aid Resources</a>
                    <a href="settings.php" class="nav-item">Settings</a>
                </div>
            </nav>
            
            <div class="sidebar-footer">
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
-->

        <div class="heat-content">
            <header class="page-header">
                <h1>Heatmap Visualization</h1>
                <p class="page-subtitle">Analyze incident hotspots across barangays with interactive filters.</p>
            </header>
            
            <div class="heatmap-stats">
                <div class="stat-card">
                    <div class="stat-icon"></div>
                    <div class="stat-info">
                        <h3>Total Incidents</h3>
                        <div class="stat-number">1,245</div>
                        <div class="stat-subtext">Up by 12% from last month</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"></div>
                    <div class="stat-info">
                        <h3>High-Risk Barangays</h3>
                        <div class="stat-number">7</div>
                        <div class="stat-subtext">Focus area for immediate intervention</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"></div>
                    <div class="stat-info">
                        <h3>Incidents Resolved</h3>
                        <div class="stat-number">890</div>
                        <div class="stat-subtext">71% resolution rate</div>
                    </div>
                </div>
            </div>
            <div class="heatmap-section">
                <div class="heatmap-container">
                    <div class="filter-panel">
                        <h3>Filter Options</h3>
                        
                        <div class="filter-group">
                            <label for="incidentTypeFilter">Incident Type</label>
                            <select id="incidentTypeFilter" name="incidentTypeFilter">
                                <option value="all">All Incidents</option>
                                <option value="road-hazard">Road Hazard</option>
                                <option value="public-safety">Public Safety</option>
                                <option value="infrastructure">Infrastructure</option>
                                <option value="environmental">Environmental</option>
                                <option value="emergency">Emergency</option>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label>Date Range</label>
                            <div class="date-range">
                                <input type="date" id="startDate" name="startDate" placeholder="Start Date">
                                <input type="date" id="endDate" name="endDate" placeholder="End Date">
                            </div>
                        </div>
                        
                        <div class="filter-group">
                            <label>Incident Rate Legend</label>
                            <div class="legend">
                                <div class="legend-item">
                                    <span class="legend-color high"></span>
                                    <span>High Incidence (16+)</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color moderate"></span>
                                    <span>Moderate Incidence (6-15)</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color low"></span>
                                    <span>Low Incidence (1-5)</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="filter-group">
                            <input type="text" id="barangaySearch" placeholder="Search barangays...">
                        </div>
                        
                        <button class="clear-filters-btn">Clear Filters</button>
                    </div>

                    <div class="map-area">
                        <h3>Incident Heatmap by Barangay</h3>
                        <div class="map-container">
                            <div class="map-placeholder">
                                <div class="map-background">
                                    <div class="barangay-marker high" style="top: 20%; left: 30%;" data-barangay="Maricaban" data-incidents="28">
                                        <span class="marker-label">Maricaban</span>
                                        <span class="incident-count">28</span>
                                    </div>
                                    <div class="barangay-marker moderate" style="top: 40%; left: 60%;" data-barangay="Poblacion" data-incidents="15">
                                        <span class="marker-label">Poblacion</span>
                                        <span class="incident-count">15</span>
                                    </div>
                                    <div class="barangay-marker high" style="top: 60%; left: 20%;" data-barangay="San Jose" data-incidents="22">
                                        <span class="marker-label">San Jose</span>
                                        <span class="incident-count">22</span>
                                    </div>
                                    <div class="barangay-marker moderate" style="top: 30%; left: 70%;" data-barangay="Mabolo" data-incidents="12">
                                        <span class="marker-label">Mabolo</span>
                                        <span class="incident-count">12</span>
                                    </div>
                                    <div class="barangay-marker low" style="top: 70%; left: 50%;" data-barangay="Cagam" data-incidents="8">
                                        <span class="marker-label">Cagam</span>
                                        <span class="incident-count">8</span>
                                    </div>
                                    <div class="barangay-marker low" style="top: 50%; left: 40%;" data-barangay="Silot" data-incidents="5">
                                        <span class="marker-label">Silot</span>
                                        <span class="incident-count">5</span>
                                    </div>
                                </div>
                                <div class="map-overlay">
                                    <p>Interactive Incident Map Placeholder</p>
                                    <small>Click on markers to view detailed incident information</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="incidentModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h3 id="modalTitle">Barangay Incident Details</h3>
                    <div id="modalBody">
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
<?php include "footer.html"; ?>