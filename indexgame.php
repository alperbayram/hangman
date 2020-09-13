
<?php
session_start();

if (!isset($_SESSION['dur'])) {
	$_SESSION['dur'] = 0;
}

if ($_SESSION['dur'] == 0) {

	$_SESSION['dur'] = 1;
}


$words = array("detaynet", "predoova", "asmak", "adam", "kalem", "alper", "abes",  "abis", "acep", "acil", "acki", "hatmi", "hatun", "heder");
$wordSum = count($words) . "</br>";
$random_keys = array_rand($words, 1);
$key = $words["$random_keys"];
$keylength = strlen($key);


$letterarray = str_split($key); // keyin harf arrayine dönüşmüş hali
$secretarray = array(); //
$hatasayisi = 0;



$_SESSION['wordSum'] = $wordSum;
$_SESSION['random_keys'] = $random_keys;
$_SESSION['key'] = $key;
$_SESSION['letterarray'] = $letterarray;
$_SESSION['keylength'] = $keylength;


for ($j = 0; $j < $keylength; $j++) {
	array_push($secretarray, " _ ");
}
//eğer harf  var ise
$_SESSION['secretarray'] = $secretarray;
$_SESSION['hatasyisi'] = $hatasayisi;

echo "</br>";
echo $_SESSION['random_keys'];
echo "</br>";
echo $_SESSION['key'];
echo "</br>";
print_r($_SESSION['letterarray']);
echo "</br>";
print_r($_SESSION['secretarray']);
echo "</br>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>adamas</title>
	<link rel="stylesheet" href="game.css">
</head>

<body>
	<div id="metin">
	</div>
	<div class="btn">
		<!-- burası oyunu baştan başlatmak için -->
		<a href="#" class="myButton"> Oyna </a>

	</div>

	<div class="index">
		<div class="adam">
			<img id="adamresmi" src="7.gif"></img>
		</div>

		<div class="game">
			<p id="kelime" <?php kelime($deger) ?>>
				<?php
				function kelime($deger)
				{
					print_r(array_walk_recursive($_SESSION['secretarray'], 'kelime'));
				}
				?>
			</p>

			<h2 id="gelenharf"> Bir harf giriniz...
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = $_POST['fname'];

					if (empty($name)) {
						echo "Name is empty";
					} else {
						echo $name;
					}
				}
				?>


			</h2>
			</br>

			<form method="post" id="form" action="<?php $_PHP_SELF ?>">
				<input id="text" type="text" name="fname" maxlength="1" />
				<input id="btn2" type="submit" value="harf ara" onclick="oyna()" />
				<?php
				function oyna()
				{/*
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$names = $_POST['fname'];

						if (in_array($names, $_SESSION['letterarray'])) {

							$letter = array_search($names, $_SESSION['letterarray']); //gelen harf değişkne atadık.


							for ($i = 0; $i < $_SESSION['keylength']; $i++) {
								if ($_SESSION['letterarray'][$i] == $letter) {
									$_SESSION['secretarray'][$i] = $letter;
									array_walk($_SESSION['secretarray'], "mykelime");
								}
							}


							for ($j = $_SESSION['keylength']; $j > 0; $j++) {
								if ($_SESSION['letterarray'][$j] == $_SESSION['letterarray'][$letter]) {
									$_SESSION['letterarray'][$j] = $_SESSION['secretarray'][$j];
									array_walk($_SESSION['secretarray'], "mykelime");
								}
							}
						}
					}*/
				}
				/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$names = $_POST['fname'];

					if (in_array($names, $_SESSION['letterarray'])) {

						$letter = array_search($names, $_SESSION['letterarray']); //gelen harf değişkne atadık.


						for ($i = 0; $i < $_SESSION['keylength']; $i++) {
							if ($_SESSION['letterarray'][$i] == $letter) {
								$_SESSION['secretarray'][$i] = $letter;
								array_walk($_SESSION['secretarray'], "mykelime");
							}
						}

						for ($j = $_SESSION['keylength']; $j > 0; $j++) {
							if ($_SESSION['letterarray'][$j] == $_SESSION['letterarray'][$letter]) {
								$_SESSION['letterarray'][$j] = $_SESSION['secretarray'][$j];
								array_walk($_SESSION['secretarray'], "mykelime");
							}
						}
					}
				}
*/
				?>

			</form>
		</div>

	</div>
</body>

</html>