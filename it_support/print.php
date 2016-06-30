<script>
    window.print();
</script>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:8px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:8px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-7uzy{vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-p96l{font-weight:bold;font-size:15px;vertical-align:top}
.tg .tg-zul5{font-weight:bold;font-size:28px;text-align:center;border:0}
.tg .tg-zul51{font-weight:bold;font-size:18px;text-align:center;}
.tg .tg-mwni{font-weight:bold;font-size:28px;text-align:center;border:0}
.tg .tg-yw4l{vertical-align:top;}
.tg .tg-9hbo{font-weight:bold;vertical-align:top}
.tg .tg-dx8v{font-size:12px;vertical-align:top}
.tg .tg-fbrz{font-weight:bold;font-size:20px;text-align:center;vertical-align:top}
th.tg-sort-header::-moz-selection { background:transparent; }th.tg-sort-header::selection      { background:transparent; }th.tg-sort-header { cursor:pointer; }table th.tg-sort-header:after {  content:'';  float:right;  margin-top:7px;  border-width:0 4px 4px;  border-style:solid;  border-color:#404040 transparent;  visibility:hidden;  }table th.tg-sort-header:hover:after {  visibility:visible;  }table th.tg-sort-desc:after,table th.tg-sort-asc:after,table th.tg-sort-asc:hover:after {  visibility:visible;  opacity:0.4;  }table th.tg-sort-desc:after {  border-bottom:none;  border-width:4px 4px 0;  }@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
</style>
<?php 
include "koneksi.php"; 
$sql = mysql_query ("select sheet_em.id, sheet_em.title, sheet_em.date1, sheet_em.gambar1, sheet_em.keterangan1, sheet_em.date2, sheet_em.gambar2, sheet_em.keterangan2, sheet_em.status, sheet_em.verify, sheet_em.effects, sheet_em.location, user_em.nama from sheet_em, user_em where sheet_em.pic=user_em.id and sheet_em.id='$_GET[id]'");
$data = mysql_fetch_array($sql);
$tahun = $data['date1'];
$thn = substr($tahun,0,4)
?>

<div class="tg-wrap">
<table id="tg-wpd5N" class="tg" style="undefined;table-layout: fixed; width: 946px">
<colgroup>
<col style="width: 102px">
<col style="width: 384px">
<col style="width: 119px">
<col style="width: 227px">
<col style="width: 114px">
</colgroup>
  <tr>
    <th class="tg-zul5" border="0" colspan="4">PAMIT SUPPORT SHEET</th>
    
  </tr>
  <tr>
    <td class="tg-zul51" colspan="5">IT SUPPORT</td>
  </tr>
  <tr>
    <td class="tg-9hbo">ID PEKERJAAN :</td>
    <td class="tg-7uzy"><?php echo $data['id'] ; 
							  echo "-";
							  echo $thn;	?></td>
    <td class="tg-9hbo">JUDUL :</td>
    <td class="tg-7uzy" colspan="2"><?php echo $data['title']; ?></td>
  </tr>
  <tr>
    <td class="tg-9hbo">LOKASI</td>
    <td class="tg-7uzy"><?php echo $data['location']; ?></td>
    <td class="tg-9hbo">PIC</td>
    <td class="tg-7uzy" colspan="2"><?php echo $data['nama']; ?></td>
  </tr>
  <tr>
    <td class="tg-dx8v" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-fbrz" colspan="2">SEBELUM</td>
    <td class="tg-fbrz" colspan="3">SESUDAH</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Tanggal</td>
    <td class="tg-7uzy"><?php echo $data['date1']; ?></td>
    <td class="tg-yw4l">Tanggal</td>
    <td class="tg-7uzy" colspan="2"><?php echo $data['date2']; ?></td>
  </tr>
  <tr>
	<?php 
		if(!empty($data['gambar1']))
		{
			echo "<td class='tg-fbrz' colspan='2'> <p><img src='gambar1/$data[gambar1]' align='center' width='300px' height='200px'/></p></td>";
		}
			else 
		{
			echo "<td class='tg-fbrz' colspan='2'> <p><img src='gambar2/No_Image_Available.png' align='center' width='300px' height='200px'/></p></td>";
		}
	?>
	
	<?php 
		if(!empty($data['gambar2']))
		{
			echo "<td class='tg-fbrz' colspan='3'> <p><img src='gambar2/$data[gambar2]' align='center' width='300px' height='200px'/></p></td>";
		}
			else 
		{
			echo "<td class='tg-fbrz' colspan='3'> <p><img src='gambar2/No_Image_Available.png' align='center' width='300px' height='200px'/></p> ";
		}
	?>
    <!--td class="tg-fbrz" colspan="2"><php echo"<p><img src='gambar1/".$data['gambar1']."' align='center' width='300px' height='200px'/></p>"; ?></td-->
    <!--td class="tg-fbrz" colspan="3"><php echo"<p><img src='gambar2/".$data['gambar2']."' align='center' width='300px' height='200px'/></p>"; ?></td-->
  </tr>
  <tr>
    <td class="tg-p96l" colspan="2">Kerusakan :</td>
    <td class="tg-p96l" colspan="3">Efek : 
	<!--?php echo $data['effects'] ; ?> <br-->
	<?php 
	$effects=explode(", ",$data["effects"]);
	?>										
											<label class="checkbox-inline">
											<input type="checkbox" name=effects[]  value='Lambat' 
											<?php 
											if(in_array('Lambat', $effects))
											{
											echo "checked=checked />";
											echo "<span style='color: blue;'>Lambat</span>";
											}
											else {
											echo "<span style='color: black;'>Lambat</span>";	
											} 
											?>
											</label>
											
											<label class="checkbox-inline">
											<input type="checkbox" name=effects[]  value='Rusak' 
											<?php 
											if(in_array('Rusak', $effects))
											{
											echo "checked=checked />";
											echo "<span style='color: blue;'>Rusak</span>";
											}
											else {
											echo "<span style='color: black;'>Rusak</span>";	
											} 
											?>
											</label>
											
											<label class="checkbox-inline">
											<input type="checkbox" name=effects[]  value='Penggantian' 
											<?php 
											if(in_array('Penggantian', $effects))
											{
											echo "checked=checked />";
											echo "<span style='color: blue;'>Penggantian</span>";
											}
											else {
											echo "<span style='color: black;'>Penggantian</span>";	
											} 
											?>
											</label>
											
	</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="2"><?php echo $data['keterangan1'] ; ?></td>
    <td class="tg-yw4l" colspan="3"><?php echo $data['keterangan2'] ; ?></td>
  </tr>
</table></div>
<script type="text/javascript" charset="utf-8">var TgTableSort=window.TgTableSort||function(n,t){"use strict";function r(n,t){for(var e=[],o=n.childNodes,i=0;i<o.length;++i){var u=o[i];if("."==t.substring(0,1)){var a=t.substring(1);f(u,a)&&e.push(u)}else u.nodeName.toLowerCase()==t&&e.push(u);var c=r(u,t);e=e.concat(c)}return e}function e(n,t){var e=[],o=r(n,"tr");return o.forEach(function(n){var o=r(n,"td");t>=0&&t<o.length&&e.push(o[t])}),e}function o(n){return n.textContent||n.innerText||""}function i(n){return n.innerHTML||""}function u(n,t){var r=e(n,t);return r.map(o)}function a(n,t){var r=e(n,t);return r.map(i)}function c(n){var t=n.className||"";return t.match(/\S+/g)||[]}function f(n,t){return-1!=c(n).indexOf(t)}function s(n,t){f(n,t)||(n.className+=" "+t)}function d(n,t){if(f(n,t)){var r=c(n),e=r.indexOf(t);r.splice(e,1),n.className=r.join(" ")}}function v(n){d(n,L),d(n,E)}function l(n,t,e){r(n,"."+E).map(v),r(n,"."+L).map(v),e==T?s(t,E):s(t,L)}function g(n){return function(t,r){var e=n*t.str.localeCompare(r.str);return 0==e&&(e=t.index-r.index),e}}function h(n){return function(t,r){var e=+t.str,o=+r.str;return e==o?t.index-r.index:n*(e-o)}}function m(n,t,r){var e=u(n,t),o=e.map(function(n,t){return{str:n,index:t}}),i=e&&-1==e.map(isNaN).indexOf(!0),a=i?h(r):g(r);return o.sort(a),o.map(function(n){return n.index})}function p(n,t,r,o){for(var i=f(o,E)?N:T,u=m(n,r,i),c=0;t>c;++c){var s=e(n,c),d=a(n,c);s.forEach(function(n,t){n.innerHTML=d[u[t]]})}l(n,o,i)}function x(n,t){var r=t.length;t.forEach(function(t,e){t.addEventListener("click",function(){p(n,r,e,t)}),s(t,"tg-sort-header")})}var T=1,N=-1,E="tg-sort-asc",L="tg-sort-desc";return function(t){var e=n.getElementById(t),o=r(e,"tr"),i=o.length>0?r(o[0],"td"):[];0==i.length&&(i=r(o[0],"th"));for(var u=1;u<o.length;++u){var a=r(o[u],"td");if(a.length!=i.length)return}x(e,i)}}(document);document.addEventListener("DOMContentLoaded",function(n){TgTableSort("tg-wpd5N")});</script>