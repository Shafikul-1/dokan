<pre>

<?php 
$result = '';
foreach ($productIdQty as $subArray) {
  foreach ($subArray as $key => $value) {
      $result .= "$key,$value/";
  }
}

?>
</pre>
<div class="font-sans bg-white p-4">
  <div class="max-w-4xl mx-auto">
    <div class="text-center">
      <h2 class="text-3xl font-extrabold text-gray-800 inline-block border-b-[3px] border-gray-800 pb-1">Checkout</h2>
    </div>
    <form action="pricecut.php" method="post">
      <div class="mt-12">
        <div class="grid md:grid-cols-3 gap-4">
          <div>
            <h3 class="text-3xl font-bold text-gray-300">01</h3>
            <h3 class="text-xl font-bold text-gray-800 mt-1">Personal Details</h3>
          </div>
          <input type="number" hidden name="order_total_price" value="<?php echo $allTotalPrice ?>" id="">
          <input type="text" hidden name="all_product_id" value="<?php echo implode(",", $allProductId) ?>" id="">
          <input type="text" hidden name="user_order_id_qty" value="<?php echo $result ?>" id="">
          <input hidden name="user_order_time" type="text" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("d-m-Y h:i:s A"); ?>">
          <div class="md:col-span-2">
            <div class="grid sm:grid-cols-2 gap-4">
              <input type="text" name="order_user_first_name" placeholder="First name" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="text" name="order_user_last_name" placeholder="Last name" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="email" name="order_user_email" placeholder="Email address" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="number" name="order_user_number" placeholder="Phone number" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
            </div>
          </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4 mt-12">
          <div>
            <h3 class="text-3xl font-bold text-gray-300">02</h3>
            <h3 class="text-xl font-bold text-gray-800 mt-1">Shopping Address</h3>
          </div>

          <div class="md:col-span-2">
            <div class="grid sm:grid-cols-2 gap-4">
              <input type="text" name="order_user_street_address" placeholder="Street address" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="text" name="order_user_city" placeholder="City" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="text" name="order_user_state" placeholder="State" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
              <input type="number" name="order_user_zip_code" placeholder="Zip Code" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" required/>
            </div>
          </div>
        </div>

        <div class="grid md:grid-cols-3 gap-4 mt-12">
          <div>
            <h3 class="text-3xl font-bold text-gray-300">03</h3>
            <h3 class="text-xl font-bold text-gray-800 mt-1">Payment method</h3>
          </div>

          <div class="md:col-span-2">
            <div class="grid gap-4 sm:grid-cols-2">
              <!-- card -->
              <div class="flex items-center">
                <input type="radio" class="w-5 h-5 cursor-pointer" name="order_user_payment_method" value="1" id="cash_on_delivery" checked />
                <label for="cash_on_delivery" class="ml-4 flex gap-2 cursor-pointer">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiAjJXei-eVRVm7e-d50oi6cYXC4wILvqddw&s" class="w-20" alt="paypalCard" />
                </label>
              </div>
              <!--  paypal -->
              <div class="flex items-center">
                <input type="radio" class="w-5 h-5 cursor-pointer" value="2" name="order_user_payment_method" id="paypal" />
                <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
                  <img src="https://readymadeui.com/images/paypal.webp" class="w-20" alt="paypalCard" />
                </label>
              </div>
              <!-- cash_on_delivery -->
              <div class="flex items-center">
                <input type="radio" class="w-5 h-5 cursor-pointer" value="3" name="order_user_payment_method" id="card" />
                <label for="card" class="ml-4 flex gap-2 cursor-pointer">
                  <img src="https://readymadeui.com/images/visa.webp" class="w-12" alt="card1" />
                  <img src="https://readymadeui.com/images/american-express.webp" class="w-12" alt="card2" />
                  <img src="https://readymadeui.com/images/master.webp" class="w-12" alt="card3" />
                </label>
              </div>
            </div>

            <div class="grid sm:grid-cols-4 gap-4 mt-4">
              <div class="col-span-2">
                <input name="order_user_card_number" type="number" placeholder="Card number" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" />
              </div>
              <input name="order_user_exp" type="number" placeholder="EXP." class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" />
              <input name="order_user_cvv" type="number" placeholder="CVV" class="px-4 py-3 bg-white text-gray-800 w-full text-sm border-2 rounded-md focus:border-blue-500 outline-none" />
            </div>
          </div>
        </div>

        <div class="flex flex-wrap justify-end gap-4 mt-12">
          <button type="submit" name="order_submit" class="px-6 py-3 text-sm font-semibold tracking-wide bg-blue-600 text-white rounded-md hover:bg-blue-700">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>