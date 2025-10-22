<?php

function department_create_view(array $data = []): string
{ return "<form action='' method='post'>
    <input type='text' name='name' placeholder='department_name'>
    <label for='is_hiring'> Stellt ein:</label>
    <input type='checkbox' id = 'is_hiring' name='is_hiring'>
    <input type='radio' id = 'onsite' name='workmode' value='onsite' checked>
    <label for='onsite'>onsite</label>
    <input type='radio' id = 'hybrid' name='workmode' value='hybrid'>
    <label for='hybrid'>hybrid</label>
    <input type='radio' id = 'remote' name='workmode' value='remote'>
    <label for='remote'>remote</label>
    <input type='submit'>
</form>";

}