<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Input Book</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
        <div>
        @if(Auth::user() && Auth::user()->role == 'admin')
            <a href="{{route('book.create')}}">Create A Product</a>
        @endif
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Writer</th>
                <th>Published</th>
                @if(Auth::user() && Auth::user()->role == 'admin')
                <th>Edit</th>
                <th>Delete</th>
                @endif
            </tr>
            @foreach($book as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->year}}</td>
                    @if(Auth::user() && Auth::user()->role == 'admin')
                    <td>
                        <a href="{{route('book.edit', ['book' => $book])}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('book.destroy', ['book' => $book])}}" method="post">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    <a href="/logout" class="nav-link"><p style="padding:20px">Log out</p></a>
    
</body>
</html>