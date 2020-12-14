<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title') </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <style>
   body{
     background-image: url("https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1055&q=80");
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-size: cover;
     background-position: center;
   }
   h1{
     font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
   }
 </style>
  </head>

  <body>
   <div class="container-fluid">
    @yield('content')
   </div>
   <div class="modal" id="modalDelete" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="deleteModalBody"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!--JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  <script
      src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
    $(document).ready(function(){
        if( $('form.formdelete').length > 0 ){
            $('form.formdelete').on('submit',function(e){
                e.preventDefault();
                let delText = $(this).data('title');
                let url = $(this).attr('action');
                let data = $(this).serialize();
                let tr = $(this).closest('tr');

                $('#deleteModalBody').text( delText );
                $('#modalDelete').modal('show');

                $('#modalDelete .btn.btn-danger').on('click',function(){
                    $('#modalDelete').modal('hide');
                    $.ajax({
                      url: url,
                      method : 'delete',
                      data : data,
                      success : function(response){
                        console.log(response)
                          if( response.status == 200){
                              tr.remove();
                          }
                          else if( response.status == 480){
                            alert(response.msg);
                          }
                      },
                      error : function(xhr){
                        console.log( 'Fehler ' + xhr.status + ' ' + xhr.statusText );
                      }
                    });
                  
                });
            })
        }
    })
  </script>
  
  </body>
</html>