@extends('layouts/backend/main')
@section('main-section')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sub Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>
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
                            <a href="{{ route('backend.sub_category.create') }}" class="btn btn-success waves-effect waves-light" >Add Sub Category</a>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            
                            @if(count($sub_categories) > 0)
                            
                        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sub Category</th>
                        <th>Parent Category</th>
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
                    @foreach($sub_categories as $sub_category)
                        
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $sub_category->name ?? '' }}</td>
                        <td>{{ $sub_category->getMainCategory?->name ?? '' }}</td>
                        <td>{{ $sub_category->slug ?? '' }}</td>
                         
                        <td><input type="checkbox" id="switch_{{ $sub_category->id }}" class="toggle-switch" switch="bool" 
                        data-id="{{ $sub_category->id }}" {{ $sub_category->is_active == 1 ? "checked":"" }}  />
                            <label for="switch_{{ $sub_category->id }}" data-on-label="Active" data-off-label="Inactive"></label>
                        </td>


                        <td>{{ Carbon\Carbon::parse($sub_category->created_at)->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('backend.sub_category.edit', [$sub_category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-id="{{ $sub_category->id }}" id="delete_btn">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="">
                {{ $sub_categories->links('pagination::bootstrap-5') }}
            </div>
            @else
            <center><h3>No Records Available</h3></center>
            @endif
                            
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

            

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


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
        let url = "{{ route('backend.sub_category.destroy', [':id']) }}";
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
            const url = "{{route('backend.sub_category.update_status')}}";
            const is_active = $(this).prop('checked');
            const status = is_active ? 1:0;
            const csrf_token = $('meta[name="csrf-token"]').attr('content');
          
            Swal.fire({
               title: "Are you sure?",
               text: "You want to change status!",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Yes, change it!"
           }).then(async (result) =>{
                if(result.isConfirmed){
                    const response = await fetch(url, {
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json',
                            'X-CSRF-TOKEN': csrf_token
                        },
                        body:JSON.stringify({
                            'id':id,
                            'status':status
                        }),
                    }); 
                    if(response.ok){
                        Swal.fire({
                            title: "Success!",
                            text: "Status has been updated.",
                            icon: "success"
                        });
                    }else{
                        alert('something went wrong.');
                    }
                }else if(result.isDismissed){
                    $(this).prop('checked', !is_active);
                }
             
           });
       });
</script>
@endsection
@endsection