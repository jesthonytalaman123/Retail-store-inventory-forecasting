<style>
        body {
            display: flex;
            margin: 0;
            background-color: #FFDAB9;
        }

        #sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        #sidebar h5 {
            margin: 0;
            padding: 15px;
            background-color: #006400;
            color: white;
            text-align: center;
        }

        #sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            color: black;
        }

        #sidebar a:hover {
            background-color: #FFDAB9;
        }

        .custom-navbar {
            background-color: #006400 !important; 
            height: 60px;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky; /* Make the navbar sticky */
            top: 0; /* Stick to the top of the viewport */
            z-index: 999; /* Ensure it appears above other content */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            padding-top: 30px;
            position: sticky;
            top: 0;
            z-index: 999;

        }

        .dropdown-menu {
        z-index: 1050;
        }

        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-250px);
            }

            #sidebar.active {
                transform: translateX(0);
            }

            #content {
                margin-left: 0;
                width: 100%;
            }

            #toggleSidebar {
                display: block;
            }
        }

        .custom-title {
            font-size: 1.5rem;
        }

        .navbar-brand, .navbar-search, .dropdown-menu, .dropdown-item {
            color: black;
        }

        .navbar-brand:hover, .dropdown-item:hover {
            color: lightgray;
        }

        .btn-success {
            background-color: #006400;
            border-color: #006400;
        }

        .btn-success:hover {
            background-color: #004d00;
            border-color: #004d00;
        }

        .dropdown-item:hover {
            background-color: #004d00;
        }

        .chart-container {
            margin-top: 20px;
        }

        .full-width-chart {
            margin-top: 20px;
        }

        .full-width-chart canvas {
            width: 100% !important;
            height: auto !important;
        }

        .line-chart-container {
             max-width: 800px; /* Adjust this value as needed */
             margin: 0 auto;   /* Center the chart */
        }

        #filterContainer {
        margin-left: 0; /* Align filters to the left */
        flex-wrap: wrap; /* Allow wrapping if needed on smaller screens */
        }

        .phpadropdown {
        margin-right: 10px; /* Add spacing between dropdowns */
        }

    </style>