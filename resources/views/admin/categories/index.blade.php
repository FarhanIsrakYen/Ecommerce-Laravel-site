@extends('admin.partials.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Product
        </div>
        <div class="card-body">
            @include('admin.partials.messages')
          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Category Image</th>
              <th>Parent Category</th>
              <th>Action</th>
            </tr>

            @foreach ($categories as $category)
              <tr>
                <td>#</td>
                <td>{{ $category->name }}</td>
                <td>
                  <img src="{!! asset('images/categories/'.$category->image) !!}" width="100">
                </td>
                <td>
                  @if ($category->parent_id == NULL)
                    Primary Category
                  @else
                    {{ $category->parent->name }}
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $category->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.category.delete', $category->id) !!}"  method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
