@extends('layouts.frontend')

@section('title', 'My Payment Methods')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- Breadcrumb & Title Inline -->
        <div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3.5 border-b border-slate-100">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">My Account</h1>
                <p class="text-[10px] text-slate-400 mt-1 flex items-center gap-1.5 font-bold uppercase tracking-wider">
                    <a href="/" class="hover:text-primary transition-colors">Home</a> 
                    <span class="text-slate-300">/</span> 
                    <a href="/dashboard" class="hover:text-primary transition-colors">Dashboard</a>
                    <span class="text-slate-300">/</span>
                    <span class="text-slate-800">Payment Methods</span>
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            @include('frontend.partials.customer_sidebar')

            <div class="w-full lg:w-3/4">
                <div class="space-y-5">
                    
                    @if(session('success'))
                        <div class="bg-emerald-50 text-emerald-800 border border-emerald-200 p-4 rounded-xl text-xs font-extrabold flex items-center gap-2 shadow-2xs">
                            <i class="fa-solid fa-circle-check text-sm"></i> {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-rose-50 text-rose-800 border border-rose-200 p-4 rounded-xl text-xs font-extrabold flex items-center gap-2 shadow-2xs">
                            <i class="fa-solid fa-circle-exclamation text-sm"></i> {{ session('error') }}
                        </div>
                    @endif

                    <!-- Saved Payment Methods -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-2xs p-5">
                        <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3 flex items-center gap-2" style="font-family: 'Outfit', sans-serif;">
                            <i class="fa-regular fa-credit-card text-primary"></i> Saved Payment Methods
                        </h4>

                        @if(empty($paymentMethods))
                            <div class="text-center py-6 text-slate-400 bg-slate-50/50 rounded-xl border border-dashed border-slate-200">
                                <i class="fa-regular fa-credit-card text-3xl mb-2 text-slate-300"></i>
                                <p class="text-xs font-semibold">You don't have any saved payment methods yet.</p>
                            </div>
                        @else
                            <div class="space-y-3">
                                @foreach($paymentMethods as $method)
                                    <div class="flex items-center justify-between p-3.5 border border-slate-200/80 rounded-xl hover:bg-slate-50/60 transition shadow-2xs">
                                        <div class="flex items-center gap-3.5">
                                            <div class="w-12 h-9 bg-white border border-slate-200 rounded-lg flex items-center justify-center shadow-2xs">
                                                <i class="fa-brands fa-cc-{{ strtolower($method->card->brand) === 'unknown' ? 'stripe' : strtolower($method->card->brand) }} text-2xl text-slate-700"></i>
                                            </div>
                                            <div>
                                                <span class="block text-xs font-extrabold text-slate-900 capitalize">{{ $method->card->brand }} ending in {{ $method->card->last4 }}</span>
                                                <span class="block text-[10px] text-slate-400 font-semibold mt-0.5">Expires {{ str_pad($method->card->exp_month, 2, '0', STR_PAD_LEFT) }}/{{ $method->card->exp_year }}</span>
                                            </div>
                                        </div>
                                        <form action="{{ route('payment-methods.destroy', $method->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this payment method?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition cursor-pointer" title="Remove Card">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Add New Payment Method -->
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-2xs p-5">
                        <h4 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3 flex items-center gap-2" style="font-family: 'Outfit', sans-serif;">
                            <i class="fa-solid fa-plus text-primary"></i> Add a Payment Method
                        </h4>

                        <div x-data="{ tab: 'card' }">
                            <!-- Tabs -->
                            <div class="flex gap-2 mb-5 border-b border-slate-100 pb-3">
                                <button type="button" @click="tab = 'card'" :class="tab === 'card' ? 'bg-primary text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5">
                                    <i class="fa-solid fa-credit-card"></i> Credit / Debit Card
                                </button>
                                <button type="button" @click="tab = 'bank'" :class="tab === 'bank' ? 'bg-primary text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5">
                                    <i class="fa-solid fa-building-columns"></i> Bank Account
                                </button>
                            </div>

                            <!-- Card Tab -->
                            <div x-show="tab === 'card'" class="space-y-4">
                                <form id="payment-form" action="{{ route('payment-methods.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_method_id" id="payment_method_id">
                                    
                                    <div class="mb-4">
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Card Details *</label>
                                        <div id="card-element" class="p-3.5 border border-slate-200 rounded-xl bg-slate-50/50 shadow-2xs focus-within:bg-white focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/10 transition">
                                            <!-- Stripe Elements will be inserted here -->
                                        </div>
                                        <div id="card-errors" class="text-rose-600 text-xs font-bold mt-2" role="alert"></div>
                                    </div>

                                    <button id="submit-button" type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold text-xs uppercase tracking-wider px-6 py-3 rounded-xl transition shadow-md hover:shadow-lg w-full sm:w-auto flex items-center justify-center gap-2 cursor-pointer">
                                        <i class="fa-solid fa-lock text-xs"></i> Save Card Securely
                                    </button>
                                </form>
                            </div>

                            <!-- Bank Account Tab -->
                            <div x-show="tab === 'bank'" style="display: none;" class="text-center p-8 bg-slate-50/50 border border-dashed border-slate-200 rounded-xl">
                                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto mb-3 shadow-2xs border border-slate-200">
                                    <i class="fa-solid fa-building-columns text-xl text-slate-400"></i>
                                </div>
                                <h5 class="font-extrabold text-slate-800 text-xs mb-1.5">Connect Bank Account</h5>
                                <p class="text-xs text-slate-400 mb-4 max-w-sm mx-auto leading-relaxed">Direct bank debit connections via Stripe. This payment integration will be available in an upcoming update.</p>
                                <button disabled class="bg-slate-200 text-slate-400 font-bold text-xs px-5 py-2 rounded-xl cursor-not-allowed uppercase tracking-wider">
                                    Coming Soon
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        style: {
            base: {
                color: '#1e293b',
                fontFamily: '"Outfit", sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '14px',
                '::placeholder': {
                    color: '#94a3b8'
                }
            },
            invalid: {
                color: '#e11d48',
                iconColor: '#e11d48'
            }
        }
    });

    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    const clientSecret = '{{ $intent->client_secret }}';
    const cardErrors = document.getElementById('card-errors');
    const submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...';
        cardErrors.textContent = '';

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: '{{ Auth::user()->name }}',
                        email: '{{ Auth::user()->email }}'
                    }
                }
            }
        );

        if (error) {
            cardErrors.textContent = error.message;
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fa-solid fa-lock text-xs"></i> Save Card Securely';
        } else {
            document.getElementById('payment_method_id').value = setupIntent.payment_method;
            form.submit();
        }
    });
</script>
@endpush
