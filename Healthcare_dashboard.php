<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <audio id="alert-sound" src="alert-sound.mp3" preload="auto"></audio>

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

        /* Health Metrics Circle Styles */
        .health-metrics {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .metric {
            background-color: #fff;
            padding: 20px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .metric span {
            font-size: 1.2em;
            font-weight: bold;
        }

        .alert {
            background-color: red;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin: 20px 0;
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
         /* Basic styles for the popup */
         .popup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 20px;
            background-color: #ff6347;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            z-index: 9999;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <?php
// Database connection and checking vitals...
// After an alert is triggered, pass the alert message to the frontend

if (!empty($alert_message)) {
    // Insert the alert into the database
    $stmt = $conn->prepare("INSERT INTO alerts (patient_id, alert_message) VALUES (?, ?)");
    $stmt->bind_param("is", $patient_id, $alert_message);
    $stmt->execute();
    $stmt->close();

    // Passing the alert message to the frontend for the popup (via JavaScript)
    echo "<script>triggerAlert('$alert_message');</script>";
}
?>
    <audio id="alert-sound" src="alert-sound.mp3" preload="auto"></audio>

    <div class="dashboard-container">
        <header class="header">
            <button class="nav-button" aria-label="Open navigation menu">☰</button>
            <ul class="nav-list">
                <li><a href="#">Patient Directory</a></li>
                <li><a href="#">Alerts</a></li>
                <li><a href="#">Take Action</a></li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Search..." aria-label="Search">
                <button>&#128269;</button>
            </div>
            <div class="top-icons">
                <a href="healthcare_notifi.html" aria-label="Notifications">&#128276;</a>
                <a href="healthcare_settings.html" aria-label="Settings">&#9881;</a>
            </div>
        </header>
        <main class="main-content" role="main">
            <h1>Welcome, [Healthcare Name]</h1>

            <!-- Alert Section -->
            <div class="alert">
                <p>Alert: A patient's SpO2 level has dropped below 90%!</p>
            </div>

            <!-- Health Metrics Section -->
            <section class="health-metrics">
                <div class="metric">
                    <span>HR</span>
                    <span>75 BPM</span>
                </div>
                <div class="metric">
                    <span>Temp</span>
                    <span>37°C</span>
                </div>
                <div class="metric">
                    <span>SpO2</span>
                    <span>88%</span>
                </div>
            </section>
            <!-- Display vitals here -->
            <section class="vital-signs">
                <p id="heartRate">Heart Rate: N/A</p>
                <p id="spo2">SpO2: N/A</p>
                <p id="temperature">Temperature: N/A</p>
            </section>


            <!-- Actionable Buttons -->
            <section class="icon-grid">
                <a href="patient_directory.html">Patient Directory</a>
                <a href="alerts.html">Alerts</a>
                <a href="take_action.html">Take Action</a>
            </section>
        </main>
        <aside class="chatbot-icon" aria-label="Open Chatbot">&#128172;</aside>
    </div>
    <script>
      // Function to play the alarm sound
      function playAlertSound() {
            var audio = document.getElementById("alert-sound");
            audio.play();
        }

        // Function to show popup
        function showPopup(message) {
            // Create the popup element
            var popup = document.createElement("div");
            popup.classList.add("popup");
            popup.innerText = message;
            document.body.appendChild(popup);
        }
     function playAlertSound() {
        var audio = document.getElementById("alert-sound");
        audio.play();
    }

    function showPopup(message) {
        // Create a div for the popup
        var popup = document.createElement("div");
        popup.style.position = "fixed";
        popup.style.top = "20px";
        popup.style.left = "50%";
        popup.style.transform = "translateX(-50%)";
        popup.style.padding = "20px";
        popup.style.backgroundColor = "#ff6347";
        popup.style.color = "white";
        popup.style.fontSize = "18px";
        popup.style.borderRadius = "5px";
        popup.style.zIndex = "9999";
        popup.style.boxShadow = "0 4px 10px rgba(0, 0, 0, 0.3)";
        popup.innerHTML = "ALERT: " + message;

        // Append popup to the body
        document.body.appendChild(popup);

        // Hide the popup after 5 seconds
        setTimeout(function() {
            popup.style.display = "none";
        }, 5000);
    }

    // Example function to trigger the alert (this would be triggered by server-side PHP logic)
    function triggerAlert(message) {
        playAlertSound(); // Play the alarm sound
        showPopup(message); // Show the popup
    }

    // For testing, trigger an alert every 5 seconds (you can remove this part in production)
    setInterval(function() {
        triggerAlert("Abnormal heart rate detected!"); // Example alert message
    }, 5000); // Trigger alert every 5 seconds for demo purposes

    function fetchVitals() {
        fetch('get_vitals.php')
            .then(response => response.json())
            .then(data => {
                // Update the dashboard with the latest vital signs
                const heartRate = data.heart_rate;
                const spo2 = data.spo2;
                const temperature = data.temperature;

                document.getElementById("heartRate").innerText = `Heart Rate: ${heartRate}`;
                document.getElementById("spo2").innerText = `SpO2: ${spo2}`;
                document.getElementById("temperature").innerText = `Temperature: ${temperature}`;

                // Trigger an alert if vital signs are concerning
                if (heartRate > 120 || spo2 < 90 || temperature > 38) {
                    alert("ALERT! Patient's vitals are outside normal ranges!");
                }
            })
            .catch(error => {
                console.error('Error fetching vital signs:', error);
            });
    }


        const navButton = document.querySelector('.nav-button');
        const navList = document.querySelector('.nav-list');

        navButton.addEventListener('click', () => {
            navList.style.display = navList.style.display === 'block' ? 'none' : 'block';
        });
</script>


</body>
</html>
