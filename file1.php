<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>proven</title>
</head>
<style>
   
body, ul {
    margin: 0;
    padding: 0;
}


body,html {
    font-family: Arial, sans-serif;
    height: 2000px;
    scroll-behavior: smooth;
    background-color: black;
    
}

/* Style the header */
header {
   
    position: absolute;
    top: 0;
    width: 100%;
    color: white;
    text-align: center;
    padding: 20px 0;
    z-index: 10; /* Ensure the header is on top */
}

.navbar {
    display: flex;
    padding: 22px 0;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: space-between;
    z-index: 10;
}

.navbar .hamburger-btn {
    display: none;
    color: #fff;
    cursor: pointer;
    font-size: 1.5rem;
}

.navbar .logo {
    gap: 10px;
    display: flex;
    align-items: center;
    text-decoration: none;
}

.navbar .logo img {
    width: 40px;
    border-radius: 50%;
}

.navbar .logo h2 {
    color: #fff;
    font-weight: 600;
    font-size: 1.7rem;
}

.navbar .links {
    display: flex;
    gap: 35px;
    list-style: none;
    align-items: center;
}

.navbar .close-btn {
    position: absolute;
    right: 20px;
    top: 20px;
    display: none;
    color: #000;
    cursor: pointer;
}

.navbar .links a {
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    transition: 0.1s ease;
}

.navbar .links a:hover {
    color: #19e8ff;
}

.navbar .login-btn {
    border: none;
    outline: none;
    background: #fff;
    color: #275360;
    font-size: 1rem;
    font-weight: 600;
    padding: 10px 18px;
    border-radius: 3px;
    cursor: pointer;
    transition: 0.15s ease;
}

.navbar .login-btn:hover {
    background: #ddd;
}

.form-popup {
    position: fixed;
    top: 50%;
    left: 50%;
    z-index: 10;
    width: 100%;
    opacity: 0;
    pointer-events: none;
    max-width: 800px;
    background: #fff;
    border: 2px solid #fff;
    transform: translate(-50%, -70%);
}

.show-popup .form-popup {
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50%, -50%);
    transition: transform 0.3s ease, opacity 0.1s;
}

.form-popup .close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    color: #878484;
    cursor: pointer;
}

.blur-bg-overlay {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
    height: 100%;
    width: 100%;
    opacity: 0;
    pointer-events: none;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    transition: 0.1s ease;
}

.show-popup .blur-bg-overlay {
    opacity: 1;
    pointer-events: auto;
}

.form-popup .form-box {
    display: flex;
}

