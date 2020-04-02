<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Electricity Bill Calculator</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:500,700|Shadows+Into+Light" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<header>
			<h1>Bill Calculator</h1>
		</header>
		<main class="bill">
            <label style="margin-top: -80px;">Your bill for XXX units:</label>
            <h1 class="larger">₹ 500</h1>
            <label style="margin-top: 100px;">RUPEES FIVE HUNDRED ONLY</label>
        </main>
        
        <div class="breakdown" style="text-align: center; margin-top: 50px; display: none;">
            <p><?php echo str_repeat("-", 100); ?></p>
            <table border="0" style="margin-left: 20vw;">
                <tr>
                    <td>Units Consumed</td>
                    <td style="padding-left: 10vw;">50</td>
                </tr>
            </table>
        </div>
		<div class="form-footer">
			<div class="button-wrapper">
				<button id="mainButton" type="submit">View Breakdown</button>
			</div>
		</div>
	</div>
</body>
<script>
const bill = document.querySelector('.bill')
const button = document.querySelector('button')
const breakdown = document.querySelector('.breakdown'); 

const toggleBreakdown= () => {
	bill.classList.toggle('active')
	
	if(bill.classList.contains('active')) {
        breakdown.style.display = "block";
		button.innerHTML = 'Hide Breakdown'
	} else {
        breakdown.style.display = "none";
		button.innerHTML = 'View Breakdown'
	}
}

button.addEventListener('click', toggleBreakdown)
</script>
</html>