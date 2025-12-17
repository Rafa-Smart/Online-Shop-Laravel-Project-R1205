@extends('SellerDashboard.layouts.app')

@section('title', 'Contact')
@section('content')
<div class="contact-page">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>
    </div>

    <div class="container py-5 position-relative">
        <!-- Header with Animation -->
        <div class="text-center mb-5 fade-in">
            <h1 class="display-4 fw-bold gradient-text mb-3">
                Let's Start a Conversation
            </h1>
            <p class="lead text-muted mx-auto" style="max-width: 650px;">
                We're here to help and answer any question you might have. We look forward to hearing from you! 🚀
            </p>
        </div>

        <div class="row g-4 g-lg-5">
            <!-- Contact Info Cards (Kiri) -->
            <div class="col-lg-5">
                <div class="contact-sidebar">
                    <!-- Email Card -->
                    <div class="info-card glass-effect slide-in" style="animation-delay: 0.1s;">
                        <div class="card-icon gradient-blue">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="card-content">
                            <h5 class="fw-bold mb-2">Email Address</h5>
                            <p class="text-muted small mb-2">Drop us a line anytime</p>
                            <a href="mailto:hello@yourstore.com" class="contact-link">
                                rafaoffice@gmail.com
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="info-card glass-effect slide-in" style="animation-delay: 0.2s;">
                        <div class="card-icon gradient-green">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="card-content">
                            <h5 class="fw-bold mb-2">Phone Number</h5>
                            <p class="text-muted small mb-2">Mon-Fri from 8am to 5pm</p>
                            <a href="tel:+6281234567890" class="contact-link">
                                +62 858 6135 5042
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div class="info-card glass-effect slide-in" style="animation-delay: 0.3s;">
                        <div class="card-icon gradient-purple">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="card-content">
                            <h5 class="fw-bold mb-2">Office Location</h5>
                            <p class="text-muted small mb-2">Come say hello</p>
                            <span class="contact-link">
                                Sukabumi, Indonesia
                                <i class="bi bi-arrow-right ms-2"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="social-section glass-effect slide-in" style="animation-delay: 0.4s;">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-share-fill me-2 text-primary"></i>
                            Connect With Us
                        </h5>
                        <div class="social-links">
                            <a href="#" class="social-btn facebook" data-bs-toggle="tooltip" title="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-btn instagram" data-bs-toggle="tooltip" title="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="social-btn twitter" data-bs-toggle="tooltip" title="Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="social-btn linkedin" data-bs-toggle="tooltip" title="LinkedIn">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="social-btn whatsapp" data-bs-toggle="tooltip" title="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Response Time Badge -->
                    <div class="response-badge glass-effect slide-in" style="animation-delay: 0.5s;">
                        <div class="d-flex align-items-center">
                            <div class="pulse-dot me-3"></div>
                            <div>
                                <div class="fw-bold text-success">We're Online!</div>
                                <small class="text-muted">Average response time: 2 hours</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form (Kanan) -->
            <div class="col-lg-7">
                <div class="form-wrapper glass-effect slide-in" style="animation-delay: 0.2s;">
                    <div class="form-header mb-4">
                        <h3 class="fw-bold mb-2">
                            <i class="bi bi-chat-dots-fill text-primary me-2"></i>
                            Send a Message
                        </h3>
                        <p class="text-muted mb-0">Fill out the form below and we'll get back to you shortly</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success-custom">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="contact-form-modern">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="name" class="form-label-modern">
                                        <i class="bi bi-person-fill"></i>
                                        Full Name
                                    </label>
                                    <input 
                                     style="color:black;"   
                                        type="text" 
                                        class="form-control-modern @error('name') is-invalid @enderror" 
                                        id="name" 
                                        name="name" 
                                        value="{{ old('name') }}" 
                                        placeholder="John Doe"
                                        required
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label for="email" class="form-label-modern">
                                        <i class="bi bi-envelope-fill"></i>
                                        Email Address
                                    </label>
                                    <input 
                                     style="color:black;"
                                        type="email" 
                                        class="form-control-modern @error('email') is-invalid @enderror" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        placeholder="john@example.com"
                                        required
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label for="subject" class="form-label-modern">
                                        <i class="bi bi-bookmark-fill"></i>
                                        Subject
                                    </label>
                                    <input 
                                        style="color:black;"
                                        type="text" 
                                        class="form-control-modern @error('subject') is-invalid @enderror" 
                                        id="subject" 
                                        name="subject" 
                                        value="{{ old('subject') }}" 
                                        placeholder="How can we help you?"
                                        required
                                    >
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label for="message" class="form-label-modern">
                                        <i class="bi bi-chat-left-text-fill"></i>
                                        Your Message
                                    </label>
                                    <textarea 
                                     style="color:black;"
                                        class="form-control-modern @error('message') is-invalid @enderror" 
                                        id="message" 
                                        name="message" 
                                        rows="6" 
                                        placeholder="Tell us more about your inquiry..."
                                        required
                                    >{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="character-count text-muted small mt-2">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Minimum 10 characters
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn-modern btn-gradient">
                                    <span class="btn-text">Send Message</span>
                                    <span class="btn-icon">
                                        <i class="bi bi-send-fill"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section mt-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card glass-effect text-center">
                        <div class="feature-icon gradient-blue mb-3">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Fast Response</h5>
                        <p class="text-muted small mb-0">We respond within 24 hours on business days</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card glass-effect text-center">
                        <div class="feature-icon gradient-green mb-3">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Secure & Private</h5>
                        <p class="text-muted small mb-0">Your information is always safe with us</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card glass-effect text-center">
                        <div class="feature-icon gradient-purple mb-3">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Expert Support</h5>
                        <p class="text-muted small mb-0">Professional team ready to assist you</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base & Background */
.contact-page {
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
    background: #f0f4f8;
    min-height: 100vh;
    position: relative;
    overflow: hidden;
}

.animated-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.bg-shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
    animation: float 20s infinite ease-in-out;
}