.form-box .form-details {
    width: 100%;
    color: #fff;
    max-width: 330px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.login .form-details {
    padding: 0 40px;
    background: url("ero.jpg");
    background-position: center;
    background-size: cover;
}

.signup .form-details {
    padding: 0 20px;
    background: url("pix34.webp");
    background-position: center;
    background-size: cover;
}

.form-box .form-content {
    width: 600px;
    padding: 35px;
}

.form-box h2 {
    text-align: center;
    margin-bottom: 29px;
}

form .input-field {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
}

.input-field input {
    height: 100%;
    width: 100%;
    background: none;
    outline: none;
    font-size: 0.95rem;
    padding: 0 15px;
    border: 1px solid #717171;
    border-radius: 3px;
}

.input-field input:focus {
    border: 1px solid #00bcd4;
}

.input-field label {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #4a4646;
    pointer-events: none;
    transition: 0.2s ease;
}

.input-field input:is(:focus, :valid) {
    padding: 16px 15px 0;
}

.input-field input:is(:focus, :valid)~label {
    transform: translateY(-120%);
    color: #00bcd4;
    font-size: 0.75rem;
}

.form-box a {
    color: #00bcd4;
    text-decoration: none;
}

.form-box a:hover {
    text-decoration: underline;
}

form :where(.forgot-pass-link, .policy-text) {
    display: inline-flex;
    margin-top: 13px;
    font-size: 0.95rem;
}

form button {
    width: 100%;
    color: #fff;
    border: none;
    outline: none;
    padding: 14px 0;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 3px;
    cursor: pointer;
    margin: 25px 0;
    background: #00bcd4;
    transition: 0.2s ease;
}

form button:hover {
    background: #0097a7;
}

.form-content .bottom-link {
    text-align: center;
}

.form-popup .signup,
.form-popup.show-signup .login {
    display: none;
}

.form-popup.show-signup .signup {
    display: flex;
}

.signup .policy-text {
    display: flex;
    margin-top: 14px;
    align-items: center;
}

.signup .policy-text input {
    width: 14px;
    height: 14px;
    margin-right: 7px;
}

@media (max-width: 950px) {
    .navbar :is(.hamburger-btn, .close-btn) {
        display: block;
    }

    .navbar {
        padding: 15px 0;
    }

    .navbar .logo img {
        display: none;
    }

    .navbar .logo h2 {
        font-size: 1.4rem;
    }

    .navbar .links {
        position: fixed;
        top: 0;
        z-index: 10;
        left: -100%;
        display: block;
        height: 100vh;
        width: 100%;
        padding-top: 60px;
        text-align: center;
        background: #fff;
        transition: 0.2s ease;
    }

    .navbar .links.show-menu {
        left: 0;
    }

    .navbar .links a {
        display: inline-flex;
        margin: 20px 0;
        font-size: 1.2rem;
        color: #000;
    }

    .navbar .links a:hover {
        color: #00BCD4;
    }

    .navbar .login-btn {
        font-size: 0.9rem;
        padding: 7px 10px;
    }
}

@media (max-width: 760px) {
    .form-popup {
        width: 95%;
    }

    .form-box .form-details {
        display: none;
    }

    .form-box .form-content {
        padding: 30px 20px;
    }
}




/* Style the nav */

.slider {
    position: relative;
    width: 1330px;
    margin: auto;
    overflow: hidden;
   
   
    height: 800px;
    top: 0;
    width: 100%;
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
   
    position: relative;
}

.slide img {
    width: 100%;
    height: auto;
}

.quote {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 2em;
    text-align: center;
   
    padding-left: 150px;
    padding-top: 100px;
}

.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
    border-radius: 50%;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}



.slider2 {
    position: relative;
    width: 80%;
    max-width: 1000px;
    height: 410px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color:black;
    margin-left: 160px;
   
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease-in-out;
    
}

.slide2 {
    display: flex;
    min-width: 100%;
    justify-content: space-around; /* Space between boxes */
}

.box {
    flex: 1;
    margin: 10px; /* Space around each box */
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1px solid #ddd;
    border-radius: 10px; /* Rounded corners for each box */
    background-color: black;
 /* Background color for each box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for each box */
   
}

.box img {
    max-width: 100px;
    border-radius: 10px;
    margin-right: 20px;
}

.info {
    flex: 1;
    color: white;
    
}

.info h2 {
    margin: 0 0 10px;
    font-size: 20px;
   
}

.info p {
    margin: 0;
    font-size: 14px;
   
}

.controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    pointer-events: none;
    
}

.controls span {
    pointer-events: all;
    cursor: pointer;
    font-size: 24px;
    color: #333;
    padding: 10px;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 20%;
    transition: background-color 0.3s;
}

.controls span:hover {
    background-color: yellowgreen;
}

.background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black;
    background-size: cover;
    filter: blur(2px);
    z-index: -1; /* Ensure the background is behind the content */
}

section
    {
     display: grid;
     
     min-height: 80vh;
    }
    .hi
    {
        opacity: 0;
        filter: blur(5px);
        transform: translateX(-100%);
        transition: all 1s;
        background-image: url('pix4.jpeg');
       
    }
   
    .show
    {
        opacity: 1;
        filter: blur(0);
        transform: translateX(0);
    }
    @media(prefers-reduced-motion)
    {
        .hi
        {
            transition: none;
        }
    }
   
   


@keyframes flash {
    0% {
        background-color: black;
    }
    50%{
        background-color: black; 
    }
   
}

button {
    padding: 10px;
    background-color: grey;
    color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: white;
}

