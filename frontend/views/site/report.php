<?php
foreach($stores as $store){
    echo '<input class="filtr" type="checkbox" data-id="'.$store->id.'">&nbsp'.$store->name.'&nbsp&nbsp';
}
?>
<input id="data-info" type="datetime-local">
<button id="btn-info">Ko'rish</button>
<hr>
<p style="color: red; size: 20px" class="info"></p>