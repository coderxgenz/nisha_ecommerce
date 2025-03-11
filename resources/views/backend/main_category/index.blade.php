@extends('layouts/backend/main')
@section('main-section')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Main Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Main Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        
                          <div class="card-header"> 
                              <a href="{{ route('backend.main_category.create') }}" class="btn btn-success waves-effect waves-light" >Add New Category</a>
                            </div> 
                            
                            <div class="card-body">
                                
                                @if(count($main_categories) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach ($main_categories as $main_category) 
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $main_category->name ?? '' }}</td>
                                        <td>{{ $main_category->slug ?? '' }}</td>
                                        <td>
                                            <input type="checkbox" class="toggle-switch" id="switch_{{ $main_category->id }}" switch="bool" 
                                                data-id="{{ $main_category->id }}" {{ $main_category->is_active == 1 ? "checked":"" }} />
                                            <label for="switch_{{ $main_category->id }}" data-on-label="Active" data-off-label="Inactive"></label>
                                        </td>

                                        <td>{{ Carbon\Carbon::parse($main_category->created)->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('backend.main_category.edit', [$main_category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="javascript::void(0)" data-id="{{ $main_category->id }}" class="btn btn-danger btn-sm" id="delete_btn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $main_categories->links('pagination::bootstrap-5') }}
                            </div>
                            @else
                            <center> <h3>No Records Available</h3></center>
                            @endif 
                        </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Nisha Rajput Coaching.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Anil</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@section('javascript-section')
 
@if(Session::has('created'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('created') }}",
  icon: "success"
});
</script>
@elseif(Session::has('updated'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('updated') }}",
  icon: "success"
});
</script>
@elseif(Session::has('deleted'))
<script>
    Swal.fire({
  title: "Success!",
  text: "{{ Session::get('deleted') }}",
  icon: "success"
});
</script>
@endif

<script>
    $(document).on("click", "#delete_btn", function(){
        let id = $(this).data('id');
        let url = "{{ route('backend.main_category.destroy', [':id']) }}";
        url = url.replace(':id', id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this record?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }); 
</script>

<script>
   $(document).on('change', '.toggle-switch', async function(){
    const id = $(this).data('id'); 
    const url = "{{route('backend.main_category.update_status')}}";
    const is_active = $(this).prop('checked');
    const status = is_active ? 1 : 0;
    const csrf_token = $('meta[name="csrf-token"]').attr('content');

    Swal.fire({
        title: "Are you sure?",
        text: "You want to change status!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!"
    }).then(async (result) => {
        if (result.isConfirmed) {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf_token
                },
                body: JSON.stringify({
                    'id': id,
                    'status': status
                }),
            });

            if (response.ok) {
                Swal.fire({
                    title: "Success!",
                    text: "Status has been updated.",
                    icon: "success"
                });
            } else {
                alert('Something went wrong.');
            }
        } else {
            $(this).prop('checked', !is_active);
        }
    });
});

</script>
@endsection
@endsection