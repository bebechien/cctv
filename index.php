<html>
<head>
<title>CCTV thumbnail viewer</title>
</head>

<body>
  <table>
    <tr>
      <th>현관</th>
      <th>베란다</th>
      <th>옥상</th>
    </tr>

<?php
// array of files without directories... optionally filtered by extension
function file_list($d,$x) {
  foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f;
  return $l;
}

$list = file_list("./", "gif");
for($i = count($list)/3; $i >= 0; $i--) {
  printf("<tr>");
  printf("<td><img src=".$list[$i*3]."></td>");
  printf("<td><img src=".$list[$i*3+1]."></td>");
  printf("<td><img src=".$list[$i*3+2]."></td>");
  printf("</tr>");
  printf("<tr>");
  printf("<td>".$list[$i*3]."</td>");
  printf("<td>".$list[$i*3+1]."</td>");
  printf("<td>".$list[$i*3+2]."</td>");
  printf("</tr>");
}
?>

  </table>
</body>

</html>
