@extends('app')
@section('content');
<a class="btn btn-primary" href="{{ route('student.create') }}">Add student</a>
<div class="col-lg-7 mx-auto ">

        <h2 class="text-center text-success pb-3">All Student</h2>
        <input type="text" name="name" class="form-control" id="name" placeholder="Search">
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
                <tbody id="tbody">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function() {

        $('#name').on('keyup',function (e) {
            // e.preventDefault();
            var name = $(this).val();
            // alert(name)
            $.ajax({
                url:"{{ route('student.index') }}",
                type:'GET',
                data:{'name':name},
                success:function(data){
                    // console.log(students);
                   var students = data.students;
                   var html = '';
                   if(students.length >0){
                        for(let i =0; i<students.length;i++){

                            html +='<tr> \
                                <td>'+students[i]['name']+'</td>\
                                <td>'+students[i]['email']+'</td>\
                                </tr>';
                        }
                   }else{
                    html +='<td>Not student</td>';
                   }
                   $("#tbody").html(html);
                }
            });



        });

    });
</script>

@endsection
