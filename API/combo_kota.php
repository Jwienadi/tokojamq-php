
<script language='javascript'>

function showKab()

{

<?php

/*// membaca semua propinsi

$query = “SELECT * FROM provinsi ORDER BY id ASC”;

$hasil = mysql_query($query);*/

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysql_fetch_array($hasil))

{

$prov = $data[‘id’];

// membuat IF untuk masing-masing propinsi

echo “if (document.form1.state.value == \””.$prov.”\”)”;

echo “{“;

// membuat option kota untuk masing-masing propinsi

$query2 = “SELECT * FROM kota WHERE id_prov = ‘$prov’ ORDER BY id_kota ASC”;

$hasil2 = mysql_query($query2);

$content = “document.getElementById(‘kot’).innerHTML = \””;

while ($data2 = mysql_fetch_array($hasil2))

{

$content .= “<option value='”.$data2[‘id_kota’].”‘>”.$data2[‘kota’].”</option>”;

}

$content .= “\””;

echo $content;

echo “}\n”;

}

?>

}

</script>