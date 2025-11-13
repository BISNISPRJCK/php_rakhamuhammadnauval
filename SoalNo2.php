<?php
if (!isset($_POST['step'])) {
  $step = 1;
} else {
  $step = $_POST['step'];
}

$self = htmlspecialchars($_SERVER['PHP_SELF']); // otomatis arah ke file saat ini

echo "<h2>SOAL 2</h2>";

switch ($step) {
  case 1:
    echo "<h3>Tampilan 1</h3>";
    echo "<form method='POST' action='$self'>";
    echo "Masukkan nama: <input type='text' name='nama' required><br><br>";
    echo "<input type='hidden' name='step' value='2'>";
    echo "<input type='submit' value='Lanjut'>";
    echo "</form>";
    break;

  case 2:
    $nama = $_POST['nama'];
    echo "<h3>Tampilan 2</h3>";
    echo "Nama: <b>$nama</b><br><br>";
    echo "<form method='POST' action='$self'>";
    echo "Masukkan umur: <input type='number' name='umur' required><br><br>";
    echo "<input type='hidden' name='nama' value='$nama'>";
    echo "<input type='hidden' name='step' value='3'>";
    echo "<input type='submit' value='Lanjut'>";
    echo "</form>";
    break;

  case 3:
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    if (isset($_POST['hobi'])) {
      $hobi = $_POST['hobi'];

      echo "<h3>Hasil Akhir</h3>";
      echo "<table border='1' cellpadding='5'>";
      echo "<tr><th>Nama</th><th>Umur</th><th>Hobi</th></tr>";
      echo "<tr><td>$nama</td><td>$umur</td><td>$hobi</td></tr>";
      echo "</table><br>";
      echo "<a href='$self'>Mulai Lagi</a>";
    } else {
      echo "<h3>Tampilan 3</h3>";
      echo "Nama: <b>$nama</b><br>";
      echo "Umur: <b>$umur</b><br><br>";
      echo "<form method='POST' action='$self'>";
      echo "Masukkan hobi: <input type='text' name='hobi' required><br><br>";
      echo "<input type='hidden' name='nama' value='$nama'>";
      echo "<input type='hidden' name='umur' value='$umur'>";
      echo "<input type='hidden' name='step' value='3'>";
      echo "<input type='submit' value='Submit'>";
      echo "</form>";
    }
    break;
}
