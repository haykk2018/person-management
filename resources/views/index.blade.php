<x-part.header/>
<x-part.main-content>
    <table class="table table-striped table-responsive-sm caption-top">
        <caption>List of users</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Email Address</th>
            <th scope="col">Phone Numbers</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $index=>$person)
            <tr>
                <th scope="row">{{$index}}</th>
                <td>{{$person->fname}}</td>
                <td>{{$person->lname}}</td>
                <td>{{\Carbon\Carbon::parse($person->birth)->format('d/m/Y')}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->tel}}</td>
                <td><a href="/view/{{$person->id}}/">
                        <i class="bi bi-eye"></i>
                    </a></td>
                <td><a href="/edit/{{$person->id}}/">
                        <i class="bi bi-pencil-square"></i>
                    </a></td>
                <td>
                    <form action="delete/{{$person->id}}" method="POST" enctype="multipart/form-data"
                          id="{{$person->id}}">
                        @method('DELETE')
                        @csrf
                        <a type="submit" href="#" onclick="defineForm({{$person->id}})" class="link-primary"
                           data-bs-toggle="modal" data-bs-target="#confirmModal">
                            <i class="bi bi-file-earmark-x"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-part.main-content>
</body>
</html>
