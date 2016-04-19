<?php
	echo "<pre>"; print_r($trainer); echo "</pre>";	
?>

<form enctype="multipart/form-data" name="createTrainer" action="/admin/trainers/update" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$trainer->id}}">
	<label for="firstName">First Name</label>
        <input type="text" name="first_name" id="fistName" value="{{$trainer->first_name}}" placeholder="First Name" />
        <label for="lastName">Last Name</label>
        <input type="text" name="last_name" id="lastName" value="{{$trainer->last_name}}" placeholder="Last Name" />
        <label for="avatar">Imaage</label>
        <input type="file"  id="avator" name="avatar"/>
	<img src="{{$trainer->avatar}}" alt="{{$trainer->first_name}}" />
        <label for="description">Summery</label>
        <textarea name="description" id="description">{{$trainer->description}}</textarea>
        <input type="submit" value="Update" />
</form>
