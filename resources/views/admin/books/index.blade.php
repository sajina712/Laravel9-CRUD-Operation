<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel CRUD Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Books Listing</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Add Books</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
          
                <tr>
                    <th>S.No</th>
                    <th>Books Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->books_title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->image }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->status }}</td>
                        <td>
                            <form action="{{ route('books.destroy',$book->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $books->links() !!}
    </div>
</body>
</html>