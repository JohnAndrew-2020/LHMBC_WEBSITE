<?php
$ip = $_SERVER['REMOTE_ADDR'];
$bad_patterns = ["../", "<script>", "UNION SELECT", "--", "' OR 1=1"];

foreach ($bad_patterns as $pattern) {
    if (stripos($_SERVER['REQUEST_URI'], $pattern) !== false) {

        // Example log
        file_put_contents("security_log.txt", date('Y-m-d H:i:s') . " Suspicious: $ip - $pattern\n", FILE_APPEND);

        // Example safe block page
        die("<h1>? Access Blocked</h1><p>Your request was flagged as malicious.</p>");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lord Of The Harvest Baptist Church</title>
    <link rel="icon" type="image/x-icon" href="MBC_Image.ico">

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        line-height: 1.6;
        color: #333;
    }

    /* ----------------------------------------------------
       NAVIGATION MENU
    ---------------------------------------------------- */
    .navbar {
        width: 100%;
        background: white;
        padding: 15px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* LOGO + TITLE AREA */
    .logo-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo-container img {
        width: 45px;
        height: 45px;
        object-fit: cover;
    }

    .site-title {
        font-size: 1.3rem;
        font-weight: bold;
        color: #333;
    }

    /* NAV LINKS */
    .nav-links {
        list-style: none;
        display: flex;
        gap: 25px;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        text-decoration: none;
        color: #333;
        font-size: 0.95rem;
        padding: 8px;
        transition: 0.2s;
    }

    .nav-links li a:hover {
        color: #ff7b32;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 35px;
        background: white;
        list-style: none;
        padding: 10px 0;
        min-width: 150px;
        border-radius: 5px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        display: none;
        z-index: 999;
    }

    .dropdown-menu li a {
        padding: 8px 15px;
        display: block;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .contact-btn {
        padding: 8px 15px;
        border: 1px solid #333;
        border-radius: 5px;
    }

    .contact-btn:hover {
        background: #333;
        color: white;
    }

    /* MOBILE MENU */
    .hamburger {
        display: none;
        font-size: 30px;
        cursor: pointer;
    }

    #menu-toggle {
        display: none;
    }

    @media (max-width: 768px) {
        .nav-links {
            position: absolute;
            top: 70px;
            right: 0;
            background: white;
            width: 220px;
            flex-direction: column;
            align-items: flex-start;
            padding: 15px;
            display: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        #menu-toggle:checked ~ .nav-links {
            display: flex;
        }

        .hamburger {
            display: block;
        }
    }

    /* ----------------------------------------------------
       HERO SECTION
    ---------------------------------------------------- */
    .hero {
        background-image: url('images/church-bg-1.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        min-height: 70vh;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        color: white;
        padding: 20px;

        transition: background-image 1s ease-in-out;

        background-color: rgba(0,0,0,0.6);
        background-blend-mode: overlay;
    }

    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2rem;
    }


    /* Scope it to only the hero section or remove it entirely */
    .hero img {
    max-width: 35%;
    height: auto;
    border-radius: 5px;
    }
    

    .buttons {
        padding: 40px 20px;
        background-color: #fff;
    }

    .btn {
        display: inline-block;
        padding: 15px 30px;
        margin: 10px;
        text-decoration: none;
        color: white;
        background-color: #333;
        border-radius: 5px;
        font-size: 1rem;
        transition: background 0.3s;
    }

    .btn:hover {
        background-color: #555;
    }

    .btn.donate {
        background-color: #d9534f;
    }

    .btn.donate:hover {
        background-color: #c9302c;
    }

    footer {
        background-color: #222;
        color: #ccc;
        padding: 20px;
        font-size: 0.9rem;
    }

    @media (max-width: 600px) {
        .hero h1 {
            font-size: 1.8rem;
        }

        .btn {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
    }
     
    
    /* -------------------------------------------
       ADVISORY SECTION
    ------------------------------------------- */
    .advisory {
        background: #1f2a36;  
        color: #eee;
        padding: 25px 20px;
        text-align: left;
        margin: 0 auto;
        max-width: auto;
        border-left: 6px solid #ff7b32;
        border-radius: 6px;
        margin-top: -40px; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .advisory-title {
        font-weight: bold;
        color: #ff7b32;
        font-size: 1.1rem;
        margin-bottom: 8px;
        display: flex;
        align-items: left;
        gap: 6px;
    }

    .advisory-title .icon {
        font-size: 1.3rem;
    }

    .advisory p {
        margin: 6px 0;
        line-height: 1.4;
        font-size: 0.95rem;
    }   
    
/* -------------------------------------------
       INSPIRATION SECTION 
    ------------------------------------------- */
    .inspiration-section {
        padding: 60px 20px;
        background-color: #fff; /* Clean white background */
    }

    .section-header {
        margin-bottom: 40px;
        font-size: 2rem;
        color: #333;
        position: relative;
        display: inline-block;
    }
    
    /* Adds a little underline decoration to the header */
    .section-header::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: #ff7b32;
        margin: 10px auto 0;
    }

    .inspiration-card {
        display: flex;
        flex-direction: row;
        background: #fdfdfd;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Soft shadow */
        max-width: 900px;
        margin: 0 auto;
        overflow: hidden; /* Keeps image corners rounded */
        border: 1px solid #eee;
    }

    .inspiration-image {
        flex: 1;
        min-height: 300px;
    }

    .inspiration-image img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures image covers area without stretching */
        border-radius: 0; /* Let container handle radius */
    }

    .inspiration-content {
        flex: 1.2;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: left;
    }

    .verse-block {
        margin-bottom: 25px;
        border-left: 4px solid #ff7b32; /* Orange accent line */
        padding-left: 15px;
    }

    .verse-text {
        font-family: 'Georgia', serif; /* Serif font looks more "Biblical" */
        font-style: italic;
        font-size: 1.1rem;
        color: #555;
        margin: 0 0 10px 0;
    }

    .verse-ref {
        font-weight: bold;
        font-size: 0.9rem;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Update Buttons area to fit nicely below */
    .action-area {
        margin-top: 50px;
    }

    /* Mobile Responsiveness for the Card */
    @media (max-width: 768px) {
        .inspiration-card {
            flex-direction: column; /* Stack image on top of text */
        }
        .inspiration-image {
            height: 250px;
        }
        .inspiration-content {
            padding: 25px;
            text-align: center;
        }
        .verse-block {
            border-left: none; /* Remove side border on mobile */
            border-bottom: 2px solid #ff7b32; /* Put border on bottom instead */
            padding-left: 0;
            padding-bottom: 15px;
        }
    }

/* -------------------------------------------
       GALLERY SECTION
------------------------------------------- */
.gallery-section {
    padding: 50px 20px;
    background-color: #fff;
    text-align: center;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
}

.gallery-item {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}


.gallery-item img {
    width: 100%;
    max-width: 100%;    /* <--- This overrides the global 35% limit */
    height: 300px;      /* Increased height so faces fit better */
    object-fit: cover;  /* Ensures the image fills the box without stretching */
    object-position: top center; /* Focuses on faces/heads instead of chests */
    display: block;
}


.gallery-item:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Responsive adjustment for smaller screens */
@media (max-width: 600px) {
    .gallery-item img {
        height: 150px;
    }
    
    
}
 
    
/* -------------------------------------------
   ABOUT US SECTION
------------------------------------------- */
.about-section {
    padding: 50px 20px;
    background: #f7f7f7;
    text-align: center;
}

.about-container {
    max-width: 900px;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 30px;
    justify-content: center;
}

.about-container img {
    width: 300px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.about-text {
    max-width: 500px;
    text-align: left;
}

.about-text h2 {
    font-size: 1.8rem;
    margin-bottom: 10px;
    color: #333;
}

.about-text p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

@media (max-width: 768px) {
    .about-container {
        flex-direction: column;
        text-align: center;
    }
    .about-text {
        text-align: center;
    }
}
    

/* -------------------------------------------
       CONNECT WITH US SECTION
------------------------------------------- */
.connect-section {
    padding: 60px 20px;
    background: #dfdfdf;
    text-align: center;
}

.connect-container {
    max-width: 1000px;
    margin: 30px auto 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.connect-card {
    background: #f7f7f7;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.connect-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.connect-card h3 {
    margin-bottom: 10px;
    color: #ff7b32;
}

.connect-card p {
    margin: 0;
    color: #333;
    line-height: 1.5;
}

/* -------------------------------------------
   FOOTER 
------------------------------------------- */
.site-footer {
    background: #1e1e1e;
    color: #ccc;
    padding-top: 50px;
    font-size: 0.9rem;
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 20px 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
}

.footer-column h3 {
    color: #ff7b32;
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.footer-column p {
    line-height: 1.6;
    margin: 8px 0;
}

.footer-column .verse {
    font-style: italic;
    color: #aaa;
    margin-top: 12px;
}

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column ul li {
    margin-bottom: 8px;
}

.footer-column ul li a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-column ul li a:hover {
    color: #ff7b32;
}

/* Social icons */
.footer-social {
    margin-top: 15px;
}

.footer-social a {
    display: inline-block;
    margin-right: 10px;
    font-size: 1.1rem;
    color: #ccc;
    text-decoration: none;
    transition: 0.3s;
}

.footer-social a:hover {
    color: #ff7b32;
}

/* Bottom bar */
.footer-bottom {
    background: #151515;
    text-align: center;
    padding: 15px 10px;
    border-top: 1px solid #333;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.85rem;
    color: #aaa;
}

/* Mobile tweaks */
@media (max-width: 600px) {
    .site-footer {
        text-align: center;
    }

    .footer-social a {
        margin: 0 8px;
    }
    
}

  
</style>

</head>

<body>
<body>
<div style="display:none;" aria-hidden="true">
    <p>This platform is a non-profit entity for Lord of the Harvest Community Church. 
       This script contains no malicious intent, does not harvest private data, 
       and is for prayer requests and ministry support.</p>
</div>

<nav class="navbar">
    
    <div class="logo-container">
        <img src="images/MBC_Image_u5bxbku5bxbku5bx.png" alt="Church Logo">
        <span class="site-title">LORD OF THE HARVEST</span>
    </div>

    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="hamburger">&#9776;</label>

<ul class="nav-links">
    <li><a href="#">Home</a></li>

    <li class="dropdown">
        <a href="#">About ?</a>
        <ul class="dropdown-menu">
            <li><a href="content_not_available.php">Our Mission</a></li>
            <li><a href="content_not_available.php">Our Beliefs</a></li>
            <li><a href="content_not_available.php">Leadership</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#">Connect ?</a>
        <ul class="dropdown-menu">
            <li><a href="content_not_available.php">Small Groups</a></li>
            <li><a href="content_not_available.php">Youth</a></li>
            <li><a href="content_not_available.php">Adults</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#">Ministries ?</a>
        <ul class="dropdown-menu">
            <li><a href="content_not_available.php">Kids</a></li>
            <li><a href="content_not_available.php">Worship</a></li>
            <li><a href="content_not_available.php">Outreach</a></li>
        </ul>
    </li>

    <li><a href="contact.php" class="contact-btn">Contact Us</a></li>
</ul>

</nav>

<header class="hero" id="hero-section">
    <h1>Lord of The Harvest Community Church</h1>
    <p>A place to belong, believe, and be transformed</p>
</header>

<br>
<section class="advisory">
    <div class="advisory-title">
        <span class="icon">??</span> ANNOUNCEMENTS
    </div>

    <p><strong>SUNDAY SERVICES:</strong> 9:30 AM, 11:30 AM, 5:30 PM</p>
    <p>MBC is celebrating 111 Years of God’s Faithfulness. Click this to know more.</p>

    <p><a href="#" style="color:#ffb366; text-decoration:none;">Learn more about How to Pledge</a></p>

    <p><strong>THE 2025 MBC CHRISTMAS GIVING PROJECT</strong></p>
</section>

<section class="inspiration-section">
    <h2 class="section-header">Bible Inspiration</h2>
    
    <div class="inspiration-card">
        <div class="inspiration-image">
            <img src="images/12938.jpg" alt="Hands praying over Bible">
        </div>

        <div class="inspiration-content">
             
            <div class="verse-block">
                <p class="verse-text">
                    “Therefore encourage one another and build one another up, just as you are doing.”
                </p>
                <div class="verse-ref">1 Thessalonians 5:11</div>
            </div>

            <div class="verse-block">
                <p class="verse-text">
                    “Rejoice with those who rejoice, and weep with those who weep.”
                </p>
                <div class="verse-ref">Romans 12:15</div>
            </div>

        </div>
    </div>

    <div class="action-area">
        <a href="prayer.php" class="btn">Send Prayer Request</a>
        <a href="GiveDonate.php" class="btn donate">Tithes & Offerings</a>
    </div>
</section>

<section class="gallery-section">
    <h2 class="section-header">Gallery</h2>

    <div class="gallery-grid">
        <div class="gallery-item"><img src="images/585593820_1428828958814314_6104013660882118529_n.jpg" alt="Youth Member 1"></div>
        <div class="gallery-item"><img src="images/582327555_4336086329955684_858359037500983357_n.jpg" alt="Youth Member 2"></div>
        <div class="gallery-item"><img src="images/592324140_1872752290337804_7128888643442268486_n.jpg" alt="Church Member 1"></div>
        <div class="gallery-item"><img src="images/576039367_1150875540449509_6389312145060619458_n.jpg" alt="Church Member 2"></div>
    </div>
</section>

<br><br>

<section class="about-section">
    <div class="about-container">
        <img src="images/QOx5Cewg.jpg" alt="About Our Church">

        <div class="about-text">
            <h2>About Us</h2>
            <p>
                We are a Christ-centered community dedicated to sharing God's love,
                serving people, and helping every person grow spiritually. 
                Our church believes in fellowship, compassion, and the transforming
                power of God's Word.
            </p>
            <p>
                Whether you are new in faith or seeking a spiritual home, 
                Lord of the Harvest Community Church welcomes you with open arms.
            </p>
        </div>
    </div>
</section>


<section class="connect-section">
    <h2 class="section-header">Connect With Us</h2>

    <div class="connect-container">
        
        <div class="connect-card">
            <h3>?? Address</h3>
            <p>Lord of The Harvest Missionary Baptist Church<br>
            AFP Road corner odonnel st., brgy holy spirit, quezon city.</p>
        </div>

        <div class="connect-card">
            <h3>?? Contact Number</h3>
            <p>+63 912 345 6789</p>
        </div>

        <div class="connect-card">
            <h3>?? Email</h3>
            <p>lordoftheharvestchurch@gmail.com</p>
        </div>

    </div>
</section>

<footer class="site-footer">
    <div class="footer-container">

        <div class="footer-column">
            <h3>Lord of the Harvest</h3>
            <p>
                A Christ-centered community committed to worship, discipleship,
                fellowship, and reaching souls for Jesus Christ.
            </p>
            <p class="verse">
                “The harvest truly is plentiful, but the laborers are few.”
                <br><strong>– Matthew 9:37</strong>
            </p>
        </div>

        <div class="footer-column">
            <h3>Service Schedule</h3>
            <ul>
                <li>Sunday Worship – 9:30 AM</li>
                <li>Sunday Worship – 11:30 AM</li>
                <li>Sunday Worship – 5:30 PM</li>
                <li>Midweek Prayer – Wed 7:00 PM</li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Ministries</a></li>
                <li><a href="prayer.php">Prayer Request</a></li>
                <li><a href="#">Give / Donate</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Contact Us</h3>
            <p>?? AFP Road corner odonnel st., brgy holy spirit, quezon city.</p>
            <p>?? +63 912 345 6789</p>
            <p>?? lordoftheharvestchurch@gmail.com</p>

            <div class="footer-social">
                <a href="https://www.facebook.com/lhmbc.777?rdid=seidw0rNiOym6gpa&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1Adob64Xjq%2F" title="Facebook">??</a>
                <a href="#" title="YouTube">?</a>
                <a href="#" title="Email">?</a>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <p>
            © 2025 Lord of the Harvest Community Church. All Rights Reserved.<br>
            <small>Built to glorify God and serve His people.</small>
        </p>
    </div>
</footer>

<script>
    const heroSection = document.getElementById('hero-section');

    const images = [
        'url("images/588603513_1471866271415583_8874363772741797361_n.jpg")',
        'url("images/591509996_1371998677952591_6070484007228428423_n.jpg")',
        'url("images/583175632_1170962227845301_6122211291351949683_n.jpg")',
        'url("images/589198602_4330147780541266_2056872068817274514_n.jpg")',
        'url("images/588467612_1383739639802962_9056147162887053355_n.jpg")'
    ];

    let currentIndex = 0;

    function changeBackground() {
        currentIndex = (currentIndex + 1) % images.length;
        heroSection.style.backgroundImage = images[currentIndex];
    }

    setInterval(changeBackground, 6000);
</script>

<script>
(function () {
    'use strict';

    /* ---------- Disable Right Click ---------- */
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });

    /* ---------- Disable Text Selection ---------- */
    document.addEventListener('selectstart', function (e) {
        e.preventDefault();
    });

    /* ---------- Disable Common Copy & Dev Tools Keys ---------- */
    document.addEventListener('keydown', function (e) {
        // Ctrl+C, Ctrl+U, Ctrl+S, Ctrl+P
        if (
            (e.ctrlKey && ['c', 'u', 's', 'p'].includes(e.key.toLowerCase())) ||
            // F12
            e.key === 'F12' ||
            // Ctrl+Shift+I or Ctrl+Shift+J
            (e.ctrlKey && e.shiftKey && ['i', 'j'].includes(e.key.toLowerCase()))
        ) {
            e.preventDefault();
            return false;
        }
    });

    /* ---------- DevTools Size Detection ---------- */
    let devtoolsCheck = setInterval(function () {
        if (window.outerWidth - window.innerWidth > 160 ||
            window.outerHeight - window.innerHeight > 160) {
            console.warn('Inspection detected.');
        }
    }, 1000);

    /* ---------- SECRET CREATOR KEY ---------- */
    document.addEventListener('keydown', function (e) {
        // CTRL + ALT + J
        if (e.ctrlKey && e.altKey && e.key.toLowerCase() === 'j') {
            alert(

"==========================================\n" +
"\n" +
  "WEBSITE SOURCE IDENTIFICATION (WATERMARK)\n" +
  "Project : LORD OF THE HARVEST - Prayer Request Page\n" +
  "Creator : John Andrew F. Fallurin\n" +
  "Date    : 12/26/2025\n" +
  "Notice  : Unauthorized copying or redistribution of\n" +
            "this source, design, or logic is prohibited.\n" +
"" 
                
            );
        }
    });

})();
</script>

<script>
(function() {
    // Discourages hardware access (Camera/Mic)
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // No action taken to ensure hardware remains inactive
    }

    // Prevents automatic downloading/dragging of images
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('dragstart', function(e) {
            e.preventDefault();
        });
        img.style.webkitTouchCallout = "none"; // Disables mobile long-press
    });

    // Blocks Ctrl+S (Save) attempts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key.toLowerCase() === 's') {
            e.preventDefault();
            alert("This content is protected for non-profit ministry use.");
        }
    });
})();
</script>

</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/695a3694e2ad73197c6f78b9/1je46adj9';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>