<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parça Serviços Financeiros </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .ui-autocomplete-loading { background:url(http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/images/ui-anim_basic_16x16.gif) no-repeat right center }
      .ui-autocomplete
      {
          position:absolute;
          cursor:default;
          z-index:1001 !important
      }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src='https://meuparca.com/images/logo.png' style='width:140px;height:50px'></a>
        </nav>
      </header>
      
      <main>
      
        @yield('content')
      
        <!-- FOOTER -->
        <footer class="container">
          <p>&copy; {{ date('Y') }} Parca Serviços Financeiros </p>
        </footer>
      </main>
      
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    
    
    <script type="text/javascript">
  
      
      $(document).ready(function(){
  
             
             $( "#cidade, #cidade1" ).autocomplete({
               source: function(request, response) {
                        $.ajax({
                        url: "{{url('autocomplete')}}",
                        data: {
                                term : request.term
                        },
                        dataType: "json",
                        success: function(data){
                          response(data);
                        }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                  var idd = $(this).attr("id");
                  $("#id"+idd).val(ui.item.id);
                }
            });
 

            $(".fases").css("color","white");

            $(document).on( "click", ".b1", function() {
                var f = $(this).attr("p");
                var s = $(this).attr("s");
                var e = $(this).attr("e");
                if (e!=1) {
                $("#cabeform").hide();
                } else { 
                  $("#cabeform").show();  
                }

                $(".forms").hide();
                $(".fases").removeClass("bg-primary").removeClass("bg-sucess").addClass('bg-secondary');
                $("#eform"+e).removeClass("bg-secondary").addClass('bg-primary');
                $("#"+f).slideDown("slow");
            });

            $(document).on( "click", "#enviando", function() {
               if (window.confirm("Confirma os dados?")) {
                  $("#fcred").hide();
                  $("#aguarde").show();
                  $("#fcred").submit();
               }
            }); 

            $(document).on( "click", "#finalizando", function() {
              alert("O FORMULARIO VAI SER MOSTRADO NOVAMENTE PARA CONFERÊNCIA");
              $("#fTudo,.forms,#enviando").show();
              $("#fases,#finalizando").hide();
              $(".b1,.a1").hide();
            });  

            $(document).on( "click", ".a1", function() {
                var f = $(this).attr("p");
                var s = $(this).attr("s");
                var e = $(this).attr("e");
                if (e!=1) {
                  $("#cabeform").hide();
                } else { 
                  $("#cabeform").show();  
                }
  
                var errado = 0;
                $("#form"+s+" .form-control").each(function () { 
                   var r = $(this).attr("required");
                   if (r=="required") {
                     if ($(this).val()=="" || $(this).val()==0 ) {
                        errado = 1;
                     }   
                   }

                });
                if (errado==1) {
                    return false;
                }                
                
                $(".forms").hide();
                $(".fases").removeClass("bg-primary").removeClass("bg-sucess").addClass('bg-secondary');
                $("#eform"+e).removeClass("bg-secondary").addClass('bg-primary');
                $("#"+f).slideDown("slow");

            });

            $(":input").inputmask();

            $(document).on( "click", ".tppessoa", function() {
                var t = $(this).val();
                $("#carcnpj").show();
                if (t=="PF") {
                   $("#carcnpj").hide();
                }
            });
            $("#telefone,#telefone1,#celular,#celular1").inputmask({
            mask: '(99) 9 9999-9999',
            placeholder: ' ',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
            return processedValue;
            }
            });

            $("#cnpj").inputmask({
              mask: '99.999.999/9999-99',
              placeholder: ' ',
              showMaskOnHover: false,
              showMaskOnFocus: false,
              onBeforePaste: function (pastedValue, opts) {
              var processedValue = pastedValue;
              return processedValue;
              }
              });

              $("#cpf").inputmask({
                mask: '999.999.999-99',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false,
                onBeforePaste: function (pastedValue, opts) {
                var processedValue = pastedValue;
                return processedValue;
                }
                });  
  

            $("#cep,#cep1").inputmask({
                mask: '99999-999',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false,
                onBeforePaste: function (pastedValue, opts) {
                var processedValue = pastedValue;
                return processedValue;
                }
            });
      });
    </script>
    
</body>
</html>