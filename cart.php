<?php
session_start();
include("Database/connect.php");
include("header.php");

// Fetch theme
$q = mysqli_query($conn, "SELECT * FROM temp LIMIT 1");
$row = mysqli_fetch_row($q);

// Form values<?php
include('Database/connect.php');
include('session.php');		
include("header.php");

$q = mysqli_query($conn, "SELECT * FROM temp LIMIT 1");
$row = mysqli_fetch_row($q);

$themeName = $row[2];
$themePrice = $row[3];
?>

<!-- Include Khalti JS SDK -->
<script src="https://khalti.com/static/khalti-checkout.js"></script>

<div class="codes">
	<div class="container"> 
		<h3 class='w3ls-hdg' align="center">BOOKING</h3>
		<div class="grid_3 grid_4">
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" id="bookingForm">
						<div class="form-group">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="name" pattern="[A-Za-z\s]{2,30}" required placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control1" id="email" required placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Mobile no</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="mobile" pattern="[7-9]{1}[0-9]{9}" maxlength="10" required placeholder="Mobile no">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Your Theme :</label>
							<div class="col-sm-8">
								<img src="./images/<?php echo $row[1]; ?>" height="200" width="300"/>
							</div>		
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Theme Name :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" value="<?php echo $themeName; ?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Theme Price :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" value="<?php echo $themePrice; ?>" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Event Date</label>
							<div class="col-sm-8">
								<input type="date" class="form-control1" id="eventDate" required>
							</div>
						</div>
						<div class="contact-w3form" align="center">
							<button type="button" id="pay-btn" class="btn">Pay with Khalti</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var config = {
		publicKey: "test_public_key_dc74b9117f1b4c2db9a46a9e5e85f66a", // TEST public key
		productIdentity: "<?php echo uniqid(); ?>",
		productName: "<?php echo $themeName; ?>",
		productUrl: "http://localhost/milantra/cart.php", // Your local test URL
		paymentPreference: ["KHALTI"],
		eventHandler: {
			onSuccess(payload) {
				const formData = new FormData();
				formData.append('nm', document.getElementById("name").value);
				formData.append('email', document.getElementById("email").value);
				formData.append('mo', document.getElementById("mobile").value);
				formData.append('date', document.getElementById("eventDate").value);
				formData.append('theme', "<?php echo $themeName; ?>");
				formData.append('price', "<?php echo $themePrice; ?>");
				formData.append('token', payload.token);
				formData.append('amount', payload.amount);

				// Send data to success.php after payment
				fetch("success.php", {
					method: "POST",
					body: formData
				})
				.then(response => response.text())
				.then(result => {
					alert("Booking successful!");
					window.location.href = "success.php";
				})
				.catch(error => {
					console.error("Error:", error);
					alert("Something went wrong.");
				});
			},
			onError(error) {
				console.log(error);
				alert("Payment Failed!");
			},
			onClose() {
				console.log('Payment popup closed');
			}
		}
	};

	var checkout = new KhaltiCheckout(config);

	document.getElementById("pay-btn").onclick = function () {
		const name = document.getElementById("name").value.trim();
		const email = document.getElementById("email").value.trim();
		const mobile = document.getElementById("mobile").value.trim();
		const date = document.getElementById("eventDate").value;

		if (name && email && mobile && date) {
			const amount = <?php echo $themePrice; ?> * 100; // in paisa
			checkout.show({ amount: amount });
		} else {
			alert("Please fill all the fields before paying.");
		}
	};
</script>

<?php include_once("footer.php"); ?>

$_SESSION['nm'] = $_POST['nm'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['mo'] = $_POST['mo'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['theme'] = $row[1];
$_SESSION['theme_name'] = $row[2];
$_SESSION['price'] = $row[3];

$amount = $row[3]; // Theme price
$tx_uuid = uniqid('TX'); // Unique transaction ID
$success = "http://localhost/milantra/esewa_success.php";
$failure = "http://localhost/milantra/esewa_failure.php";

// Create signature
$string = "total_amount={$amount},transaction_uuid={$tx_uuid},product_code=EPAYTEST";
$signature = base64_encode(hash_hmac('sha256', $string, '8gBm/:&EnhH.1/q', true));
?>

<form id="esewaForm" action="https://epay.esewa.com.np/epay/main" method="POST">
  <input type="hidden" name="amount" value="<?= $amount ?>">
  <input type="hidden" name="tax_amount" value="0">
  <input type="hidden" name="total_amount" value="<?= $amount ?>">
  <input type="hidden" name="transaction_uuid" value="<?= $tx_uuid ?>">
  <input type="hidden" name="product_code" value="EPAYTEST">
  <input type="hidden" name="product_service_charge" value="0">
  <input type="hidden" name="product_delivery_charge" value="0">
  <input type="hidden" name="success_url" value="<?= $success ?>">
  <input type="hidden" name="failure_url" value="<?= $failure ?>">
  <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
  <input type="hidden" name="signature" value="<?= $signature ?>">
</form>
<script>
  document.getElementById("esewaForm").submit();
</script>
