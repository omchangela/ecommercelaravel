<!-- resources/views/checkout.blade.php -->

 <!-- Adjust path to your layout -->

<?php $__env->startSection('body'); ?>
<br><br><br><br>
<section class="z-index-2 position-relative pb-2 mb-12">

    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a title="Home" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a title="Shop" href="/shop">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container pb-14 pb-lg-19">
    <div class="text-center">
        <h2 class="mb-6">Check out</h2>
    </div>

    <form class="pt-12">
        <div class="row">
            <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                <div class="card border-0 rounded-0 shadow">
                    <div class="card-header px-0 mx-10 bg-transparent py-8">
                        <h4 class="fs-4 mb-8">Order Summary</h4>

                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex w-100 mb-7">
                            <div class="me-6">
                                <img src="<?php echo e(asset($item->image_url)); ?>" class="lazy-image" width="60" height="80" alt="<?php echo e($item->product_name); ?>">
                            </div>
                            <div class="d-flex flex-grow-1">
                                <div class="pe-6">
                                    <a href="#" class=""><?php echo e($item->product_name); ?><span class="text-body"> x<?php echo e($item->quantity); ?></span></a>
                                    <p class="fs-14px text-body-emphasis mb-0 mt-1">Size:
                                        <span class="text-body"><?php echo e($item->unit ?? 'N/A'); ?></span>
                                    </p>
                                    <?php if(!empty($item->color)): ?>
                                    <p class="fs-14px text-body-emphasis mb-0 mt-1">Color:
                                        <span class="text-body"><?php echo e($item->color); ?></span>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <div class="ms-auto">
                                    <p class="fs-14px text-body-emphasis mb-0 fw-bold">₹<?php echo e(number_format($item->price * $item->quantity, 2)); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="card-body px-10 py-8">
                        <div class="d-flex align-items-center mb-2">
                            <span>Subtotal:</span>
                            <span class="d-block ms-auto text-body-emphasis fw-bold">₹<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2)); ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span>Shipping:</span>
                            <span class="d-block ms-auto text-body-emphasis fw-bold">₹<?php echo e($shippingCost ?? 0); ?></span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent py-5 px-0 mx-10">
                        <div class="d-flex align-items-center fw-bold mb-6">
                            <span class="text-body-emphasis p-0">Total price:</span>
                            <span class="d-block ms-auto text-body-emphasis fs-4 fw-bold">₹<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity) + ($shippingCost ?? 0), 2)); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                <div class="checkout">

                    <div class="collapse" id="collapsecoupon">
                        <div class="card mw-60 border-0">
                            <div class="card-body py-10 px-8 my-10 border">
                                <p class="card-text text-body-emphasis mb-8">
                                    If you have a coupon code, please apply it below.</p>
                                <div class="input-group position-relative">
                                    <input type="email" class="form-control bg-body rounded-end" placeholder="Your Email*">
                                    <button type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary">
                                        Apply Coupon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="fs-4 pt-4 mb-7">Shipping Information</h4>


                    <div class="mb-7">
                        <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">name</label>
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-7">
                                <input type="text" class="form-control" id="first-name" name="firstname" placeholder="First Name" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last-name" name="lasttname" placeholder="Last Name" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-7">
                        <div class="row">
                            <div class="col-md-8 mb-md-0 mb-7">
                                <label for="street-address" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Street Address</label>
                                <input type="text" class="form-control" id="street-address" name="streetaddress" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="apt" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">APT/Suite</label>
                                <input type="text" class="form-control" id="apt" name="apt" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-7">
                        <div class="row">
                            <div class="col-md-4 mb-md-0 mb-7">
                                <label for="city" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">City</label>
                                <input type="text" class="form-control" id="city" name="city" required="">
                            </div>
                            <div class="col-md-4 mb-md-0 mb-7">
                                <label for="state" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">State</label>
                                <input type="text" class="form-control" id="state" name="state" required="">
                            </div>
                            <div class="col-md-4">
                                <label for="zip" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">zip code</label>
                                <input type="text" class="form-control" id="zip" name="zip" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-7">
                        <label for="country" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Country</label>
                        <select id="country" name="country" class="form-select bg-body-secondary rounded" required>
                            <option value="" disabled selected>Select your country</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                        </select>
                    </div>

                    <div class="mb-7">
                        <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">info</label>
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-7">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone number" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 mb-5 form-check">
                        <input type="checkbox" class="form-check-input rounded-0 me-4" name="customCheck6" id="customCheck5">
                        <label class="text-body-emphasis" for="customCheck5">
                            <span class="text-body-emphasis">Billing address is the same as shipping</span>
                        </label>
                    </div>
                </div>

                <div class="checkout mb-7">
                    <div class="mb-7">
                        <h4 class="fs-4 mb-8 mt-12 pt-lg-1">Payment Information</h4>

                        <div class="mb-7">
                            <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Amount</label>
                            <input
                                name="paymentAmount"
                                type="number"
                                class="form-control"
                                id="payment-amount"
                                placeholder="Enter amount"
                                min="1"
                                step="0.01"
                                value="<?php echo e(number_format($cartItems->sum(fn($item) => $item->price * $item->quantity), 2, '.', '')); ?>"
                                required>


                        </div>


                        <input type="hidden" id="razorpay-payment-id" name="razorpay_payment_id">

                        <button type="button" id="rzp-button" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11 mt-md-7 mt-4">Pay with Razorpay</button>
                    </div>
                </div>

                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                    document.getElementById('rzp-button').onclick = function(e) {
                        e.preventDefault();

                        var amount = document.getElementById('payment-amount').value;


                        // Validate the payment amount
                        if (!amount || amount <= 0) {
                            alert('Please enter a valid amount.');
                            return;
                        }

                        // Create Razorpay Order
                        fetch("<?php echo e(route('createOrder')); ?>", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                                },
                                body: JSON.stringify({
                                    amount: amount
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.order_id) {
                                    // Initialize Razorpay Payment
                                    var options = {
                                        key: "<?php echo e(env('RAZORPAY_KEY')); ?>",
                                        amount: data.amount,
                                        currency: data.currency,
                                        name: "Nextinn Software",
                                        description: "Payment for your order",
                                        image: "<?php echo e(asset('assets/website/assets')); ?>/images/others/logo.png",
                                        order_id: data.order_id,
                                        handler: function(response) {
                                            fetch("<?php echo e(route('createOrder')); ?>", {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                                                    },
                                                    body: JSON.stringify({
                                                        razorpay_payment_id: response.razorpay_payment_id,
                                                        razorpay_order_id: response.razorpay_order_id,
                                                        razorpay_signature: response.razorpay_signature,
                                                        first_name: document.getElementById('first-name').value,
                                                        last_name: document.getElementById('last-name').value, // Fixed typo
                                                        street_address: document.getElementById('street-address').value,
                                                        apt_suite: document.getElementById('apt').value,
                                                        city: document.getElementById('city').value,
                                                        state: document.getElementById('state').value,
                                                        zip_code: document.getElementById('zip').value,
                                                        country: document.getElementById('country').value,
                                                        email: document.getElementById('email').value,
                                                        phone: document.getElementById('phone').value,
                                                        billing_same_as_shipping: document.getElementById('customCheck5').checked,
                                                        total_price: document.getElementById('payment-amount').value
                                                    })
                                                })
                                                .then(res => res.json())
                                                .then(successData => {
                                                    if (successData.success) {
                                                        alert(successData.message);
                                                        window.location.href = "/";
                                                    } else {
                                                        alert(successData.message);
                                                    }
                                                })
                                                .catch(err => {
                                                    alert('Something went wrong. Please try again.');
                                                });
                                        },
                                        theme: {
                                            color: "#F37254"
                                        }
                                    };
                                    var rzp = new Razorpay(options);
                                    rzp.open();
                                } else {
                                    alert('Error creating Razorpay order. Please try again.');
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('Error processing payment. Please try again.');
                            });
                    };
                </script>




            </div>
        </div>
    </form>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/checkout.blade.php ENDPATH**/ ?>