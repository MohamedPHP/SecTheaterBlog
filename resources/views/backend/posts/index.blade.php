@extends('backend.layout.app')


@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$title}}</h3>
            </div>
            <div class="box-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Keywords</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>User</th>
                      <th>Creation Date</th>
                      <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($index as $i)
                          <tr>
                              <td>{{ $i->title }}</td>
                              <td>{{ $i->keywords }}</td>
                              <td>{{ $i->category->title }}</td>
                              <td>{{ $i->showTags() }}</td>
                              <td>{{ $i->user->name }}</td>
                              <td>{{ $i->created_at }}</td>
                              <td>
                                  <a href="{{ route('posts.show', [$i->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              </td>
                              <td>
                                  <a href="{{ route('posts.edit', [$i->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                              </td>
                              <td>
                                  <form action="{{ route('posts.destroy', [$i->id]) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>


@endsection
