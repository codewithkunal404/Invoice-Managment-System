@extends('layout.app')

@section('content')

<style>
    .hero-section {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        padding: 80px 0;
    }

    .hero-section h1 {
        font-weight: 700;
    }

    .hero-section p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .feature-icon {
        font-size: 3rem;
        color: #2a5298;
    }

    .feature-card:hover {
        transform: translateY(-6px);
        transition: 0.3s ease;
        box-shadow: 0 1rem 2rem rgba(0,0,0,.12);
    }

    .section-title {
        font-weight: 600;
    }
</style>


<!-- FEATURES -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Everything You Need to Get Paid Faster</h2>
            <p class="text-muted">
                A complete invoicing and payment solution designed for growing businesses
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3">📄</div>
                        <h5 class="mb-3">Professional Invoice Creation</h5>
                        <p class="text-muted">
                            Easily create invoices with customer details, billing address,
                            itemized products, quantity, pricing, tax, and totals — all
                            calculated automatically for accuracy.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3">💳</div>
                        <h5 class="mb-3">Secure Square Payments</h5>
                        <p class="text-muted">
                            Send customers a secure payment link powered by Square.
                            Accept card payments online with industry-grade security and
                            real-time confirmation.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3">🔄</div>
                        <h5 class="mb-3">Automatic Payment Tracking</h5>
                        <p class="text-muted">
                            Payments are automatically synced using Square webhooks.
                            Invoice statuses update instantly, keeping your records
                            accurate and up to date.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- EXTRA VALUE SECTION -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="fw-bold mb-3">
                    Designed for Real Businesses
                </h3>
                <p class="text-muted">
                    Whether you’re a freelancer, agency, or growing company, this invoice
                    system helps you manage billing, track payments, and maintain a
                    professional image with your customers.
                </p>
                <ul class="text-muted">
                    <li>Customer & address management</li>
                    <li>Item-based invoice creation</li>
                    <li>Payment history & transaction logs</li>
                    <li>Secure Square integration</li>
                </ul>
            </div>

            <div class="col-md-6 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135706.png"
                     class="img-fluid" width="300" alt="Invoice Illustration">
            </div>

        </div>
    </div>
</section>

@endsection