.buttondetect {
            padding: 10px;
            border: none;
            background-color: #4CAF50; /* Green */
            color: white;
            font-family: Arial, sans-serif;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .buttondetect img {
            margin: 10px 0; /* Space above and below the image */
        }


        .image-background {
            width: 300px;
            height: 200px;
            background-image: url('pix7.webp');
             /* Ensure the image covers the entire div */
             /* Ensure the image covers the entire div */
             background-size: cover;
            background-position: center; /* Center the background image */
            
            transition: opacity 0.5s ease-in-out;
        }
        .image-background.visible {
    opacity: 1;
    animation: flash 0.5s ease-in-out;
}
       


.footer {
  background-color: black;
  color: #fefefe;
 
  width: 100%;
  bottom: 0;
  left: 0;
}

.footer .heading {
  color: #fefefe;
  max-width: 1010px;
  width: 90%;
  text-transform: uppercase;
  margin: 0 auto;
  margin-bottom: 3rem;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
}

.footer .content {
  display: flex;
  justify-content: space-evenly;
  margin: 1.5rem;
}

.footer .content p {
  margin-bottom: 1.3rem;
}

.footer .content a {
  text-decoration: none;
  color: #fefefe;
}

.footer .content a:hover {
  border-bottom: 1px solid #971717;
}

.footer .content h4 {
  margin-bottom: 1.3rem;
  font-size: 19px;
}

footer {
  text-align: center;
  margin-bottom: 2rem;
}

footer hr {
  margin: 2rem 0;
}

@media (max-width: 767px) {
  .footer .content {
    display: flex;
    flex-direction: column;
    font-size: 14px;
  }

  .footer {
    position: unset;
  }
}

@media (min-width: 768px) and (max-width: 1024px) {
  .footer .content,
  .footer {
    font-size: 14px;
  }
}

@media (orientation: landscape) and (max-height: 500px) {
  .footer {
    position: unset;
  }
}
</style>
<body>
    <div id="home">
    <header>
        <nav class="navbar" id="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="logo.png" alt="logo">
                <h2>proven</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#detect">Product analysis</a></li>
                <li><a href="#">Food analysis</a></li>
                <li><a href="exp1.php">Query</a></li>
            </ul>
            <button class="login-btn" id="heading">LOG IN</button>
        </nav>
    </header>
    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="login1.php" method="POST">
                    
                    <div class="input-field">
                        <input type="text" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="register1.php" method="POST">
                <div class="input-field">
                        <input type="text" name="firstname" required>
                        <label>Enter your username</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Create password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cpass" required>
                        <label>Confirm password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account? 
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>

   
    <div class="slider">
        <div class="slides">
            <!-- Slide 1 -->
            <div class="slide">
                <img src="home.jpg" alt="Image 1">
                <div class="quote"><h2>MAKE EVERY BITE AND CHEW WORTH IT</h2></div>
            </div>
            <!-- Slide 2 -->
            <div class="slide">
                <img src="pix.jpg" alt="Image 2">
                <div class="quote"><h2 style="padding-left:300px;">WHEN FOOD GOES WRONG,DAYS TOO.</h2></div>
            </div>
            <!-- Add more slides as needed -->
        </div>
        <!-- Navigation Arrows -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
   
    <section class="hi" style="background-image: url('pix10.jpeg');background-size: cover; background-position: center;height:600px">
    <h1 style="color:whitesmoke;margin-left:550px;font-size:30px;">Know Your Food</h1>
    <div class="slider2">
        <div class="slider-container">
            <div class="slide2 ">
                <div class="box">
                    <img src="kcal.png" alt="Image 1">
                    <div class="info">
                        <h2>Calories(Energy)</h2>
                        <p>Calories are a unit of energy that measures how much energy a food provides to the body from all sources, including carbohydrates, fat, protein, and alcohol.To achieve or maintain a healthy body weight, balance the number of calories you eat and drink with the number of calories your body uses. 2,000 calories a day is used as a general guide for nutrition advice.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="fatty.png" alt="Image 2">
                    <div class="info">
                        <h2>Total Fats</h2>
                        <p>Fat helps the body absorb vitamin A, vitamin D and vitamin E. These vitamins are fat-soluble, which means they can only be absorbed with the help of fats. if you eat 2,000 calories per day, you should aim for 44–78 grams of fat.trans fats are harmful to your health, saturated fats are not currently linked with increased heart disease risk.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="pro1.png" alt="Image 3">
                    <div class="info">
                        <h2>Protiens</h2>
                        <p>Eating enough protein is important for muscle building and maintenance, as well as optimal growth and development. However, consuming too much protein can lead to digestive, renal, and vascular abnormalities.We recommend 0.8 grams of protein per kilogram of body weight, or about 7 grams per 20 pounds.</p>
                    </div>
                </div>
            </div>
            <div class="slide2">
                <div class="box">
                    <img src="carb.png" alt="Image 4">
                    <div class="info">
                        <h2>Total Carbohydrates</h2>
                        <p><b>Dietary fiber</b> includes naturally occurring fibers in plants (such
as beans, fruits, lentils, nuts, peas, vegetables, seeds, whole
grains, and foods made with whole grain ingredients.Total sugars include sugars found naturally in foods such as
dairy products, fruits, and vegetables and added sugars.The Daily Value for total carbohydrate is 275 g per day.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="col.png" alt="Image 5">
                    <div class="info">
                        <h2>Cholestrol</h2>
                        <p>Dietary cholesterol is found only in animal products, including:
• Beef fat (tallow and suet), chicken fat, and pork fat (lard)
• Dairy products (such as milk, cheese, and yogurt)
• Egg yolks
• Meats and poultry
• Processed meat and poultry products (such as bacon, hot dogs,
jerky, some luncheon meats, and sausages)
• Shellfish (such as lobster and shrimp).
The Daily Value for cholesterol is less
than 300 mg per day</p>
                    </div>
                </div>
                <div class="box">
                    <img src="sod.png" alt="Image 6">
                    <div class="info">
                        <h2>Sodium</h2>
                        <p>The Daily Values are reference
amounts of nutrients to consume or not to exceed
each day. The Daily Value for sodium is less than
2,300 milligrams (mg) per day.most dietary sodium
(over 70%) comes from eating packaged and
prepared foods—not from table salt added to food
when cooking or eating.5% DV or less of sodium per serving is considered low, and 20% DV or more of sodium per serving is considered high. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="controls">
            <span class="prev1">&#10094;</span>
            <span class="next1">&#10095;</span>
        </div>
        </div>
    </div>
    </section>
    <section class="hi" style="display: flex;
  flex-direction: row;
  align-items: center;
 
       " id="about" >
      
        <div style="display: flex;
        flex-direction: column;
        color:white;">
        <p style="font-family:head;font-size:50px;padding-left:20px;" >ABOUT US</p>
        <p style="font-family:slide;font-size:20px;width:600px;padding-left:20px;">Proven helps you to reconsider the food products for your consumption and tends to retain your balanced diet.We check the nutrition facts of any product you wanted to consume and we will be rating it on a scale basis on how much it is healthier for your body.</p>
       
        </div>
    </section>
     <div  style="width:1349px;height:1000px;" id="detect" class="image-background">
        <div style="color:white;padding-top:2px;">
        <h1 style="font-family:cap;margin-left:800px;">ANALYZE YOUR FOOD</h1>
        <p style="font-family:cap;font-size:20px;margin-left:800px;">Get Your proven website in your hands besides your cart during your shopping.
        Enter yor product details we need and thrive to revive portions of facts with us with enthusiastic regulation about your food easily.Happy Shopping.</p>
        <button style="margin-left:800px; font-family:head;font-size:25px;" onclick="navigateToPage()">GET STARTED</button>
        </div>
        <div>
        
        </div>
    </div>
    
    
    </div>

    
               
                
    <div class="footer">
        <div class="heading">
          <h2>proven<sup>™</sup></h2>
        </div>
        <div class="content">
          <div class="social-media">
            <h4>Social</h4>
            <p>
              <a href="#"
                ><i class="fab fa-linkedin"></i> Linkedin</a
              >
            </p>
            <p>
              <a href="#"
                ><i class="fab fa-twitter"></i> Twitter</a
              >
            </p>
            <p>
              <a href=""
                ><i class="fab fa-github"></i> Github</a
              >
            </p>
            <p>
              <a href=""
                ><i class="fab fa-facebook"></i> Facebook</a
              >
            </p>
            <p>
              <a href=""
                ><i class="fab fa-instagram"></i> Instagram</a
              >
            </p>
          </div>
          <div class="links">
            <h4>Quick links</h4>
            <a href="#home">Home</a></li>
                <p><a href="#about">About</a></p>
                <p><a href="#detect">Product analysis</a></p>
                <p><a href="#">Food analysis</a></p>
                <p><a href="exp1.php">Query</a></p>
          </div>
          <div class="details">
            <h4 class="address">Address</h4>
            <p>
              No.10 kailavani street,jayamoorthyraja nagar <br />
              mudaliarpet puducherry-10.
            </p>
            <h4 class="mobile">Mobile</h4>
            <p><a href="#">+91-6381270148</a></p>
            <h4 class="mail">Email</h4>
            <p><a href="#">dhanamsri1975@gmail.com</a></p>
          </div>
        </div>
        <footer>
          <hr />
          © 2022 proven.
        </footer>
      </div>    

                 
                 
    
    <script>
       let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.slide');
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    } else {
        currentSlide = index;
    }
    const offset = -currentSlide * 100;
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function changeSlide(step) {
    showSlide(currentSlide + step);
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);
});

