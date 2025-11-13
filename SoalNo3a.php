<?php
include 'koneksi.php';

// Ambil kata kunci pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query dasar dengan JOIN
$sql = "
  SELECT person.id, person.nama, person.alamat, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS hobi
  FROM person
  LEFT JOIN hobi ON person.id = hobi.person_id
";

// Jika ada pencarian
if ($search != '') {
  $search = $conn->real_escape_string($search);
  $sql .= " WHERE person.nama LIKE '%$search%' 
            OR person.alamat LIKE '%$search%' 
            OR hobi.hobi LIKE '%$search%'";
}

$sql .= " GROUP BY person.id ORDER BY person.id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>SOAL 3 - Daftar Person & Hobi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
    }

    table {
      border-collapse: collapse;
      width: 60%;
      margin-bottom: 20px;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    .search-box {
      border: 1px solid black;
      padding: 15px;
      width: 250px;
    }

    input[type="text"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      padding: 8px 20px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Daftar Person dan Hobinya</h2>

  <table>
    <tr>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Hobi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['nama']}</td>";
        echo "<td>{$row['alamat']}</td>";
        echo "<td>{$row['hobi']}</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='3'>Tidak ada data ditemukan</td></tr>";
    }
    ?>
  </table>

  <div class="search-box">
    <form method="GET" action="">
      <label>Nama :</label><br>
      <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"><br>
      <label>Alamat :</label><br>
      <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"><br>
      <input type="submit" value="SEARCH">
    </form>
  </div>

</body>

</html>