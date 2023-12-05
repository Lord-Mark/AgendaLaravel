@section('head_input')
    <script>
        $(document).ready(function () {
            $('#zip_code').on('blur', function () {
                var zip_code = $(this).val().replace(/\D/g, '');

                if (zip_code.length !== 8) {
                    return;
                }

                $.ajax({
                    url: 'https://viacep.com.br/ws/' + zip_code + '/json/',
                    dataType: 'json',
                    type: 'GET',
                    success: function (response) {
                        if (!('erro' in response)) {
                            $('#street').val(response.logradouro);
                            $('#complement').val(response.complemento);
                            $('#neighborhood').val(response.bairro);
                            $('#city').val(response.localidade);
                            $('#state').val(response.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    },
                    error: function () {
                        alert('Erro ao buscar o CEP. Tente novamente.');
                    }
                });
            });
        });
    </script>
@endsection
