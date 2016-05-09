<html>
<head>
   <title>CCTV thumbnail viewer (BPG animation)</title>
   <script type="text/javascript" src="bpgdec8a.js"></script>
</head>
<body>
녹화 목록 : <select onChange='change_item()' id='bpgSelect'>
<?php
// array of files without directories... optionally filtered by extension
function file_list($d,$x) {
  foreach(array_diff(scandir($d),array('.','..')) as $f)if(is_file($d.'/'.$f)&&(($x)?ereg($x.'$',$f):1))$l[]=$f;
  return $l;
}

$list = file_list("./", "bpg");

foreach($list as $file) {
  printf("<option value=".$file.">".$file."</option>");
}
?>
</select>

<script>
var sel = document.getElementById("bpgSelect");

function change_item() {
  var item = sel.options[sel.selectedIndex].value;
  if(item) {
    var new_url = window.location.href;
    new_url = new_url.split("?")[0].split("#")[0];
    new_url += "?bpg="+item;
    window.location.href = new_url;
  }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
var foo = getParameterByName('bpg');
if(foo) {
  for (i=0; i<sel.length; i++) {
    if(sel.options[i].value.localeCompare(foo) == 0) {
      sel.options.selectedIndex = i;
      break;
    }
  }

  document.write("<hr><img src="+foo+">");
}
else {
  document.write("<hr><img src="+sel.options[sel.selectedIndex].value+">");
}
</script>
</body>

</html>
