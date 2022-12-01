<x-part.header/>
<x-part.content>
    <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input class="form-control" name="fname" id="fname" value="{{$person->fname}}" type="text" readonly/>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input class="form-control" name="lname" id="lname" value="{{$person->lname}}" type="text" readonly/>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input class="form-control" name="email" id="email" value="{{$person->email}}" type="text" readonly/>
    </div>
    <div class="mb-3">
        <label for="birth" class="form-label">Date of Birth</label>
        <input class="form-control" name="birth" id="birth" value="{{$person->birth}}" type="date" readonly/>
    </div>
    <div class="mb-3">
        <label for="tel" class="form-label">Phone Number</label>
        <input class="form-control" name="tel" id="tel" value="{{$person->tel}}" type="text" readonly/>
    </div>

    <div class="mb-3">
        <label class="form-label">Favorite sports</label>
        <fieldset class="mt-2">
            @foreach($person->sports as $sport)
                <input class="form-check-input" type="checkbox" id="{{$sport->id}}" name="sports[]"
                       value="{{$sport->id}}" checked disabled>
                <label for="{{$sport->name}}">{{$sport->name}}</label>
            @endforeach
        </fieldset>
    </div>
</x-part.content>
</body>
</html>