// Initialize the slider
showSlide(currentSlide);
//////////////////////////////////////
let currentIndex2= 0;

const slides2 = document.querySelectorAll('.slide2');
const nextButton2= document.querySelector('.next1');
const prevButton2 = document.querySelector('.prev1');

function showSlide2(index2) {
    if (index2 >= slides2.length) {
        currentIndex2 = 0;
    } else if (index2 < 0) {
        currentIndex2 = slides2.length - 1;
    } else {
        currentIndex2 = index2;
    }

    const offset2 = -currentIndex2 * 100;
    document.querySelector('.slider-container').style.transform = `translateX(${offset2}%)`;

    slides2.forEach((slide2, i) => {
        slide2.classList.toggle('active', i === currentIndex2);
    });
}

nextButton2.addEventListener('click', () => {
    showSlide2(currentIndex2 + 1);
});

prevButton2.addEventListener('click', () => {
    showSlide2(currentIndex2 - 1);
});

// Initialize the slider
showSlide2(currentIndex2);


let lastScrollTop = 0;
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop) {
        // Scrolling down
        navbar.style.top = '-50px'; // Adjust as needed
    } else {
        // Scrolling up
        navbar.style.top = '0';
    }
    lastScrollTop = scrollTop;
});



const hi1=document.querySelectorAll(".hi");
        const observer=new IntersectionObserver((entries)=>
    {
        entries.forEach((entry=>
            {
                console.log(entry);
                if(entry.isIntersecting)
                {
entry.target.classList.add('show');
                }
                else
                {
                    entry.target.classList.remove('show'); 
                }
            }
        ));
    });
    hi1.forEach((el)=>observer.observe(el));


    document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('nav li');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target');
      const targetSection = document.getElementById(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});


document.addEventListener('DOMContentLoaded', () => {
    const flashDiv = document.querySelector('.flash');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                flashDiv.classList.add('visible');
            } else {
                flashDiv.classList.remove('visible');
            }
        });
    });

    observer.observe(flashDiv);


});

function navigateToPage() {
            window.location.href = "newpage.php";
        }

        const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup.querySelector(".close-btn");
const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

// Show mobile menu
hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
});

// Hide mobile menu
hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

// Show login popup
showPopupBtn.addEventListener("click", () => {
    document.body.classList.toggle("show-popup");
});

// Hide login popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

// Show or hide signup form
signupLoginLink.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
    });
});
    </script>
   
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit;
}
?>
