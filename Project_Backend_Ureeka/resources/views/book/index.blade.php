<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <a href="{{route('book.create')}}">Create A Product</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Writer</th>
                <th>Published</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($book as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->year}}</td>
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
                </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>