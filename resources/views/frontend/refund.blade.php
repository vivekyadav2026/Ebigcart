@extends('layouts.frontend')

@section('title', 'Refund, Return, Replacement & Cancellation Policy')

@section('content')
    <!-- Page Header -->
    <div class="bg-[#fdfaf6] py-5 md:py-12 text-center border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-[10px] md:text-sm text-gray-500 uppercase tracking-widest leading-relaxed">
                <a href="/" class="hover:text-primary transition">Home</a> / 
                <span class="text-gray-900 font-medium">Refund Policy</span>
            </p>
            <h1 class="text-2xl sm:text-4xl font-serif font-bold text-gray-900 mt-1 md:mt-2">Refund, Return, Replacement & Cancellation Policy</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
        <div class="prose max-w-none text-gray-600 leading-relaxed font-sans text-sm sm:text-base space-y-6">
            <p class="text-xs text-gray-400">Effective Date: {{ date('F d, Y') }}</p>
            
            <p>At <strong>Ebigcart</strong>, we are committed to providing our customers with a reliable, transparent, and hassle-free shopping experience. We take reasonable care to ensure that products listed on our platform are accurately described and delivered in proper condition.</p>
            <p>This Refund, Return, Replacement & Cancellation Policy (“Policy”) explains the circumstances under which you may request cancellation, return, replacement, or refund for products purchased through Ebigcart.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">1. Product Quality</h2>
            <p>We endeavour to ensure that products sold through Ebigcart are genuine, unused, and supplied in accordance with the product description provided on our website.</p>
            <p>If you receive a product that is damaged, defective, incorrect, incomplete, or materially different from the product description, you may be eligible for a replacement, return, or refund, subject to the terms of this Policy.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">2. Return & Replacement Eligibility</h2>
            <p>Eligible products may be returned or replaced if:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>The product is received in a damaged condition.</li>
                <li>The product is defective or does not function as intended.</li>
                <li>The wrong product has been delivered.</li>
                <li>The product received is materially different from the product description or specifications displayed on Ebigcart.</li>
                <li>The product is missing essential components or accessories mentioned in the product listing.</li>
            </ul>

            <h3 class="text-lg font-bold text-gray-800 mt-6 mb-3">2.1 3-Day Replacement/Return Period</h3>
            <p>For eligible products, the customer must notify Ebigcart of the issue within 3 days from the date of delivery.</p>
            <p>Requests received after the applicable period may not be accepted unless otherwise specified on the product page or required under applicable law.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">3. Conditions for Return</h2>
            <p>To be eligible for return or replacement, the product should generally be:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Unused and in its original condition.</li>
                <li>Returned with the original packaging.</li>
                <li>Returned with all original tags, labels, accessories, manuals, and other components, wherever applicable.</li>
                <li>Accompanied by the original invoice/order details.</li>
                <li>Free from damage caused by misuse, negligence, alteration, or improper handling by the customer.</li>
            </ul>
            <p>Certain products may have specific return conditions. Customers are advised to check the product page and applicable return terms before placing an order.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">4. Return & Replacement Process</h2>
            <p><strong>Step 1 – Contact Customer Support</strong></p>
            <p>Contact Ebigcart Customer Support through the contact details provided on our website and provide:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Order ID</li>
                <li>Product details</li>
                <li>Reason for return/replacement</li>
                <li>Photographs or videos of the product, packaging, or damage, where requested</li>
            </ul>

            <p class="mt-4"><strong>Step 2 – Request Verification</strong></p>
            <p>Our team may review the request and supporting information to determine whether the product is eligible for return, replacement, or refund.</p>

            <p class="mt-4"><strong>Step 3 – Product Pickup/Return</strong></p>
            <p>Where applicable, Ebigcart or its logistics partner will arrange pickup from the customer’s serviceable location.</p>
            <p>If pickup is unavailable at a particular location, the customer may be required to ship the product through a suitable courier service as instructed by Ebigcart.</p>

            <p class="mt-4"><strong>Step 4 – Inspection</strong></p>
            <p>The returned product may be inspected to verify the reported issue and compliance with the return conditions.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">5. Replacement Policy</h2>
            <p>For eligible damaged, defective, incorrect, or materially different products, Ebigcart may provide a replacement at no additional product cost, subject to availability.</p>
            <p>If the same product is unavailable, Ebigcart may offer:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>A refund of the eligible amount; or</li>
                <li>An alternative product, where mutually agreed and available.</li>
            </ul>
            <p>Replacement is subject to product availability and applicable product-specific terms.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">6. Refund Policy</h2>
            <p>If a refund is approved, the eligible refund amount will generally be processed through the original payment method or another payment method permitted by Ebigcart and/or its payment service provider.</p>
            <p>The actual time taken for the refund to reflect in the customer’s account may depend on the payment gateway, bank, card issuer, UPI provider, or other financial institution involved.</p>
            <p>Where applicable, the refund may include the amount paid for the returned product and eligible shipping charges, subject to the terms applicable to the particular order.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">7. Cancellation Policy</h2>
            <h3 class="text-lg font-bold text-gray-800 mt-6 mb-3">7.1 Cancellation Before Shipment</h3>
            <p>Customers may request cancellation of an order before the order has been shipped.</p>
            <p>If the cancellation request is successfully processed before shipment, the eligible amount will be refunded through the applicable payment method.</p>

            <h3 class="text-lg font-bold text-gray-800 mt-6 mb-3">7.2 Cancellation After Shipment</h3>
            <p>Once an order has been shipped, cancellation may not be possible.</p>
            <p>In such cases, customers should contact Ebigcart Customer Support to determine whether return, refusal of delivery, or another available option can be provided.</p>

            <h3 class="text-lg font-bold text-gray-800 mt-6 mb-3">7.3 Cancellation by Ebigcart</h3>
            <p>Ebigcart reserves the right to cancel an order in circumstances including, but not limited to:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Product unavailability.</li>
                <li>Pricing or listing errors.</li>
                <li>Incorrect or incomplete product information.</li>
                <li>Delivery restrictions.</li>
                <li>Suspected fraudulent or unauthorized transactions.</li>
                <li>Failure to complete payment.</li>
                <li>Circumstances beyond reasonable control.</li>
            </ul>
            <p>If Ebigcart cancels a prepaid order, the eligible amount paid by the customer will be refunded in accordance with the applicable payment and refund process.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">8. Non-Returnable Products</h2>
            <p>Certain products may not be eligible for return or replacement due to their nature, hygiene considerations, customization, or other applicable restrictions.</p>
            <p>These may include, where specifically identified on the product page:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Made-to-order products.</li>
                <li>Customized or personalized products.</li>
                <li>Products manufactured according to customer-specific requirements.</li>
                <li>Products that cannot be resold due to hygiene or safety considerations.</li>
                <li>Other products specifically marked as “Non-Returnable” or “Non-Replaceable” on the product page.</li>
            </ul>
            <p>However, applicable consumer rights in relation to products that are defective, damaged, incorrectly supplied, or otherwise not in conformity with the order will not be affected by this provision.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">9. Made-to-Order & Customized Products</h2>
            <p>Made-to-order, customized, personalized, or specially manufactured products generally cannot be cancelled, returned, or replaced merely due to a change of mind or personal preference.</p>
            <p>However, if such a product is received damaged, defective, incorrect, or materially different from the confirmed order, the customer may contact Ebigcart within the applicable period for resolution.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">10. Return Shipping Charges</h2>
            <p>For eligible returns arising due to a product being damaged, defective, incorrect, or materially different from the order, Ebigcart may arrange return pickup at no additional cost to the customer, where pickup service is available.</p>
            <p>Where Ebigcart specifically authorizes self-shipping because pickup is unavailable, eligible shipping expenses may be reimbursed against a valid courier receipt, subject to applicable limits and approval.</p>
            <p>For returns arising for reasons other than a product defect, damage, or Ebigcart’s error, any applicable return shipping charges will be communicated to the customer before processing the return.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">11. Damaged Package at the Time of Delivery</h2>
            <p>Customers are advised to inspect the package at the time of delivery, wherever reasonably possible.</p>
            <p>If the package appears visibly damaged or tampered with, the customer should report the issue to Ebigcart Customer Support as soon as possible and provide photographs/videos of the package and product, where requested.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">12. Refund Processing</h2>
            <p>Once the returned product has been received and, where applicable, inspected and approved, Ebigcart will initiate the eligible refund.</p>
            <p>The refund may take additional time to appear in the customer’s bank account or payment instrument due to processing timelines of the relevant bank, card issuer, UPI provider, payment gateway, or financial institution.</p>
            <p>Ebigcart shall not be responsible for delays caused by such third-party payment or banking institutions.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">13. Customer Responsibility</h2>
            <p>Customers are responsible for providing accurate delivery information, contact details, and order information.</p>
            <p>Customers must also ensure that returned products are securely packed to prevent damage during return transit.</p>
            <p>Ebigcart may not be able to process a return or replacement where the product has been damaged after delivery due to misuse, negligence, unauthorized modification, improper installation, or failure to follow the manufacturer’s instructions.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">14. Policy Updates</h2>
            <p>Ebigcart reserves the right to modify or update this Policy from time to time to reflect changes in our business practices, products, services, technology, or applicable legal requirements.</p>
            <p>Any updated Policy will be published on the Ebigcart website with the revised effective date.</p>

            <h2 class="text-xl font-serif font-bold text-gray-900 mt-8 mb-4">15. Contact Us</h2>
            <p>For any questions or concerns regarding cancellation, returns, replacements, or refunds, please contact our Customer Support Team:</p>
            <ul class="list-none space-y-2 mt-2">
                <li><strong>Website:</strong> Ebigcart</li>
                <li><strong>Email:</strong> <a href="mailto:ebigcartsupport@gmail.com" class="text-blue-600 hover:underline">ebigcartsupport@gmail.com</a></li>
                <li><strong>Phone:</strong> <a href="tel:9259449933" class="text-blue-600 hover:underline">9259449933</a></li>
            </ul>

            <p class="mt-8 text-gray-700 font-medium">We are committed to resolving genuine customer concerns fairly and providing an efficient after-sales experience.</p>
            <p class="text-gray-700 font-medium">Thank you for choosing Ebigcart.</p>
        </div>
    </div>
@endsection
