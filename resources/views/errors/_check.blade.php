@if($errors->any())
    <ul class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif