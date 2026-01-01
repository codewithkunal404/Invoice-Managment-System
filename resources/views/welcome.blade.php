@extends('layout.app')

@section('content')

<style>
    /* ===== HERO ===== */
    .hero {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #fff;
        padding: 90px 0;
    }

    .hero h1 {
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .hero p {
        font-size: 1.1rem;
        opacity: .95;
    }

    /* ===== FEATURES ===== */
    .section-title {
        font-weight: 700;
        letter-spacing: -0.3px;
    }

    .feature-card {
        border-radius: 14px;
        transition: all .3s ease;
        background: #fff;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2.5rem rgba(0,0,0,.12);
    }

    .feature-icon {
        font-size: 2.6rem;
        width: 64px;
        height: 64px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(42,82,152,.1);
        color: #2a5298;
    }

    /* ===== VALUE ===== */
    .value-section {
        background: #f8f9fb;
    }

    .value-list li {
        margin-bottom: 10px;
        padding-left: 24px;
        position: relative;
    }

    .value-list li::before {
        content: "✔";
        position: absolute;
        left: 0;
        color: #2a5298;
        font-weight: 600;
    }
</style>

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1 class="mb-3">Smart Invoicing. Faster Payments.</h1>
        <p class="mb-4">
            A modern invoice & payment management platform built for growing businesses.
            Create invoices, accept payments, and track everything in one place.
        </p>
    </div>
</section>

<!-- FEATURES -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Everything You Need to Get Paid Faster</h2>
            <p class="text-muted mt-2">
                Powerful features designed to simplify billing and payment workflows
            </p>
        </div>

        <div class="row g-4">

            <!-- Invoice -->
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Professional Invoicing</h5>
                        <p class="text-muted">
                            Create polished invoices with itemized products, taxes,
                            discounts, and automatic total calculations.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-credit-card-2-front"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Secure Square Payments</h5>
                        <p class="text-muted">
                            Accept online card payments through Square with secure
                            checkout links and instant confirmation.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tracking -->
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Real-Time Payment Tracking</h5>
                        <p class="text-muted">
                            Payments sync automatically via Square webhooks.
                            Invoice statuses update instantly and accurately.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VALUE SECTION -->
<section class="value-section py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="fw-bold mb-3">
                    Built for Real-World Businesses
                </h3>
                <p class="text-muted">
                    Whether you're a freelancer, agency, or growing company,
                    this system helps you manage invoices, payments, and customers
                    with confidence and professionalism.
                </p>

                <ul class="value-list text-muted list-unstyled mt-3">
                    <li>Customer & address management</li>
                    <li>Item-based invoice generation</li>
                    <li>Payment history & transaction logs</li>
                    <li>Secure Square integration</li>
                </ul>
            </div>

            <div class="col-md-6 text-center">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/3135/3135706.png"
                    class="img-fluid"
                    width="300"
                    alt="Invoice Management">
            </div>

        </div>
    </div>
</section>

@endsection
