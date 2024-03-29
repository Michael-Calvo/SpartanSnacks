<!-- This file displays the additional filters box which gives users the option to
choose their restaurant choosing based on ratings and distance.

author @ Isaac Taylor
Updated: 10/23/2019
-->
<link rel="stylesheet" type="text/css" href="Styles/FilterSubmit.css">

<div  class="form-container">
    <h5><center>Additional Filters</center></h5>
    <h6><center>Feel free to fine tune your results!</center></h6>

    <label for="rating"><b>By Rating:</b></label>
    <select  name = selectRating>
        <option value="Any Rating">Any Rating</option>
        <option value="5/5 only">5/5 only</option>
        <option value="4/5 or better">4/5 or better</option>
        <option value="3/5 or better">3/5 or better</option>
        <option value="2/5 or better">2/5 or better</option>
    </select><br><br>

    <label for="selectedColor"><b>Choose a color that best represents<br> your current mood</b></label>
    <select  name = "selectedColor" id = "selectedColor" >
        <option default > --None-- </option>
        <option value="Red">Red</option>
        <option value="Orange">Orange</option>
        <option value="Yellow">Yellow</option>
        <option value="Green">Green</option>
        <option value="Blue">Blue</option>
    </select>

    <button  type="submit" class="btn">Go!</button>
</div>
