{!! Form::open(['enctype'=>'multipart/form-data', 'name'=>'createTrainer','route' => 'admin-update-category','method'=>'post']) !!}
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
        <input type="hidden" name="id" value="{{$category->id}}">
	<label for="name">First Name</label>
        <input type="text" name="name" id="name" value="{{$category->name}}" placeholder="Name" />
        <label for="description">Summery</label>
        <textarea name="description" id="description">{{$category->description}}</textarea>
        <input type="submit" value="Update" />
{!! Form::close() !!}
