{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'updateAuthor','route' => 'admin-update-author','method'=>'post']) !!}
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
        <input type="hidden" name="id" value="{{$author->id}}">
	<label for="firstName">First Name</label>
        <input type="text" name="first_name" id="fistName" value="{{$author->first_name}}" placeholder="First Name" />
        <label for="lastName">Last Name</label>
        <input type="text" name="last_name" id="lastName" value="{{$author->last_name}}" placeholder="Last Name" />
        <label for="avatar">Imaage</label>
        <input type="file"  id="avatar" name="avatar"/>
	<img src="/images/authors/{{$author->id}}/{{$author->avatar}}" alt="{{$author->first_name}}" />
        <label for="description">Summery</label>
        <textarea name="description" id="description">{{$author->description}}</textarea>
        <input type="submit" value="Update" />
{{Form::close()}}
