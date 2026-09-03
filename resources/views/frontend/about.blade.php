@extends('layouts.frontend')

@section('title', 'About Us')
@section('meta_title', 'About Us | Ebigcart - Divine Laddu Gopal Dresses & Accessories')
@section('meta_description', 'Discover Ebigcart - Your premier destination for handcrafted Laddu Gopal dresses, designer mukuts, ornaments, and divine accessories.')

@section('content')
<div class="container" style="padding-top: 30px; padding-bottom: 50px;">
    <!-- Page Header -->
    <div style="text-align: center; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
        <h1 style="font-size: 2.2rem; font-weight: 700; color: #b71c1c; font-family: 'Outfit', sans-serif;">About Ebigcart</h1>
        <p style="font-size: 0.9rem; color: #666; margin-top: 8px;">
            <a href="/" style="color: #555; text-decoration: none;">Home</a> <span style="margin: 0 8px; color: #ccc;">/</span> About Us
        </p>
    </div>

    <!-- Main Content Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; margin-bottom: 50px;">
        <div>
            <span style="color: #b71c1c; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; tracking-wider: 1px;">Adorn Your Kanha Ji With Elegance</span>
            <h2 style="font-size: 1.8rem; font-weight: 700; color: #222; margin: 10px 0 15px 0; font-family: 'Outfit', sans-serif;">Crafting Divine Happiness For Every Devotee</h2>
            <p style="font-size: 0.95rem; color: #555; line-height: 1.7; margin-bottom: 15px;">
                Welcome to <strong>Ebigcart</strong>! We specialize in handcrafted Laddu Gopal poshaks, vibrant designer mukuts, authentic bansuris, traditional aasans, and exquisite spiritual ornaments designed to add beauty and reverence to your daily worship.
            </p>
            <p style="font-size: 0.95rem; color: #555; line-height: 1.7; margin-bottom: 20px;">
                Every dress and accessory in our collection is created with love, high-quality fabrics, and meticulous attention to detail so your beloved Thakur Ji always looks divine.
            </p>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <div style="background: #fdfaf6; border: 1px solid #f2e3d5; padding: 15px 20px; border-radius: 8px; flex: 1; min-width: 140px;">
                    <h3 style="font-size: 1.4rem; font-weight: 800; color: #b71c1c; margin: 0;">100%</h3>
                    <p style="font-size: 0.8rem; color: #666; margin: 4px 0 0 0;">Handcrafted & Pure</p>
                </div>
                <div style="background: #fdfaf6; border: 1px solid #f2e3d5; padding: 15px 20px; border-radius: 8px; flex: 1; min-width: 140px;">
                    <h3 style="font-size: 1.4rem; font-weight: 800; color: #b71c1c; margin: 0;">Fast</h3>
                    <p style="font-size: 0.8rem; color: #666; margin: 4px 0 0 0;">Express Shipping</p>
                </div>
            </div>
        </div>
        <div>
            <img src="/mahashringar_assets/Premium-Flower-Multicolor-Laddu-Gopal-Dress.webp" alt="Ebigcart Divine Collection" style="width: 100%; max-height: 420px; object-fit: contain; border-radius: 12px; box-shadow: 0 6px 20px rgba(0,0,0,0.08);">
        </div>
    </div>

    <!-- Core Values / What We Offer -->
    <div style="background: #fafafa; border: 1px solid #eee; border-radius: 12px; padding: 40px 25px; margin-bottom: 40px;">
        <h2 style="font-size: 1.6rem; font-weight: 700; text-align: center; color: #b71c1c; margin-bottom: 30px; font-family: 'Outfit', sans-serif;">Why Devotees Love Ebigcart</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px;">
            <div style="background: #fff; padding: 20px; border-radius: 10px; border: 1px solid #e8e8e8; text-align: center;">
                <i class="bi bi-heart-fill" style="font-size: 2rem; color: #b71c1c; margin-bottom: 10px; display: block;"></i>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #333; margin-bottom: 8px;">Made With Devotion</h3>
                <p style="font-size: 0.85rem; color: #666; margin: 0;">Designed with utmost care and sacred intention to suit every size and festival.</p>
            </div>
            <div style="background: #fff; padding: 20px; border-radius: 10px; border: 1px solid #e8e8e8; text-align: center;">
                <i class="bi bi-patch-check-fill" style="font-size: 2rem; color: #b71c1c; margin-bottom: 10px; display: block;"></i>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #333; margin-bottom: 8px;">Premium Fabrics</h3>
                <p style="font-size: 0.85rem; color: #666; margin: 0;">Soft cottons, lush velvets, and durable embellishments that last season after season.</p>
            </div>
            <div style="background: #fff; padding: 20px; border-radius: 10px; border: 1px solid #e8e8e8; text-align: center;">
                <i class="bi bi-truck" style="font-size: 2rem; color: #b71c1c; margin-bottom: 10px; display: block;"></i>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: #333; margin-bottom: 8px;">Doorstep Delivery</h3>
                <p style="font-size: 0.85rem; color: #666; margin: 0;">Safe packaging and prompt shipping across all towns and cities.</p>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 25px !important;
    }
}
</style>
@endsection