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
    <form action="/{{$person->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input class="form-control" name="fname" id="fname" value="{{$person->fname}}" type="text"/>
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input class="form-control" name="lname" id="lname" value="{{$person->lname}}" type="text"/>
        </div>
        <div class="mb-3">
            <label for="birth" class="form-label">Date of Birth</label>
            <input class="form-control" name="birth" id="birth" value="{{$person->birth}}" type="date"
                   max="{{date('Y-m-d',strtotime('now +1 week'))}}"/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input class="form-control" name="email" id="email" value="{{$person->email}}" type="text"/>
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Phone Number</label>
            <input class="form-control" name="tel" id="tel" value="{{$person->tel}}" type="text"/>
        </div>
        <div class="mb-3">
            <label class="form-label">Favorite sports</label>
            <fieldset class="mt-2">
                @foreach($sports as $sport)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{$sport->id}}" name="sports[]"
                               value="{{$sport->id}}"
                               @if($person->sports->contains($sport)) checked @endif>
                        <label class="form-check-label" for="{{$sport->name}}">{{$sport->name}}</label>
                    </div>
                @endforeach
            </fieldset>
        </div>
        <div class="mb-3">
            <P>
                <button class="btn btn-primary" type="submit">save</button>
            </P>
        </div>
    </form>
</x-part.content>
<x-part.footer/>
