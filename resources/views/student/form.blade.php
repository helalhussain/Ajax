@extends('app')
@section('content')

    <div class="col-lg-6 mx-auto">
        <a class="btn btn-primary" href="{{ route('student.index') }}">All student</a>
        <h2 class="text-center text-success py-3">Add Student</h2>

        <x-form :action="isset($student) ? route('student.update', $student->id) : route('student.store')"
            :button="isset($student) ? 'Update' : 'Submit'">

            @isset($student)
                @method('PUT')
            @endisset

            <x-form-group label="name" :value="$student->name ?? ''" placeholder="Name" />
                <x-form-group label="dept" :value="$student->dept ?? ''" placeholder="Department"/>
                <x-form-group label="gender" isType="select">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </x-form-group>
        </x-form>

    </div>
@endsection

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
        $('#submit').click(function (e) {
            e.preventDefault();
            const url = $('#submit').attr('action');
            var data = jQuery('#submit').serialize();

            $.ajax({
                url:url,
                data:jQuery('#submit').serialize(),
                type:'post',
                success:function(result){
                    alert('Student inserted');
                }
            });


        });

    });
</script>
