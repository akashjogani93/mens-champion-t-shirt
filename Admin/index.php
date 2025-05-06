<?php include('navigation.php');
?>
<style>
  /* Card Styling */
.custom-card {
  height: 100%;
  border: none;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}
.custom-card:hover {
  transform: translateY(-5px);
}
.card-img-top {
  height: 250px;
  object-fit: cover;
}
.card-body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80px;
}
/* Buttons */
.btn-primary {
  background-color: #007bff;
  border: none;
}

.btn-primary:hover {
  background-color: #0056b3;
}

/* Footer */
footer {
  background-color: #212529;
  color: #f8f9fa;
  padding: 30px 0;
  margin-top: 50px;
}

footer a:hover {
  text-decoration: underline;
}
.banner-img {
    width: 100%;
    height: 500px; /* you can adjust height here */
    object-fit: cover; /* this will make image cover the box without stretching */
    border-radius: 10px; /* optional: rounded corners */
  }

/* Responsive Tweaks */
@media (max-width: 768px) {
  .card-img-top {
    height: 200px;
  }
}
</style>
<div class = "row">
<div class = "col-12">
	<img src="img/banner.jpg" alt="Italian Trulli"width="100%" class="banner-img">
</div>	
</div>
<div class="container my-5">
  <div class="row g-4 text-center">
  
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/8.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/9.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/10.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container my-5">
  <div class="row g-4 text-center">
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/6.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/7.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card custom-card">
        <img src="img/10.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="#" class="btn btn-primary">Design Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

  </body>
  <!-- Footer Section -->
<footer style="background-color: #333; color: white; padding: 20px 0; text-align: center;">
    <div>
        <p>&copy; 2025 YourPrintStore. All Rights Reserved.</p>
        <p>Follow us on:
            <a href="https://www.facebook.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Facebook</a>|
            <a href="https://www.instagram.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Instagram</a>|
            <a href="https://www.twitter.com" target="_blank" style="color: white; text-decoration: none; margin: 0 10px;">Twitter</a>
        </p>
        <p><a href="/terms-of-service" style="color: white; text-decoration: none;">Terms of Service</a> | <a href="/privacy-policy" style="color: white; text-decoration: none;">Privacy Policy</a></p>
    </div>
</footer>
</html>  