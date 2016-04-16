<form enctype="multipart/form-data" name="createTrainer" action="/admin/trainers/store" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<label for="firstName">First Name</label>
	<input type="text" name="first_name" id="fistName" value="" placeholder="First Name" />
	<label for="lastName">Last Name</label>
	<input type="text" nam="last_name" id="lastName" value="" placeholder="Last Name" />
	<label for="avatar">Imaage</label>
	<input type="file"  id="avator" name="avator"/>
	<label for="description">Summery</label>
	<textarea name="description" id="description"></textarea>
	<input type="submit" value="Create" />
</form>
