<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


    <div class="col-lg-5 mx-auto">

        <h2 class="text-center text-success my-3">Laravel AJAX CRUD</h2>
        <form id="my-form" >
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
              <small id="emailHelpId" class="form-text text-muted"></small>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose file</label>
              <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId">
              <div id="fileHelpId" class="form-text"></div>
            </div>
            <input type="submit"  id="myBtn" class="btn btn-dark" value="SUBMIT" />

        </form>
        <span id="output"></span>
    </div>

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
    $(document).ready(function(){
        $('#my-form').submit(function(event){
            event.preventDefault();
           var form = $('#my-form')[0];
           var data = new FormData(form);

           $('#myBtn').prop('disabled',true);

           $.ajax({
                type:"POST",
                url:"{{ route('store') }}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                    $('#output').text(data.res);
                    $('#myBtn').prop('disabled',false);

                },error:function(e){
                    $('#output').text(e.responseText);
                    $('#myBtn').prop('disabled',false);
                }
           });

        });

    });
</script>





  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
