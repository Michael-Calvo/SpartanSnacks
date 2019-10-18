<?php ?>

<link rel="stylesheet" type="text/css" href="Styles/filterSubmit.css">
<div  id="myForm">
    <form action="SubmitRestaurantRequest.php" class="form-container" method="post" id="filterForm">
        <h5><center>Additional Filters</center></h5>
        <h6><center>Feel free to fine tune your results!</center></h6>

        <label for="rating"><b>By Rating:</b></label>
        <select >
            <option value="all">Any Rating</option>
            <option value="five">5/5 only</option>
            <option value="four">4/5 or better</option>
            <option value="three">3/5 or better</option>
            <option value="two">2/5 or better</option>
            <option value="one">1/5 or better</option>
        </select><br><br>

        <label for="distance"><b>By Distance:</b></label>
        <select>
            <option value="all">Any Distance</option>
            <option value="five">Within 5 miles</option>
            <option value="four">Within 10 miles</option>
            <option value="three">Within 15 miles</option>
        </select>

        <button type="submit" class="btn" onclick="submitForms()">Go!</button>
        <button type="button" class="btn cancel" >Extra Button</button>
    </form>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    document.getElementById("submit").onclick = function () {
        document.getElementById("checkboxForm").submit();
        document.getElementById("filterForm").submit();
    }
</script>
