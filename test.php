<select id="gravity" onchange="changeGravity()">
  <option value=".1">Low</option>
  <option value=".2">High</option>
</select>

<p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

<p id="demo"></p>

<script>
function changeGravity() {
  var x = document.getElementById("gravity").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
