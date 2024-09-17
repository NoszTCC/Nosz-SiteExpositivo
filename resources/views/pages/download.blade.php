@extends('general.layout')
@section('Download')

    <section class="download-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="download-form-wrap">
                        <div class="col-lg-12 col-12 p-0 text-center">
                            <form class="personalizado-form download-form" action="{{ route('cadastrarFBAuth') }}"
                                method="post" enctype="multipart/form-data">
                                @method('post') @csrf

                                <div class="text-center mb-4 pb-lg-2">
                                    <em> Cadastro </em>
                                    <h2> Garanta sua conta no App </h2>
                                </div>

                                <div class="download-form-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <em class="text-white" id="retorno">
                                                @if (isset($retorno))
                                                    {{ $retorno }}
                                                @elseif ($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }} <br />
                                                    @endforeach
                                                @endif
                                            </em>

                                            <select class="col-12 form-select form-control" name="tipo" id="tipo"
                                                aria-label="Selecione se é um cliente ou parceiro" required>
                                                <option selected disabled> Cliente ou Parceiro? </option>
                                                <option value="users"> Cliente </option>
                                                <option value="parceiros"> Parceiro </option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="text" class="form-control" placeholder="Nome/responsável"
                                                name="nome" id="nome" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="email" class="form-control" placeholder="E-Mail" maxlength="255"
                                                name="email" id="email" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="password" class="form-control" placeholder="Senha" name="senha"
                                                id="senha" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="password" class="form-control" placeholder="Confirmar Senha"
                                                name="confirmarSenha" id="confirmarSenha" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="text" placeholder="CPF/CNPJ" class="form-control"
                                                autocomplete="off" maxlength="18" name="cpfcnpj" id="cpfcnpj" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="tel" placeholder="Telefone" class="form-control" maxlength="15"
                                                name="telefone" id="telefone" required>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <input type="text" class="form-control" placeholder="CEP" name="cep"
                                                id="cep" maxlength=9 required>
                                        </div>

                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" placeholder="Rua" name="rua"
                                                id="rua" required>
                                        </div>

                                        <div class="col-lg-4 col-12">
                                            <input type="number" class="form-control" placeholder="N°" name="numero"
                                                id="numero" min=1 maxlength=5 required>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <input type="text" class="form-control" placeholder="Bairro" name="bairro"
                                                id="bairro" required>
                                        </div>

                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" placeholder="Cidade" name="cidade"
                                                id="cidade" required>
                                        </div>

                                        <div class="col-lg-4 col-12">
                                            <input type="text" class="form-control" placeholder="Estado (Sigla)"
                                                maxlength=2 name="estado" id="estado" required>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <em> Apenas para parceiros </em>
                                            <input type="text" class="form-control" placeholder="Restaurante"
                                                name="restaurante" id="restaurante" disabled>
                                        </div>

                                        <div class="col-lg-12 col-12 mb-3">
                                            <label for="logo" class="form-control" style="text-align: center">
                                                Selecione sua Logo
                                            </label>
                                            <input type="file" style="display:none" placeholder="Logo" name="logo"
                                                id="logo" disabled>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <em> Quais são as suas expectativas para o App? </em>
                                            <textarea rows="3" class="form-control" placeholder="Comentário (Opcional)" name="mensagem" id="mensagem"></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-10 col-8 mx-auto mt-2">
                                            <button type="submit" class="form-control" id="cadastro"> Cadastrar
                                            </button>
                                        </div>

                                        <div style="text-align:center"
                                            class="col-lg-3 col-0 mx-auto mb-5 mt-5 mt-lg-5 ps-lg-0">
                                            <em> Aponte a câmera neste QR Code para acessar nosso aplicativo </em>
                                            <img src="{{ asset('imgs/favicons/qrcode.png') }}" width="100%"
                                                alt="QR Code">
                                        </div>

                                        <div class="col-lg-12 col-12 mt-5">
                                            <div class="col-lg-12 col-12 mx-auto mt-5 mb-5 mt-lg-0 ps-lg-3">
                                                <iframe class="google-map" width="100%" height="300"
                                                    title="Mapa Etec" referrerpolicy="no-referrer-when-downgrade"
                                                    allowfullscreen src="https://encurtador.com.br/yBJ78">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha384-7iQjT0yJL9VdWWPbC9GS8pF04rcTzCLmZyM3nDfF5AZEftsbOrhDzAbwD47rMxR8" crossorigin="anonymous">
            </script>

            <script>
                function negarCEP() {
                    $('#cep').prop('value', '');
                    $('#cep').prop('placeholder', 'CEP Inválido');
                    $('#rua').prop('value', '');
                    $('#bairro').prop('value', '');
                    $('#cidade').prop('value', '');
                    $('#estado').prop('value', '');
                    $('#cadastro').prop('disabled', true);
                }

                function erroCEP() {
                    $('#cep').prop('value', '');
                    $('#cep').prop('placeholder', 'Erro na busca do endereço, altere manualmente');
                    $('#cadastro').prop('disabled', false);
                }

                function aceitarCEP(data) {
                    $('#rua').prop('value', data.logradouro);
                    $('#bairro').prop('value', data.bairro);
                    $('#cidade').prop('value', data.localidade);
                    $('#estado').prop('value', data.uf);
                    $('#cadastro').prop('disabled', false);
                }

                document.getElementById('cep').addEventListener('blur', e => {
                    let cep = e.target.value.replace(/\D/g, '');

                    let rua = document.getElementById('rua').value.trim().toUpperCase();
                    let bairro = document.getElementById('bairro').value.trim().toUpperCase();
                    let cidade = document.getElementById('cidade').value.trim().toUpperCase();
                    let estado = document.getElementById('estado').value.trim().toUpperCase();

                    if (cep.length !== 8) {
                        alert('CEP inválido');
                        negarCEP();
                        return;
                    }

                    let url = 'https://viacep.com.br/ws/' + cep + '/json/';
                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Erro de conexão');
                                erroCEP();
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.erro) {
                                throw new Error('CEP não encontrado');
                                negarCEP();
                            } else {
                                let apiRua = data.logradouro.trim().toUpperCase();
                                let apiBairro = data.bairro.trim().toUpperCase();
                                let apiCidade = data.localidade.trim().toUpperCase();
                                let apiEstado = data.uf.trim().toUpperCase();

                                if (rua && rua.localeCompare(apiRua) === -1) {
                                    alert('O nome da rua não coincide com o endereço do CEP');
                                    negarCEP();
                                } else if (bairro && rua.localeCompare(apiBairro) === -1) {
                                    alert('O nome do bairro não coincide com o endereço do CEP');
                                    negarCEP();
                                } else if (cidade && cidade.localeCompare(apiCidade) === -1) {
                                    alert('O nome da cidade não coincide com o endereço do CEP');
                                    negarCEP();
                                } else if (estado && rua.localeCompare(apiEstado) === -1) {
                                    alert('O nome do estado não coincide com o endereço do CEP');
                                    negarCEP();
                                } else {
                                    aceitarCEP(data);
                                }
                            }
                        })
                        .catch(error => {
                            alert('Erro na busca de endereço, aguarde um momento ou digite seu endereço manualmente');
                            erroCEP();
                        });
                });

                const teste = document.getElementById('teste');
                const email = document.getElementById('email');

                email.addEventListener('change', e => {
                    fetch("{{ route('emailExistente') }}?email=" + email.value, {
                            method: 'GET'
                        })
                        .then(async response => await response)
                        .then(response => {
                            if (response.status === 400) {
                                alert('Email já está em uso!');
                            }
                        });
                });

                const tipo = document.getElementById('tipo');
                const rest = document.getElementById('rest');
                const logo = document.getElementById('logo');

                tipo.addEventListener('change', () => {
                    if (tipo.value === "users") {
                        $('#cpfcnpj').attr('placeholder', 'CPF');
                        $('#cpfcnpj').attr('maxlength', 14);
                        $('#restaurante').prop('disabled', true);
                        $('#logo').prop('disabled', true);
                        $('#restaurante').prop('value', '');
                        $('#logo').prop('value', '');
                    } else if (tipo.value === "parceiros") {
                        $('#cpfcnpj').attr('placeholder', 'CNPJ');
                        $('#cpfcnpj').attr('maxlength', 18);
                        $('#restaurante').prop('disabled', false);
                        $('#logo').prop('disabled', false);
                    }
                });

                const cpfOuCnpj = document.getElementById('cpfcnpj');
                cpfOuCnpj.addEventListener('keyup', e => {
                    if (e.which === 8) {
                        return;
                    }

                    const valorAtual = e.target.value.replace(/\D/g, '');
                    let valorFormatado = '';

                    if (tipo.value === "users") {
                        switch (valorAtual.length) {
                            case 3:
                                valorFormatado = valorAtual.replace(/^(\d{3})$/, '$1.');
                                break;
                            case 6:
                                valorFormatado = valorAtual.replace(/^(\d{3})(\d{3})$/, '$1.$2.');
                                break;
                            case 9:
                                valorFormatado = valorAtual.replace(/^(\d{3})(\d{3})(\d{3})$/, '$1.$2.$3');
                                break;
                            case 11:
                                valorFormatado = valorAtual.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
                                break;
                        }
                    } else if (tipo.value === "parceiros") {
                        switch (valorAtual.length) {
                            case 12:
                                valorFormatado = valorAtual.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})$/, '$1.$2.$3/$4-');
                                break;
                            case 14:
                                valorFormatado = valorAtual.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/,
                                    '$1.$2.$3/$4-$5');
                                break;
                        }
                    }

                    valorFormatado = valorFormatado ?? e.target.value;
                    if (valorFormatado) {
                        e.target.value = valorFormatado;
                    }
                });

                const telefone = document.getElementById('telefone');
                telefone.addEventListener('keyup', e => {
                    if (e.which === 8) {
                        return;
                    }

                    const valorAtual = e.target.value.replace(/\D/g, '');
                    let valorFormatado = '';

                    if (valorAtual.length === 10) {
                        valorFormatado = valorAtual.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
                    } else if (valorAtual.length === 11) {
                        valorFormatado = valorAtual.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                    }

                    if (valorFormatado) {
                        e.target.value = valorFormatado;
                    }
                });
            </script>
    </section>

@endsection
