<?php
session_start();

// 🔒 Redirect to login page if user not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle donor registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donationType = $_POST['donationType'] ?? '';
    $bloodGroup = $_POST['bloodGroup'] ?? '';
    $organType = $_POST['organType'] ?? '';
    $fullName = $_POST['fullName'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $email = $_POST['email'] ?? '';
    $locality = $_POST['locality'] ?? '';
    $hospital = $_POST['hospital'] ?? '';
    $collectionPoint = $_POST['collectionPoint'] ?? '';
    $lastDonation = $_POST['lastDonation'] ?? '';

    $stmt = $conn->prepare("INSERT INTO donors (donationType, bloodGroup, organType, fullName, dob, gender, contact, email, locality, hospital, collectionPoint, lastDonation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $donationType, $bloodGroup, $organType, $fullName, $dob, $gender, $contact, $email, $locality, $hospital, $collectionPoint, $lastDonation);

    if ($stmt->execute()) {
        $success_msg = "Registration successful!";
    } else {
        $error_msg = "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle blood search form submission
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['searchBloodGroup']) && $_GET['searchBloodGroup'] !== '') {
    $searchBloodGroup = $_GET['searchBloodGroup'];

    $stmt = $conn->prepare("SELECT * FROM donors WHERE bloodGroup=?");
    $stmt->bind_param("s", $searchBloodGroup);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood & Organ Donation</title>
<link rel="stylesheet" href="./home.css">
<link rel="stylesheet" href="./sidebar.css">
<link rel="stylesheet" href="./footer.css">
<link rel="stylesheet" href="./nav.css">
<link rel="stylesheet" href="./a.css">
<link rel="shortcut icon" href="./photos/LOGO.webp" type="image/x-icon">
</head>
<body>

<!-- nav bar start -->
<nav class="nav-container">
    <div class="nav-center wrapper">
        <div class="logo-section">
            <a href="./home.php"><img src="./photos/LOGO.webp" alt="universitylogo" class="logo"></a>
        </div>
        <div class="hamburger">
            <img src="./photos/button.png" alt="sidebaropen">
        </div>
        <div class="nav-links-main">
            <div class="nav-links">
                <li><a href="./home.php" class="nav-link">HOME</a></li>
                <li><a href="./donate.php" class="nav-link active">DONATE</a></li>
                <li><a href="./about.php" class="nav-link">ABOUT</a></li>
                <li><a href="./contact.php" class="nav-link">CONTACT</a></li>
            </div>
        </div>
        <div class="nav-social-links-main">
                <ul class="nav-social-links" style="display:flex;align-items:center;gap:12px;list-style:none;margin:0;padding:0;">
                    <!-- <li><a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="WhatsApp"></a></li> -->
                     <li> <a href="https://web.whatsapp.com/"><img src="./photos/whatapp.png" alt="WhatsApp" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
                     <li><a href="https://www.youtube.com/"><img src="./photos/youtube.png" alt="YouTube" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
<li><a href="https://www.facebook.com/home.php"><img src="./photos/facebook.png" alt="Facebook" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>
<li><a href="https://www.instagram.com/accounts/login/?hl=en"><img src="./photos/insta .png" alt="Instagram" style="height:40px;width:40px;border: 2px solid var(--clr--white);border-radius: 50%;display: flex;justify-content: center;align-items: center;background-color: white;"></a></li>

                    <!-- <li><span style="color:white;font-weight:bold;background:transparent;">You can contact <?php echo $username; ?> ?</span></li> -->
                    <li><a href="./logout.php" class="login-button" style="background-color:#ed1b24;padding:6px 12px;border-radius:6px;color:white;text-decoration:none;">Logout</a></li>
                </ul>
            </div>
    </div>
</nav>
<!-- nav bar ends -->

<div class="container">
    <h2>What would you like to do?</h2>
    <form>
        <div class="input-group">
            <label for="actionType">Choose an option</label>
            <select id="actionType" name="actionType" required onchange="toggleForms()">
                <option value="">Select</option>
                <option value="donate">Donate Blood/Organ</option>
                <option value="search">Search for Blood</option>
            </select>
        </div>
    </form>
</div>

<?php if(isset($success_msg)) echo "<p style='color:green; text-align:center;'>$success_msg</p>"; ?>
<?php if(isset($error_msg)) echo "<p style='color:red; text-align:center;'>$error_msg</p>"; ?>

<!-- Donor Registration Form -->
<div class="container" id="donorForm" style="display: none;">
    <h2>Donor Registration Form</h2>
    <form action="donate.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label for="donationType">What would you like to donate?</label>
            <select id="donationType" name="donationType" required onchange="toggleFields()">
                <option value="">Select</option>
                <option value="blood">Blood</option>
                <option value="organ">Organ</option>
            </select>
        </div>

        <div id="bloodDonationFields" style="display: none;">
            <div class="input-group">
                <label for="bloodGroup">Blood Group</label>
                <select id="bloodGroup" name="bloodGroup">
                    <option value="">Select</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="input-group">
                <label for="lastDonation">Last Blood Donation Date</label>
                <input type="date" id="lastDonation" name="lastDonation">
            </div>
        </div>

        <div id="organDonationFields" style="display: none;">
            <div class="input-group">
                <label for="organType">Which organ would you like to donate?</label>
                <select id="organType" name="organType">
                    <option value="">Select</option>
                    <option value="Kidney">Kidney</option>
                    <option value="Liver">Liver</option>
                    <option value="Heart">Heart</option>
                    <option value="Lungs">Lungs</option>
                    <option value="Pancreas">Pancreas</option>
                    <option value="Cornea">Cornea</option>
                </select>
            </div>
        </div>

        <!-- Common Fields -->
        <div class="input-group">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" required>
        </div>
        <div class="input-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="input-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="input-group">
            <label for="contact">Contact Number</label>
            <input type="tel" id="contact" name="contact" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="locality">Locality</label>
            <input type="text" id="locality" name="locality" required>
        </div>
        <div class="input-group">
            <label for="hospital">Hospital Name</label>
            <input type="text" id="hospital" name="hospital" required>
        </div>
        <div class="input-group">
            <label for="collectionPoint">Collection Point</label>
            <input type="text" id="collectionPoint" name="collectionPoint" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>


<!-- Blood Request Search -->
<div class="container" id="searchForm" style="display: none;">
    <h2>Search for a Blood Donor</h2>
    <form action="donate.php" method="GET">
        <div class="input-group">
            <label for="searchBloodGroup">Blood Group</label>
            <select id="searchBloodGroup" name="searchBloodGroup" required>
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <button type="submit">Search</button>
    </form>

    <?php if(!empty($searchResults)): ?>
        <h3>Search Results:</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Name</th>
                <th>Blood Group</th>
                <th>Organ</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Locality</th>
                <th>Hospital</th>
            </tr>
            <?php foreach($searchResults as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['fullName']); ?></td>
                <td><?php echo htmlspecialchars($row['bloodGroup']); ?></td>
                <td><?php echo htmlspecialchars($row['organType']); ?></td>
                <td><?php echo htmlspecialchars($row['contact']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['locality']); ?></td>
                <td><?php echo htmlspecialchars($row['hospital']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['searchBloodGroup'])): ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>

<div class="blood-info-bar">
    <h2>Blood Types & Their Uses</h2>
    <div class="blood-cards">
        <div class="blood-card blood-a">
            <h3>A+</h3>
            <p>Can donate to A+ and AB+.</p>
            <p>Common in surgeries.</p>
        </div>
        <div class="blood-card blood-a-negative">
            <h3>A-</h3>
            <p>Can donate to A, AB (both + and -).</p>
            <p>Rare but crucial for transfusions.</p>
        </div>
        <div class="blood-card blood-b">
            <h3>B+</h3>
            <p>Can donate to B+ and AB+.</p>
            <p>Used in trauma cases.</p>
        </div>
        <div class="blood-card blood-b-negative">
            <h3>B-</h3>
            <p>Can donate to B, AB (both + and -).</p>
            <p>Vital for emergencies.</p>
        </div>
        <div class="blood-card blood-o">
            <h3>O+</h3>
            <p>Can donate to all positive blood types.</p>
            <p>Most in demand.</p>
        </div>
        <div class="blood-card blood-o-negative">
            <h3>O-</h3>
            <p>Universal donor.</p>
            <p>Used in critical emergencies.</p>
        </div>
        <div class="blood-card blood-ab">
            <h3>AB+</h3>
            <p>Universal plasma donor.</p>
            <p>Can receive from all blood types.</p>
        </div>
        <div class="blood-card blood-ab-negative">
            <h3>AB-</h3>
            <p>Can donate to AB+, AB-.</p>
            <p>One of the rarest types.</p>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .blood-info-bar {
        text-align: center;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 10px;
        margin: 20px auto;
        max-width: 800px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .blood-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .blood-card {
        width: 160px;
        padding: 15px;
        border-radius: 8px;
        color: white;
        text-align: center;
        font-weight: bold;
        transition: transform 0.2s;
    }

    .blood-card:hover {
        transform: scale(1.05);
    }

    .blood-a { background-color: red; }
    .blood-a-negative { background-color: #cc3333; }
    .blood-b { background-color: orangered; }
    .blood-b-negative { background-color: rgb(240, 62, 3); }
    .blood-o { background-color: #ff6666; }
    .blood-o-negative { background-color: #ad0404; }
    .blood-ab { background-color: #de542a; }
    .blood-ab-negative { background-color: #ff3838; }
</style>

<script>
function toggleFields() {
    var donationType = document.getElementById("donationType").value;
    document.getElementById("bloodDonationFields").style.display = (donationType === "blood") ? "block" : "none";
    document.getElementById("organDonationFields").style.display = (donationType === "organ") ? "block" : "none";
}

function toggleForms() {
    var actionType = document.getElementById("actionType").value;
    document.getElementById("donorForm").style.display = (actionType === "donate") ? "block" : "none";
    document.getElementById("searchForm").style.display = (actionType === "search") ? "block" : "none";
}
</script>

</body>
</html>