.shape-1 {
    width: 500px;
    height: 500px;
    background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
    top: -10%;
    left: -10%;
}

.shape-2 {
    width: 400px;
    height: 400px;
    background: linear-gradient(45deg, #4facfe 0%, #00f2fe 100%);
    top: 50%;
    right: -5%;
    animation-delay: -5s;
}

.shape-3 {
    width: 350px;
    height: 350px;
    background: linear-gradient(45deg, #43e97b 0%, #38f9d7 100%);
    bottom: -10%;
    left: 40%;
    animation-delay: -10s;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(50px, 50px) rotate(90deg); }
    50% { transform: translate(0, 100px) rotate(180deg); }
    75% { transform: translate(-50px, 50px) rotate(270deg); }
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.fade-in {
    animation: fadeIn 0.8s ease-out;
}

.slide-in {
    animation: slideIn 0.6s ease-out backwards;
}

/* Glass Effect */
.glass-effect {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Badge */
.badge-pill {
    display: inline-block;
    padding: 8px 20px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

/* Gradient Text */
.gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Info Cards */
.info-card {
    padding: 25px;
    border-radius: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.card-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin-bottom: 15px;
    position: relative;
    overflow: hidden;
}

.card-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.3);
    transition: left 0.5s ease;
}

.info-card:hover .card-icon::before {
    left: 100%;
}

.gradient-blue {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.gradient-green {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
}

.gradient-purple {
    background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
}

.contact-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.contact-link:hover {
    color: #764ba2;
    transform: translateX(5px);
}

/* Social Section */
.social-section {
    padding: 25px;
    border-radius: 20px;
    margin-bottom: 20px;
}

.social-links {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.social-btn {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.social-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transition: all 0.5s ease;
    transform: translate(-50%, -50%);
}

.social-btn:hover::before {
    width: 100px;
    height: 100px;
}

.social-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.facebook { background: linear-gradient(135deg, #1877f2 0%, #0d5fc5 100%); }
.instagram { background: linear-gradient(135deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
.twitter { background: linear-gradient(135deg, #1da1f2 0%, #0d8bd9 100%); }
.linkedin { background: linear-gradient(135deg, #0077b5 0%, #005885 100%); }
.whatsapp { background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); }

/* Response Badge */
.response-badge {
    padding: 20px;
    border-radius: 15px;
}

.pulse-dot {
    width: 12px;
    height: 12px;
    background: #10b981;
    border-radius: 50%;
    position: relative;
    animation: pulse 2s infinite;
}

.pulse-dot::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #10b981;
    border-radius: 50%;
    animation: pulse-ring 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes pulse-ring {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(2);
        opacity: 0;
    }
}

/* Form Wrapper */
.form-wrapper {
    padding: 40px;
    border-radius: 25px;
}

.form-header h3 {
    color: #1f2937;
}

/* Modern Form */
.form-group-modern {
    margin-bottom: 0;
}

.form-grop-modern input {
    color: #374151;
}

.form-label-modern {
    font-weight: 600;
    color: #374151;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    font-size: 0.95rem;
}

.form-label-modern i {
    margin-right: 8px;
    color: #667eea;
}

.form-control-modern {
    width: 100%;
    padding: 14px 18px;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control-modern:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-2px);
}

.form-control-modern::placeholder {
    color: #9ca3af;
}

textarea.form-control-modern {
    resize: vertical;
    min-height: 140px;
}

/* Modern Button */
.btn-modern {
    width: 100%;
    padding: 16px 32px;
    border: none;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.btn-gradient:hover::before {
    left: 100%;
}

.btn-gradient:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
}

.btn-icon {
    display: inline-flex;
    align-items: center;
    transition: transform 0.3s ease;
}

.btn-gradient:hover .btn-icon {
    transform: translateX(5px);
}

/* Alert */
.alert-success-custom {
    padding: 18px 24px;
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border: 2px solid #6ee7b7;
    border-radius: 12px;
    color: #065f46;
    font-weight: 600;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
}

/* Features Section */
.features-section {
    position: relative;
    z-index: 1;
}

.feature-card {
    padding: 30px;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: white;
    margin: 0 auto;
}

/* Responsive */
@media (max-width: 991px) {
    .form-wrapper {
        padding: 30px;
    }
    
    .bg-shape {
        filter: blur(60px);
    }
}

@media (max-width: 767px) {
    .contact-page {
        padding-top: 20px;
    }
    
    .display-4 {
        font-size: 2rem;
    }
    
    .info-card, .form-wrapper, .social-section, .response-badge {
        padding: 20px;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endsection