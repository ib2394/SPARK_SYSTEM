<?php 
	include '../../config/dbconn.php';
	session_start();
	## verify if the session user is admin
	if(isset($_SESSION['username']) && $_SESSION['username'] == "admin"){
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update</title>
</head>
<body>
    <div class="banner">
        <h1>Admin</h1>
        <div class="navbar">
            <img class="logo" src="../../pictures/logo.png" alt="Logo">
            <ul>
            <li><a href="../../pages/admin/adminupdate.php"><button type="button">UPDATE</button></a></li>
                <button type="button">REMOVE</button>
                <button type="../../pages/admin/search.php">SEARCH</button>
                <button type="button">VIEWING</button>
                <img class="image" src="../../pictures/home.png" alt="Home">
            </ul>
        </div>
        



        
    </div>
</body>
</html>

<?php
// assume $rows is an array of rows from the table

$search_query = $_GET['search_query']; // get the search query from the URL

$search_results = array();
foreach ($rows as $row) {
  if (
    (empty($search_query['studid']) || strpos($row['studid'], $search_query['studid']) !== false) &&
    (empty($search_query['size']) || $row['size'] == $search_query['size']) &&
    (empty($search_query['courname']) || strpos($row['courname'], $search_query['courname']) !== false)
  ) {
    $search_results[] = $row;
  }
}

// display the search results
echo '<table>';
echo '<tr><th>parcelid</th><th>courname</th><th>size</th><th>status</th><th>studid</th></tr>';
foreach ($search_results as $row) {
  echo '<tr>';
  echo '<td>' . $row['parcelid'] . '</td>';
  echo '<td>' . $row['courname'] . '</td>';
  echo '<td>' . $row['size'] . '</td>';
  echo '<td>' . $row['status'] . '</td>';
  echo '<td>' . $row['studid'] . '</td>';
  echo '</tr>';
}
echo '</table>';
