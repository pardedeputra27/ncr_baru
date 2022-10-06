<!doctype html>
<html>
  <head>
    <title>How to Autocomplete textbox in CodeIgniter 3 with jQuery UI</title>

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  </head>
  <body>

  <h1>How to Autocomplete textbox in CodeIgniter 3 with jQuery UI</h1>

    Search User : <input type="text" id="nama">

    <br><br>
    Selected user id : <input type="text" id="nik">
    <br><br>
    Departemen : <input type="text" id="dept" >

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#nama" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>Autocomplete/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#nama').val(ui.item.label); // display the selected text
          $('#nik').val(ui.item.nik); // save selected id to input
          $('#dept').val(ui.item.dept); // save selected id to input
          return false;
        }
      });

    });
    </script>
  </body>
</html>