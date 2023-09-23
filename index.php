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

        <div style="margin-top: 4em !important;">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item"
                    v-for="(supermercado, indice) in supermercados">
                    <a 
                        v-if="supermercado == supermercadoAtual" 
                        class="nav-link active" 
                        aria-current="page" 
                        href="#"
                        @click="carregarProdutos(supermercado)"
                    >
                        {{ supermercado }}
                    </a>
                    <a 
                        v-else 
                        class="nav-link" 
                        aria-current="page" 
                        href="#"
                        @click="carregarProdutos(supermercado)"
                    >
                        {{ supermercado }}
                    </a>
                </li>
            </ul>

            <div class="row justify-content-center">
                <div class="col-md-6 pt-3 pb-4">

                    <div class="list-group" 
                        v-if="localStorageData" 
                    >
                        <a href="#" 
                            v-for="produto in localStorageData" 
                            :key="produto.produto" 
                            class="list-group-item list-group-item-action"
                        >
                            <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">{{ produto.produto }}</h6>
                            <small>3 days ago</small>
                            </div>
                            <small>R$ {{ produto.preco }}</small>
                        </a>

                    </div>
                    
                </div>
            </div>
        </div>


        <!-- Footer -->
        <?php include 'footer.php' ?>
    </div>
    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                supermercadoAtual: '',
                supermercados: [],
                filtro: '',
                localStorageData: []
            },

            mounted() {
                this.carregarProdutos();
            },
            methods: {
                carregarProdutos(supermercado = null) {
                    
                    const produtos = JSON.parse(localStorage.getItem('produtosStore'));
                    
                    if(!supermercado) {
                        this.supermercados = Object.keys(produtos);
                        this.supermercadoAtual = this.supermercados[0];
                        this.localStorageData = produtos[this.supermercados[0]];
                    }else {
                        this.supermercadoAtual = supermercado;
                        this.localStorageData = produtos[supermercado];
                    }

                    if(this.filtro) {
                        this.filtrarProduto();
                    }
                },

                filtrarProduto() {
                    if(!this.filtro) {
                        this.carregarProdutos(this.supermercadoAtual);
                    }else {
                        let produtos = [];
                        
                        this.localStorageData.forEach((item) => {
                            if(item.produto.includes(this.filtro)) {
                                produtos.push(item);
                            }
                        });

                        this.localStorageData = produtos;
                    }
                }

            }
        })
    </script>
</body>
</html>