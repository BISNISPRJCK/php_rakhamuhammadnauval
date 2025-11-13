<?php
$jml = $_GET['jml'];
echo "<table border=1 cellpadding=5 cellspacing=0>\n";

for ($a = $jml; $a > 0; $a--) {

  // 🔹 Hitung total nilai di baris ini
  $total = 0;
  for ($b = $a; $b > 0; $b--) {
    $total += $b;
  }

  // 🔹 Tampilkan total di baris atas
  echo "<tr><td colspan='$a' align='center'><b>Total: $total</b></td></tr>\n";

  // 🔹 Tampilkan baris angka
  echo "<tr>";
  for ($b = $a; $b > 0; $b--) {
    echo "<td>$b</td>";
  }
  echo "</tr>\n";
}

echo "</table>";
