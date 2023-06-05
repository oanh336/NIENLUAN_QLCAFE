<?php
include_once '../condb/condb.php';
$key = $_POST['id'];
$sql = "select * from ban where KV_MA='$key'";
$query = mysqli_query($conn, $sql);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($row = mysqli_fetch_array($query)) {


?>
        <option value="<?php echo $row["B_MA"]?>" name="ban" id="ban"><?php echo $row["B_TEN"]?></option>
<?php
    }
}
?>