<?php

function department_update_view(array $data): string

{
    return "<!doctype html>
<form action='' method='post'>
    <input type='text' name='name'  placeholder= 'department name' value='{$data['name']}'>
    <input type='hidden' name='id' value='{$data['id']}'>
    <label for='is_hiring'>Stellt ein?</label>
    <input type='checkbox' name='is_hiring' id='is_hiring' {$data['checked']}>
    <input type='radio' id = 'onsite' name='workmode' value='onsite'{$data['onsite']}
    <label for='onsite'>onsite</label>
    <input type='radio' id = 'hybrid' name='workmode' value='hybrid' {$data['hybrid']}
    <label for='hybrid'>hybrid</label>
    <input type='radio' id = 'remote' name='workmode' value='remote' {$data['remote']}
    <label for='remote'>remote</label>
    <input type='submit'>
</form>
</body>";
}