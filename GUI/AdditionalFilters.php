<!--This GUI develops the additional filters box which gives user the option
to choose their restaurant choosing based on ratings and distance. 

authors @ Taylor
-->
<?php ?>

<link rel="stylesheet" type="text/css" href="Styles/filterSubmit.css">
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    
    function submitBoth(){
        document.getElementById("checkboxForm").submit();
        //document.getElementById("filterForm").submit();
    }
</script>

<div  id="myForm">
    <form action="SubmitRestaurantRequest.php" class="form-container" method="post" id="filterForm">
        <h5><right>Additional Filters</right></h5>
        <h6><right>Feel free to fine tune your results!</right></h6>

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
  
        <button type="button" class="btn" onclick ="submitBoth()">Go!</button>
    </form>
</div>
