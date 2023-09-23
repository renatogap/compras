<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Compras</title>
    <style>
        .menu-bottom {
            padding: 10px;
            cursor: pointer;
        }

        .menu-bottom:hover {
            background: black;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div id="app" class="container">
        <?php include 'header.php' ?>

        <div style="margin-top: 5em !important;">
            <div class="row justify-content-center m-2">
                <div class="col-md-6 shadow pt-3 pb-4 rounded bg-light border border-primary-subtle">
                    <h1 class="mb-5">Novo produto</h1>

                    <form @submit.prevent="salvarDados">
                        <div class="mb-3">
                          <label for="supermercado" class="form-label">Supermercado:</label>
                          <select class="form-select" v-model="form.supermercado" name="supermercado" required>
                            <option value="" disabled selected>SELECIONE...</option>
                            <option value="Líder">Líder</option>
                            <option value="Mais Barato">Mais Barato</option>
                            <option value="Matheus">Matheus</option>
                            <option value="Preço Baixo">Preço Baixo</option>
                          </select>
                        </div>
                        <div class="mb-3">
                            <label for="produto" class="form-label">Produto:</label>
                            <input type="text" class="form-control" v-model="form.produto" name="produto" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="preco" class="form-label">Preço:</label>
                            <input type="text" class="form-control" v-model="form.preco" name="preco" placeholder="R$ 0.00" required>
                        </div>
    
                        <div class="alert alert-success"><i class="bi bi-check-circle-fill"></i> Produto adicionado.</div>
                  
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    
                </div>
            </div>
        </div>


        <!-- Footer -->
        <?php require 'footer.php' ?>
    </div>
    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                form: {
                    supermercado: '',
                    produto: '',
                    preco: ''
                },
                listaProdutos: []
            },
            methods: {
                salvarDados() {
                    const dados = JSON.parse(localStorage.getItem('produtosStore')) || {};

                    if (!dados[this.form.supermercado]) {
                        dados[this.form.supermercado] = [];
                    }

                    dados[this.form.supermercado].push({
                        produto: this.form.produto,
                        preco: this.form.preco
                    });
                    

                    localStorage.setItem('produtosStore', JSON.stringify(dados));
                }
            }
        })
    </script>
</body>
</html>