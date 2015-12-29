<?php 
$query = "SELECT * FROM dprocner";
$result = mysql_query($query);

// Count the total records
$total_records = mysql_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = 33; //ceil($total_records / $per_page);

//Going to first page
echo "<center><ul class=\"pagination\"><li><a href='allschools.php?page=1'>".'First Page'."</a> </li>";

for ($i=1; $i<=$total_pages; $i++) {

echo "<li><a href='allschools.php?page=".$i."'>".$i."</a></li> ";
};
// Going to last page
echo "<li><a href='allschools.php?page=$total_pages'>".'Last Page'."</a></li></ul></center> ";

 ?>