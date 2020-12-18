<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

</head>
<body>
  <title>Cadastro de Empresas</title>
<!--navbar -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{route('index')}}">EmpCad</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (Route::current()->getName() === 'index' ? 'active' : '') }}"><a class="nav-link" href="{{route('index')}}">Home</a></li>
        <li class="nav-item {{ (Route::current()->getName() === 'company.list' ? 'active' : '') }}"><a class="nav-link" href="{{route('company.list')}}">Empresas</a></li>
        <li class="nav-item {{ (Route::current()->getName() === 'site.contact' ? 'active' : '') }}"><a class="nav-link" href="{{route('company_unity.index')}}">Unidades</a></li>
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastrar
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="{{route('company.create')}}">Empresas</a>
          <a class="dropdown-item" href="{{route('company_unity.create')}}">Unidades</a>
          </div>
        </div>
        </ul>
      </div>
    </nav>
  </header>
    <!--main -->
  <main role="main">
      @yield('content')
  </main>
  <!--footer-->
  <div class="card-footer bg-dark text-white card-footer-new">
    <p class="float-right"><a href="#" class="btn btn-primary btn-sm bg-dark text-white">Voltar</a></p>
    <p>&copy; {{ date('Y')}} Company, Betobr12. &middot; <a href="#">Privacidade</a> &middot; <a href="#">Terms</a></p>
  </div>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script>
      $(document).ready( function () {
         $('#table_company').DataTable();
         $('.dataTables_length').addClass('bs-select');
      } );
  </script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

<script src="{{ asset('js/sweetalert2.all.js') }}"></script>

<script type="text/javascript">
    function deleteAll(id) {
        swal({
            title: 'Deseja realmente excluir?',
            text: "Escolha uma das opções abaixo:",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, desejo excluir!',
            cancelButtonText: 'Não, cancele!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelado',
                    'Suas informações não foram excluidas :)',
                    'error'
                )
            }
        })
    }
</script>
<script src="{{ asset('js/jquery.receita-ws.js') }}"></script>
<script>
    $(document).ready(function () {
        function fecharMensagem() {
            setTimeout(function () {
                $('#status').html('');
                $('#cnpj').prop('disabled', false);
            }, 2000);
        }
        $('#cnpj').receitaws({
            afterRequest: function () {
                var cnpj = $('#cnpj').val();
                $('#status').html('<div class="alert alert-info">Buscando CNPJ</div>');
                $('form').find("input[type=text]").val("");
                $('#cnpj').val(cnpj);
                $('#cnpj').prop('disabled', true);
            },
            success: function (data) {
                $('#status').html('<div class="alert alert-success">CNPJ Encontrado</div>');

                fecharMensagem();
            },
            fail: function (message) {
                $('#status').html('<div class="alert alert-danger">' + message + '</div>');

                fecharMensagem();
            },
            notfound: function (message) {
                $('#status').html('<div class="alert alert-warning">CNPJ inexistente</div>');

                fecharMensagem();
            },

            fields: {
                nome: '#razao',
                fantasia: '#fantasia',
                cep: '#cep',
                logradouro: '#logradouro',
                numero: '#numero',
                bairro: '#bairro',
                municipio: '#municipio',
                uf: '#uf',
                email: '#email',
                telefone: '#telefone',
                complemento: '#complemento',

                telefone: function (data) {
                    var separa = data.split('/');
                    if (typeof separa[0] != 'undefined') {
                        $('#fone1').val(separa[0]);
                    }
                },
                qsa: function (data) {
                    var responsaveis = [];
                    $.each(data, function(i, val) {
                        if (typeof val != 'undefined') {
                            responsaveis[i] = val.nome
                        }
                    });
                    $('#responsavel').val(responsaveis.join(','));
                }
            }
        });
    });
</script>
</body>
</html>
