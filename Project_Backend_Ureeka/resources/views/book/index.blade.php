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
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Writer</th>
                <th>Published</th>
            </tr>
            @foreach($book as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->year}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>