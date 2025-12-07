<style>
/* 🌌 Footer Elegan Profesional */

.footer {
  background: #0e1624;
  color: #f8f9fa;
  font-family: 'Poppins', sans-serif;
  position: relative;
  overflow: hidden;
}

/* Gradasi halus untuk kesan dalam */
.footer::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(145deg, #0b121d, #11213a);
  opacity: 0.95;
  z-index: 0;
}

.footer > * {
  position: relative;
  z-index: 1;
}

/* Header teks section */
.footer h4 {
  font-weight: 600;
  color: #ffffff;
  border-left: 4px solid #1e90ff;
  padding-left: 12px;
  margin-bottom: 1.2rem;
}

/* Link elegan */
.footer-link {
  display: block;
  color: #c9d1da;
  margin-bottom: 10px;
  text-decoration: none;
  font-size: 15px;
  transition: all 0.3s ease;
}

.footer-link i {
  color: #1e90ff;
  transition: all 0.3s ease;
}

.footer-link:hover {
  color: #ffffff;
  padding-left: 6px;
}

.footer-link:hover i {
  color: #ffffff;
}

/* Info bar (Address, Mail, etc) */
.footer .info-box {
  background: #14223a;
  border: 1px solid #1e90ff3a;
  border-radius: 16px;
  transition: all 0.3s ease;
}

.footer .info-box:hover {
  background: #1b2e4b;
  transform: translateY(-4px);
  box-shadow: 0 0 15px rgba(30, 144, 255, 0.3);
}

/* Ikon lingkaran */
.footer .info-icon {
  width: 70px;
  height: 70px;
  background-color: #1e90ff20;
  color: #1e90ff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Newsletter */
.footer .newsletter input {
  background-color: #1a2233;
  border: 1px solid #273043;
  color: #ffffff;
}

.footer .newsletter input::placeholder {
  color: #9aa3b2;
}

.footer .newsletter button {
  background-color: #1e90ff;
  border: none;
  color: #ffffff;
  font-weight: 600;
  transition: all 0.3s ease;
}

.footer .newsletter button:hover {
  background-color: #0078e7;
}

/* Copyright */
.copyright {
  background-color: #0b121d;
  border-top: 1px solid #1e90ff33;
  color: #b8c2d1;
  font-size: 14px;
}

.copyright a {
  color: #ffffff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.copyright a:hover {
  color: #1e90ff;
  text-decoration: underline;
}

  /* 🔹 Copyright Style Elegan */
  .copyright-elegant {
    background-color: #0b121d; /* Warna gelap elegan */
    color: #f8f9fa; /* Teks putih lembut */
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
  }

  .copyright-elegant a {
    color: #ffffff; /* Putih profesional */
    font-weight: 500;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: all 0.3s ease;
  }

  .copyright-elegant a:hover {
    color: #1e90ff; /* Biru elegan */
    border-bottom: 1px solid #1e90ff;
  }

  .copyright-elegant span {
    color: #adb5bd;
  }

  .text-brand-white {
    color: #ffffff !important;
  }
</style>

<!-- 🌙 Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
  <div class="container py-5">

    <!-- Info Bar -->
    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="info-box p-4 text-center text-lg-start">
          <div class="info-icon mb-4"><i class="fas fa-map-marker-alt fa-2x"></i></div>
          <h4>Address</h4>
          <p>SukaBumi Indonesia</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="info-box p-4 text-center text-lg-start">
          <div class="info-icon mb-4"><i class="fas fa-envelope fa-2x"></i></div>
          <h4>Mail Us</h4>
          <p>rafaoffice1205@gmail.com</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="info-box p-4 text-center text-lg-start">
          <div class="info-icon mb-4"><i class="fa fa-phone-alt fa-2x"></i></div>
          <h4>Telephone</h4>
          <p>(+62) 858 6135 5042</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="info-box p-4 text-center text-lg-start">
          <div class="info-icon mb-4"><i class="fab fa-firefox-browser fa-2x"></i></div>
          <h4>Website</h4>
          <p>rafaKhadafi.com</p>
        </div>
      </div>
    </div>

    <!-- Links + Newsletter -->
    <div class="row g-5">

      <div class="col-md-6 col-lg-6 col-xl-3">
        <h4>Newsletter</h4>
        <p class="text-secondary mb-3">Stay updated with our latest offers and news.</p>
        <div class="position-relative mx-auto rounded-pill newsletter">
          <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5"
                 type="text" placeholder="Enter your email">
          <button type="button"
                  class="btn rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">
            Sign Up
          </button>
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <h4>Customer Service</h4>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Returns</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Order History</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Testimonials</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> My Account</a>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <h4>Information</h4>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> About Us</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Warranty</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> FAQ</a>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <h4>Extras</h4>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Brands</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Gift Vouchers</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Wishlist</a>
        <a href="#" class="footer-link"><i class="fas fa-angle-right me-2"></i> Track Order</a>
      </div>

    </div>
  </div>
</div>

<!-- 🩵 Copyright -->
<!-- 🩵 Copyright Elegan -->
<div class="container-fluid copyright-elegant py-4">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <span>
          © <a href="#" class="text-brand-white">KhadafiShop</a>, All rights reserved.
        </span>
      </div>
      <div class="col-md-6 text-center text-md-end">
        Designed by 
        <a href="https://htmlcodex.com" class="text-brand-white">Rafa Khadafi</a> | 
        Distributed by 
        <a href="https://themewagon.com" class="text-brand-white">ThemeWagon</a>
      </div>
    </div>
  </div>
</div>



