<nav class="navbar fixed-top bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white">
            <i class="bi bi-cart3"></i> Compras
        </a>

        <form class="d-flex" role="search">
            <div class="input-group">
                <input type="text" v-model="filtro" class="form-control" placeholder="Pesquisar">
                <span class="input-group-text" @click="filtrarProduto"><i class="bi bi-search"></i></span>
            </div>
        </form>
    </div>
</nav>