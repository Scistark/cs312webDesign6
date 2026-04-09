<?php
echo "<h2>Color Selection</h2><div id='w' style='color:red;height:20px'></div><table class='color-table'>";
for ($i = 0; $i < $num_colors; $i++) {
    echo "<tr><td><select class='color-dropdown'>"; 
    foreach ($color_options as $index => $name) {
        $s = ($i == $index) ? "selected" : "";
        echo "<option value='$name' $s>$name</option>";
    }
    echo "</select></td><td></td></tr>";
}
echo "</table>";
?>

<script>
const drops = document.querySelectorAll('.color-dropdown'), warn = document.getElementById('w');
drops.forEach(d => {
    d.addEventListener('focus', () => d.old = d.value);
    d.addEventListener('change', () => {
        if ([...drops].some(o => o !== d && o.value === d.value)) {
            d.value = d.old;
            warn.textContent = "no duplicate colors";
        } else {
            d.old = d.value;
            warn.textContent = "";
        }
    });
});
</script>