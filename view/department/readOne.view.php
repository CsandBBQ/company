<?php

function department_readOne_view(array $data): string
{
    return "<label for='id'>ID: </label>
<p name='id'> {$data['id']}</p>
<br>
<label for='name'>Name: </label>
<p name='name'> {$data['name']}</p>
<br>
<label for='is_hiring'>Stellt ein? </label>
<p name='is_hiring'> {$data['is_hiring']}</p>
<br>
<label for='workmode'>Workmode: </label>
<p name='workmode'> {$data['workmode']}</p>
<br>
<label for='created_at'>Erstellt am: </label>
<p name='created_at'> {$data['created_at']}</p>
<br>
<label for='updated_at'>Bearbeitet am: </label>
<p name='updated_at'> {$data['updated_at']}</p>
<br>
<a href='update/{$data['id']}'>Update</a>
<a href='delete/{$data['id']}'>Delete</a>
</body>";
}