window.addEventListener('load', colorChange);

function colorChange() {
    var tableBorder = document.getElementById('restaurantTable');
    var color = document.getElementById('selectedColor').innerHTML;
    tableBorder.style.borderColor = "" + color;
}

