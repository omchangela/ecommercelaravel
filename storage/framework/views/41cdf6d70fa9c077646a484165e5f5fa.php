
<?php $__env->startSection('body'); ?>
<br><br><br><br>
<div class="container">
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
    <h2>Checkout</h2>

    <section class="container pb-14 pb-lg-19">
        <div class="text-center">
            <h2 class="mb-6">Check out</h2>
        </div>

        <form class="pt-12" id="checkout-form">
            <div class="row">
                <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                    <div class="card border-0 rounded-0 shadow">
                        <div class="card-header px-0 mx-10 bg-transparent py-8">
                            <h4 class="fs-4 mb-8">Order Summary</h4>
                            <?php $__empty_1 = true; $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="d-flex w-100 mb-7">
                                <div class="me-6">
                                    <img src="<?php echo e(asset($item->image_url)); ?>" class="lazy-image" width="60" height="80" alt="<?php echo e($item->product_name); ?>">
                                </div>
                                <div class="d-flex flex-grow-1">
                                    <div class="pe-6">
                                        <a href="#">
                                            <?php echo e($item->product_name); ?>

                                            <span class="text-body">x<?php echo e($item->quantity); ?></span>
                                        </a>
                                        <p class="fs-14px text-body-emphasis mb-0 mt-1">Size:
                                            <span class="text-body"><?php echo e($item->unit); ?></span>
                                        </p>
                                    </div>
                                    <div class="ms-auto">
                                        <p class="fs-14px text-body-emphasis mb-0 fw-bold">₹<?php echo e(number_format($item->price * $item->quantity, 2)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-center text-muted">Your cart is empty.</p>
                            <?php endif; ?>
                        </div>

                        <div class="card-body px-10 py-8">
                            <div class="d-flex align-items-center mb-2">
                                <span>Subtotal:</span>
                                <span class="d-block ms-auto text-body-emphasis fw-bold">
                                    ₹<?php echo e(number_format(collect($cartItems)->sum(fn($item) => $item->price * $item->quantity), 2)); ?>

                                </span>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent py-5 px-0 mx-10">
                            <div class="d-flex align-items-center fw-bold mb-6">
                                <span class="text-body-emphasis p-0">Total price:</span>
                                <span class="d-block ms-auto text-body-emphasis fs-4 fw-bold">
                                    ₹<?php echo e(number_format(collect($cartItems)->sum(fn($item) => $item->price * $item->quantity), 2)); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                    <div class="checkout">
                        <h4 class="fs-4 pt-4 mb-7">Shipping Information</h4>
                        <div class="mb-7">
                            <label for="shipping_name">Full Name</label>
                            <input type="text" class="form-control" id="shipping_name" name="shipping_name" required>
                        </div>
                        <div class="mb-7">
                            <label for="shipping_address">Address</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" required></textarea>
                        </div>
                        <div class="row mb-7">
                            <div class="col-md-4">
                                <label for="shipping_city">City</label>
                                <input type="text" class="form-control" id="shipping_city" name="shipping_city" required>
                            </div>
                            <div class="col-md-4">
                                <label for="shipping_state">State</label>
                                <input type="text" class="form-control" id="shipping_state" name="shipping_state" required>
                            </div>
                            <div class="col-md-4">
                                <label for="shipping_zip">Zip Code</label>
                                <input type="text" class="form-control" id="shipping_zip" name="shipping_zip" required>
                            </div>
                        </div>
                        <div class="mb-7">
                            <label for="shipping_country">Country</label>
                            <input type="text" class="form-control" id="shipping_country" name="shipping_country" required>
                        </div>

                    </div>
                    <button type="submit" id="pay-button" class="btn btn-dark">Pay Now</button>
                </div>
            </div>
        </form>
    </section>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('pay-button').onclick = async function(e) {
        e.preventDefault();

        const form = document.getElementById('checkout-form');
        const formData = new FormData(form);

        // Ensure cartItems are passed properly from Blade to JavaScript
        const cartItems = <?php echo json_encode($cartItems, 15, 512) ?>;

        console.log('Cart Items:', cartItems);

        // Map over cart items and prepare order products
        const orderProducts = cartItems.map(item => ({
            product_id: item.id,
            quantity: item.quantity,
            price: item.price
        }));
        console.log('Order Products:', orderProducts);

        // Calculate total amount
        const totalAmount = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
        console.log('Total Amount:', totalAmount);

        // Get form entries
        const formEntries = Object.fromEntries(formData);
        console.log('Form Entries:', formEntries);
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        try {
            // Sending data to the backend to create the order
            const response = await fetch('<?php echo e(url("create-order")); ?>', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },

                body: JSON.stringify({
                    total_amount: totalAmount,
                    order_products: orderProducts,
                    ...formEntries
                }),
            });

            // Check for successful response or redirection (302)
            if (response.status === 302) {
                console.error("Redirected! Check authentication or route setup.");
                // Handle redirect: e.g., redirect to login or show a message
                return;
            }

            // Parse the response data from the server
            const data = await response.json();
            console.log('Response from Order Creation:', data);

            // Prepare Razorpay options and open the payment modal
            const options = {
                key: data.key,
                amount: data.amount,
                order_id: data.order_id,
                handler: async function(paymentResponse) {
                    console.log('Payment Response:', paymentResponse);
                    await fetch('/payment-callback', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        },
                        body: JSON.stringify(paymentResponse),
                    });

                    // Show success popup after successful payment
                    Swal.fire({
                        title: 'Payment Successful!',
                        text: 'Your payment was successful.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to /shop page after success
                        window.location.href = '/shop';
                    });
                },
                modal: true,
                prefill: {
                    name: 'Customer Name',
                    email: 'customer@example.com',
                },
                theme: {
                    color: '#3399cc', // Set the theme color if desired
                }
            };
            console.log('Opening Razorpay Modal with options:', options);
            new Razorpay(options).open();

        } catch (error) {
            console.error('Error during the order creation or Razorpay setup:', error);

            // Show failure popup after error
            Swal.fire({
                title: 'Payment Failed!',
                text: 'There was an issue with your payment.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirect to /shop page after failure
                window.location.href = '/shop';
            });
        }
    };
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\mark11\resources\views/website/checkout.blade.php ENDPATH**/ ?>