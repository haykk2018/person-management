<x-part.header/>
<x-part.content>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/" method="post">
        @csrf
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input class="form-control" type="text" id="fname" name="fname" value="{{ old('fname') }}">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input class="form-control" type="text" id="lname" name="lname" value="{{ old('lname') }}">
        </div>
        <div class="mb-3">
            <label for="birth" class="form-label">Date of Birth</label>
            <input class="form-control" type="date" id="birth" name="birth" value="{{ old('birth') }}" pattern="\d{4}-\d{2}-\d{2}"
                   max="{{date('Y-m-d',strtotime('now +1 week'))}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Phone Number</label>
            <input class="form-control" type="tel" id="tel" name="tel" value="{{ old('tel') }}">
            </p>
        </div>
        <div class="mb-3">
            <label class="form-label">Favorite sports</label>
            <fieldset class="mt-2">
                @foreach($sports as $sport)
                    <input class="form-check-input" type="checkbox" id="{{$sport->id}}" name="sports[]"
                           value="{{$sport->id}}"
                           @if(is_array(old('sports')) and in_array($sport->id, old('sports'))) checked @endif>
                    <label class="form-check-label" for="{{$sport->name}}">{{$sport->name}}</label>
                @endforeach
            </fieldset>
        </div>
        <div class="mb-3">
            <input type="submit" value="Add" class="btn btn-primary">
        </div>
    </form>
</x-part.content>
<x-part.footer/>

