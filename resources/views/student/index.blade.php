@extends('app')
@section('content');

<div class="col-lg-7 mx-auto ">
    <a class="btn btn-primary" href="{{ route('student.create') }}">Add student</a>
        <h2 class="text-center text-success py-3">All Student</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Dept</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key=>$student)
                    <tr class="">
                        <td scope="row">{{ $key+1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->dept }}</td>
                        <td><a href="{{ route('student.edit',$student->id) }}"
                             data-id="{{ $student->id }}" class="delete_student btn btn-success">Edit</a></td>

                    <td>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
               </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>

@endsection
<script>
    $(document).ready(function() {
        $('.delete_student').click(function (e) {
            e.preventDefault();
            var product_id = $(this).data('id');;

            $.ajax({
                url:url,
                data:jQuery('#deleted').serialize(),
                type:'post',
                success:function(result){
                    alert('Student inserted');
                }
            });


        });

    });
</script>

