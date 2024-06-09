<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit A Book</h1>

    <div>

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form action="{{route('book.update', ['book' => $book])}}" method="post">
        @csrf
        @method('put')
        

        <div>
            <label for="">Title</label>
            <input type="text" name="title" placeholder="title" value="{{$book->title}}">
        </div>

        <div>
            <label for="">ISBN</label>
            <input type="text" name="isbn" placeholder="isbn" value="{{$book->isbn}}">
        </div>

        <div>
            <label for="">Writer</label>
            <input type="text" name="writer" placeholder="writer" value="{{$book->writer}}">
        </div>

        <div>
            <label for="">Published</label>
            <input type="text" name="year" placeholder="year" value="{{$book->year}}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>