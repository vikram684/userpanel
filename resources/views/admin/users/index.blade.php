@extends('template.main')

@section('content')
<div class="row">
    <div class="col-12 mt-3 mb-3">
        <a class="btn btn-sm btn-success float-right" href="{{ route('admin.users.create')}}">Create New User</a>
    </div>

    <div class="ml-2 col-3 bg-primary mb-3" style="padding: 30px !important;">
        <h2 style="color:white">Total Users</h2>
        <h3 style="color:azure" id="total">{{$activeCount + $inactiveCount}}</h3>
    </div>

    <div class="col-3 bg-info mb-3 ml-2" style="padding: 30px !important;">
        <h2 style="color:white">Active Users</h2>
        <h3 style="color:azure" id="activeCount">{{$activeCount}}</h3>
    </div>

    <div class="ml-2 col-3 bg-danger mb-3" style="padding: 30px !important;">
        <h2 style="color:white">InActive Users</h2>
        <h3 style="color:azure" id="inactiveCount">{{$inactiveCount}}</h3>
    </div>

</div>
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th>Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row" data-user-id="{{ $user->id }}">{{ ++$key}}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>

                    @if ($user->roles[0]['name'] == 'User')
                    <select name="status" id="status" class="form-control">
                        <option value="active" {{ $user->status == 'active' ? 'selected' : ''}}>Active</option>
                        <option value="deactive" {{ $user->status == 'deactive' ? 'selected' : ''}}>Inactive</option>
                    </select>
                    @else
                    <h6>Admin Status Cannot Change</h6>
                    @endif
                <td>
                    <button class='btn btn-sm btn-info text-light viewdetails' data-id='{{ $user->id }}'>View</button>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit',$user->id)}}">Edit</a>
                    <button class="btn btn-sm btn-danger" type="button" onclick="event.preventDefault();
                        document.getElementById('delete-user-form-{{$user->id}}').submit()">Delete</button>
                    <form id="delete-user-form-{{ $user->id}}" action="{{ route('admin.users.destroy',$user->id) }}"
                        method="POST" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    @can('is-admin')
    <div class="mt-2 mb-2">
        {{$users->links()}}
    </div>
    @endcan

    <!-- Modal -->
    <div class="modal fade" id="empModal">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">ID : <span id="userId"></span></h3>
                            <h6 class="card-title">Name : <span id="userName"></span></h3>
                            <h6 class="card-title">Email : <span id="userEmail"></span></h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal end --}}


</div>
<script>
        $(document).ready(function(){

            $('select[name="status"]').on('change',function(){
                var status = $(this).val();
                var user_id = $(this).parent().parent().find('th').data('user-id');
                $.ajax({
                    url: "{{ route('admin.users.updateStatus') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status,
                        user_id: user_id
                    },
                    success: function(response){
                        if(response.messaege == 'success'){
                            if(status == 'active'){
                                $('#activeCount').text(activeCount);
                                $('#inactiveCount').text(inactiveCount);
                                $('#total').text(activeCount + inactiveCount);
                            }
                        }
                    }
                });
            });


            $('.viewdetails').on('click',function(){
                var empid = $(this).attr('data-id');
                if(empid > 0){
                    var url = "{{ route('admin.users.show',[':empid']) }}";
                    url = url.replace(':empid',empid);
                    $('#tblempinfo tbody').empty();

                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(response){
                            $('#userId').text('USR#'+response.user.id);
                            $('#userName').text(response.user.name);
                            $('#userEmail').text(response.user.email);
                            $('#empModal').modal('show');

                        }
                    });
                }
            });


        });
</script>
@endsection
