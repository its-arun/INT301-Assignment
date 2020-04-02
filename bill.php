<?php 
if (!isset($_POST['calculate'])) {
    header('Location: index.php');
}
else {
    $units = $_POST['units'];
    $billamount = 0;
    if ($units > 100) {
        $billamount = (50 * 9) + (50 * 12) + (($units - 100) * 15);
    }
    elseif($units > 50 && $units <= 100 ) {
        $billamount = (50 * 9) + (($units - 50) * 12);
    }
    else {
        $billamount = $units * 9;
    }
    $f = numfmt_create( 'en', NumberFormatter::SPELLOUT );
    $towords = strtoupper(numfmt_format($f, $billamount));
    $towords = str_replace("-"," ",$towords);
?>
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
            <label style="margin-top: -80px;">Your bill for <?php echo $units;  ?> units:</label>
            <h1 class="larger">₹ <?php echo $billamount;  ?></h1>
            <label style="margin-top: 100px;">RUPEES <?php echo $towords; ?> ONLY</label>
        </main>
        
        <div class="breakdown" style="text-align: center; margin-top: 50px; display: none;">
            <p><?php echo str_repeat("-", 100); ?></p>
            <table border="0" style="margin-left: 13vw;">
            <?php if ($units > 100) { ?>
                <tr>
                    <td>Units 101 - <?php echo $units; ?></td>
                    <td style="padding-left: 10vw;"><?php echo "₹ 15 * ".($units - 50) ;  ?></td>
                    <td style="padding-left: 10vw;">₹ <?php  if($billamount >= 10000) { echo '&nbsp;&nbsp;'; } echo ($units - 100) * 15; $units = $units - ($units - 100);  ?></td>
               </tr>
                <?php } ?>
                <?php if($units > 50 && $units <= 100 ) { ?>
                <tr>
                    <td>Units <?php if($billamount > 1050) { echo '&nbsp;&nbsp;'; } echo '51 - '.$units; ?></td>
                    <td style="padding-left: 10vw;">₹ <?php echo "12 * ".($units - 50) ;  ?></td>
                    <td style="padding-left: 10vw;">₹ <?php if($billamount > 1050) { echo '&nbsp;&nbsp;'; } if($billamount >= 10000) { echo '&nbsp;&nbsp;'; } echo ($units - 50) * 12; $units = $units - ($units - 50);  ?></td>
                </tr>
                <?php } ?>
                <?php if($units <= 50 ) { ?>
                <tr>
                    <td>Units <?php if($billamount > 450) { echo '&nbsp;&nbsp;'; } if($billamount > 1050) { echo '&nbsp;&nbsp;'; } echo '0 - '.$units; ?></td>
                    <td style="padding-left: 10vw;">₹ <?php echo "09 * ".$units;  ?></td>
                    <td style="padding-left: 10vw;">₹ <?php if($billamount > 1050) { echo '&nbsp;&nbsp;'; }  if($billamount >= 10000) { echo '&nbsp;&nbsp;'; } echo $units * 9;?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding-left: 8vw;"><?php echo str_repeat("-", 20); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 12vw;">Total</td>
                    <td style="padding-left: 10vw;">₹ <?php echo $billamount; ?></td>
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
<?php 
}
?>