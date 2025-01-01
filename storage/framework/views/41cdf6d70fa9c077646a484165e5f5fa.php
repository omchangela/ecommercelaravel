 <!-- Adjust path to your layout -->

<?php $__env->startSection('body'); ?>
<br><br><br><br>

<section class="z-index-2 position-relative pb-2 mb-12">
    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a href="/" title="Home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/shop" title="Shop">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container pb-14 pb-lg-19">
    <div class="text-center">
        <h2 class="mb-6">Check Out</h2>
    </div>

    <form id="checkout-form" class="pt-12">
        <div class="row">
            <!-- Order Summary -->
            <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                <div class="card border-0 rounded-0 shadow">
                    <div class="card-header px-0 mx-10 bg-transparent py-8">
                        <h4 class="fs-4 mb-8">Order Summary</h4>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex w-100 mb-7">
                            <img src="<?php echo e(asset($item->image_url)); ?>" class="me-6 lazy-image" width="60" height="80" alt="<?php echo e($item->product_name); ?>">
                            <div class="d-flex flex-grow-1">
                                <div>
                                    <a href="#" class=""><?php echo e($item->product_name); ?><span class="text-body"> x<?php echo e($item->quantity); ?></span></a>
                                    <p class="fs-14px mb-0 mt-1">Size: <span><?php echo e($item->unit ?? 'N/A'); ?></span></p>
                                    <?php if($item->color): ?>
                                    <p class="fs-14px mb-0 mt-1">Color: <span><?php echo e($item->color); ?></span></p>
                                    <?php endif; ?>
                                </div>
                                <div class="ms-auto">
                                    <p class="fs-14px fw-bold mb-0">₹<?php echo e(number_format($item->price * $item->quantity, 2)); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="card-body px-10 py-8">
                        <div class="d-flex align-items-center mb-2">
                            <span>Subtotal:</span>
                            <span class="ms-auto fw-bold">₹<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2)); ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>Shipping:</span>
                            <span class="ms-auto fw-bold">₹<?php echo e($shippingCost ?? 0); ?></span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent py-5 px-0 mx-10">
                        <div class="d-flex align-items-center fw-bold mb-6">
                            <span>Total:</span>
                            <span class="ms-auto fs-4">₹<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity) + ($shippingCost ?? 0), 2)); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                <h4 class="fs-4 pt-4 mb-7">Shipping Information</h4>
                <div class="mb-7">
                    <label for="first-name" class="mb-2">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="firstname" required>
                </div>
                <div class="mb-7">
                    <label for="last-name" class="mb-2">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="lastname" required>
                </div>
                <div class="mb-7">
                    <label for="street-address" class="mb-2">Street Address</label>
                    <input type="text" class="form-control" id="street-address" name="streetaddress" required>
                </div>
                <div class="mb-7">
                    <label for="city" class="mb-2">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="mb-7">
                    <label for="state" class="mb-2">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="mb-7">
                    <label for="zip" class="mb-2">Zip Code</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
                <div class="mb-7">
                    <label for="country" class="mb-2">Country</label>
                    <select id="country" name="country" class="form-select bg-body-secondary" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                    </select>
                </div>
                <div class="mb-7">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-7">
                    <label for="phone" class="mb-2">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" required>
                </div>

                <!-- Payment Section -->
                <h4 class="fs-4 mt-12 mb-8">Payment Information</h4>
                <div class="mb-7">
                    <label for="payment-amount" class="mb-2">Amount</label>
                    <input type="number" class="form-control" id="payment-amount" name="paymentAmount" value="<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2, '.', '')); ?>" min="1" step="0.01" required>
                </div>
                <button type="button" id="rzp-button" class="btn btn-dark px-11 mt-4">Pay with Razorpay</button>
            </div>
        </div>
    </form>
</section>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button').onclick = function (e) {
        e.preventDefault();
        const amount = document.getElementById('payment-amount').value;

        if (!amount || amount <= 0) {
            alert('Please enter a valid amount.');
            return;
        }

        fetch("<?php echo e(route('createOrder')); ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            body: JSON.stringify({ amount })
        })
        .then(response => response.json())
        .then(data => {
            if (data.order_id) {
                const options = {
                    key: "<?php echo e(env('RAZORPAY_KEY')); ?>",
                    amount: data.amount,
                    currency: data.currency,
                    name: "Nextinn Software",
                    description: "Payment for your order",
                    image: "<?php echo e(asset('path-to-logo.png')); ?>",
                    order_id: data.order_id,
                    
                    prefill: {
                        name: document.getElementById('first-name').value,
                        email: document.getElementById('email').value,
                        contact: document.getElementById('phone').value
                    },
                    theme: {
                        color: "#3399cc"
                    }
                };
                const rzp = new Razorpay(options);
                rzp.open();
            } else {
                alert('Failed to create order. Please try again.');
            }
        })
        .catch(err => console.error('Error:', err));
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/checkout.blade.php ENDPATH**/ ?>