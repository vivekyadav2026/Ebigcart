@extends('layouts.frontend')

@section('title', 'Contact Us')
@section('meta_title', 'Contact Us | Ebigcart - Customer Support & Orders')
@section('meta_description', 'Contact Ebigcart for queries about Laddu Gopal dresses, custom orders, shipping, or assistance.')

@section('content')
<div class="container" style="padding-top: 30px; padding-bottom: 50px;">
    <!-- Page Header -->
    <div style="text-align: center; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
        <h1 style="font-size: 2.2rem; font-weight: 700; color: #b71c1c; font-family: 'Outfit', sans-serif;">Contact Ebigcart</h1>
        <p style="font-size: 0.9rem; color: #666; margin-top: 8px;">
            <a href="/" style="color: #555; text-decoration: none;">Home</a> <span style="margin: 0 8px; color: #ccc;">/</span> Contact Us
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 35px; align-items: start;">
        <!-- Contact Info -->
        <div style="background: #fff; padding: 25px; border-radius: 12px; border: 1px solid #e8e8e8; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
            <h2 style="font-size: 1.4rem; font-weight: 700; color: #222; margin-bottom: 10px; font-family: 'Outfit', sans-serif;">Get In touch with us me</h2>
            <p style="font-size: 0.85rem; color: #666; margin-bottom: 25px; line-height: 1.6;">
                Have questions about our online shop or need help choosing the perfect product? We’re here to help! Reach out to us anytime—we’d be delighted to assist you and make your shopping experience easy, enjoyable, and hassle-free.
            </p>

            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: #fdf2f2; color: #b71c1c; width: 42px; height: 42px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="bi bi-geo-alt-fill" style="font-size: 1.2rem;"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 0.8rem; font-weight: 700; color: #777; text-transform: uppercase; margin: 0;">Store Address</h4>
                        <p style="font-size: 0.9rem; font-weight: 700; color: #222; margin: 4px 0 0 0;">{{ \App\Models\Setting::get('site_address', 'Ebigcart Divine Store, Mathura Road, Vrindavan, Uttar Pradesh, India') }}</p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: #fdf2f2; color: #b71c1c; width: 42px; height: 42px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="bi bi-telephone-fill" style="font-size: 1.2rem;"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 0.8rem; font-weight: 700; color: #777; text-transform: uppercase; margin: 0;">Phone & WhatsApp</h4>
                        <p style="font-size: 0.9rem; font-weight: 700; color: #222; margin: 4px 0 0 0;">{{ \App\Models\Setting::get('site_phone', '+91 98765 43210') }}</p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: #fdf2f2; color: #b71c1c; width: 42px; height: 42px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="bi bi-envelope-fill" style="font-size: 1.2rem;"></i>
                    </div>
                    <div>
                        <h4 style="font-size: 0.8rem; font-weight: 700; color: #777; text-transform: uppercase; margin: 0;">Email Support</h4>
                        <p style="font-size: 0.9rem; font-weight: 700; color: #222; margin: 4px 0 0 0;">{{ \App\Models\Setting::get('site_email', 'support@ebigcart.com') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="background: #fff; padding: 25px; border-radius: 12px; border: 1px solid #e8e8e8; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
            <h2 style="font-size: 1.4rem; font-weight: 700; color: #222; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">Send Us A Message</h2>
            
            <form onsubmit="alert('Thank you! Your message has been sent to Ebigcart Support.'); return false;" style="display: flex; flex-direction: column; gap: 15px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #555; text-transform: uppercase; margin-bottom: 5px;">First Name *</label>
                        <input type="text" required style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 0.85rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #555; text-transform: uppercase; margin-bottom: 5px;">Last Name *</label>
                        <input type="text" required style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 0.85rem; outline: none;">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #555; text-transform: uppercase; margin-bottom: 5px;">Email Address *</label>
                    <input type="email" required style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 0.85rem; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 700; color: #555; text-transform: uppercase; margin-bottom: 5px;">Your Message *</label>
                    <textarea rows="4" required style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 0.85rem; outline: none; resize: vertical;"></textarea>
                </div>

                <button type="submit" style="background: #b71c1c; color: #fff; border: none; padding: 12px; border-radius: 6px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; cursor: pointer; transition: background 0.3s ease;">
                    Send Message <i class="bi bi-send-fill" style="margin-left: 6px;"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
}
</style>
@endsection