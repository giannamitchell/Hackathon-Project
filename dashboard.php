<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }

        /* Header Styles */
        .header {
            background-color: #fff;
            padding: 10px 20px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            position: relative;
        }

        .header h1 {
            margin: 0;
            font-size: 1.5em;
        }

        /* Navigation Button Styles */
        .nav-button {
            background-color: transparent;
            border: none;
            font-size: 1.5em;
            color: #333;
            cursor: pointer;
            padding: 0;
        }

        /* Navigation List Styles */
        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 200px;
        }

        .nav-list li {
            padding: 10px;
            text-align: left;
        }

        .nav-list a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        /* Search Bar Styles */
        .search-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 500px;
        }

        .search-bar input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
        }

        .search-bar button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Top Icons Styles */
        .top-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .top-icons a {
            color: #333;
            text-decoration: none;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }

        .module {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Icon Grid Styles */
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            padding: 10px;
        }

        .icon-grid a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #333;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        /* Chatbot Icon Styles */
        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 2em;
            color: #007bff;
            cursor: pointer;
        }

         /* Vital Signs Container */
    .vital-signs-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    /* Individual Vital Sign Module */
    .vital-sign {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 15px;
        text-align: center;
    }

    /* Circle Style for Each Vital Sign */
    .circle {
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 60%;
        background-color: #007bff;
        color: white;
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Labels under each circle */
    .vital-sign span {
        font-size: 1em;
        color: #333;
    }

    /* Responsive design adjustments */
    @media (max-width: 768px) {
        .vital-signs-container {
            flex-direction: column;
            align-items: center;
        }

        .circle {
            width: 100px;
            height: 100px;
            font-size: 1.5em;
        }
    }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <button class="nav-button" aria-label="Open navigation menu">☰</button>
            <ul class="nav-list">
                <li><a href="#">Patient Information</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Medical Records</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#" style="background-color: red; color: white;">SOS Emergency Button</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Search..." aria-label="Search">
                <button>&#128269;</button>
            </div>
            <div class="top-icons">
                <a href="alerts.html" aria-label="Notifications">&#128276;</a>
                <a href="#" aria-label="Settings">&#9881;</a>
                <a href="#" aria-label="Gamification">&#127947;</a>
            </div>
        </header>
        <main class="main-content" role="main">
            <h1>Welcome, <?php echo $patientName; ?></h1>
            <!-- Vital Signs Tracker Section -->
<section class="module">
    <h2>Vital Signs Tracker</h2>
    

    <!-- Display Vital Signs in Round Circles -->
    <div id="vital-signs" class="vital-signs-container">
        <div class="vital-sign">
            <div class="circle" id="heart-rate">--</div>
            <span>Heart Rate</span>
        </div>
        <div class="vital-sign">
            <div class="circle" id="body-temp">--</div>
            <span>Body Temp</span>
        </div>
        <div class="vital-sign">
            <div class="circle" id="bmi">--</div>
            <span>BMI</span>
        </div>
        <div class="vital-sign">
            <div class="circle" id="glucose-level">--</div>
            <span>Glucose Level</span>
        </div>
        <div class="vital-sign">
            <div class="circle" id="spo2">--</div>
            <span>SpO2</span>
        </div>
    </div>
</section>

            <section class="icon-grid">
                <a href="patient_info.html">Patient Information</a>
                <a href="appointments.html">Appointments</a>
                <a href="medical_records.html">Medical Records</a>
            </section>
        </main>
        <aside class="chatbot-icon" aria-label="Open Chatbot">&#128172;</aside>
    </div>
    <script>
        // Function to generate a random value within a given range
        function getRandomValue(min, max) {
            return (Math.random() * (max - min) + min).toFixed(2);
        }
    
        // Function to simulate vital signs and update the values on the page
        function updateVitalSigns() {
            // Simulated values
            const heartRate = getRandomValue(60, 100); // Normal range: 60-100 BPM
            const bodyTemp = getRandomValue(36.5, 37.5); // Normal range: 36.5-37.5°C
            const bmi = getRandomValue(18.5, 30); // Normal range: 18.5-30
            const glucoseLevel = getRandomValue(70, 140); // Normal range: 70-140 mg/dL
            const spo2 = getRandomValue(95, 100); // Normal range: 95-100%
    
            // Update the displayed vital signs in the circles
            document.getElementById('heart-rate').innerText = `${heartRate} BPM`;
            document.getElementById('body-temp').innerText = `${bodyTemp} °C`;
            document.getElementById('bmi').innerText = bmi;
            document.getElementById('glucose-level').innerText = `${glucoseLevel} mg/dL`;
            document.getElementById('spo2').innerText = `${spo2} %`;
        }
    
        // Update vital signs every 2 seconds
        setInterval(updateVitalSigns, 2000);
    
        // Initial update on page load
        updateVitalSigns();

        const navButton = document.querySelector('.nav-button');
        const navList = document.querySelector('.nav-list');

        navButton.addEventListener('click', () => {
            navList.style.display = navList.style.display === 'block' ? 'none' : 'block';
        });
    </script>
    
</body>
</html>
</html>