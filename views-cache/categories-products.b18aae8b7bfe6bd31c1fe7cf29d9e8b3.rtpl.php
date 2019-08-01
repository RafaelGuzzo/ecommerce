<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produtos da Categoria <?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/admin/categories">Categorias</a></li>
            <li><a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
            <li class="active"><a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products">Produtos</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Todos os Produtos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome do Produto</th>
                                    <th style="width: 240px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/testeAdd" method="post">
                                    <?php $counter1=-1;  if( isset($productsNotRelated) && ( is_array($productsNotRelated) || $productsNotRelated instanceof Traversable ) && sizeof($productsNotRelated) ) foreach( $productsNotRelated as $key1 => $value1 ){ $counter1++; ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td><input type="checkbox" name="testeAdd[]" value="<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></td>
                                        <td>
                                            <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-right"></i> Adicionar</a>
                                        </td>
                                    </tr>
                                    <?php } ?> <?php if( $productsNotRelated !== [] ){ ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-xs pull-right" id="adicionar" disabled><i class="fa fa-arrow-left"></i>Remover Selecionados</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Produtos na Categoria <?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome do Produto</th>
                                    <th>Marcar Todos
                                        <input type="checkbox" name="mar" onclick='teste(this.checked, "testeRemov[]" )'>
                                    </th>
                                    <th style="width: 240px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/testeRemov" method="post">
                                    <?php $counter1=-1;  if( isset($productsRelated) && ( is_array($productsRelated) || $productsRelated instanceof Traversable ) && sizeof($productsRelated) ) foreach( $productsRelated as $key1 => $value1 ){ $counter1++; ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                        <td><input type="checkbox" name="testeRemov[]" value="<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></td>
                                        <td>
                                            <a href="/admin/categories/<?php echo htmlspecialchars( $category["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove" class="btn btn-primary btn-xs pull-right"><i class="fa fa-arrow-left"></i> Remover</a>
                                        </td>

                                    </tr>
                                    <?php } ?> <?php if( $productsRelated !== [] ){ ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-xs pull-right" id="remover" disabled><i class="fa fa-arrow-left"></i>Remover Selecionados</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<script>
    var checaAdd = document.getElementsByName("testeAdd[]");
    var numElementosAdd = checaAdd.length;
    var btAdd = document.getElementById("adicionar");
    for (var x = 0; x < numElementosAdd; x++) {
        checaAdd[x].onclick = function() {
            // "input[name='toggle']:checked" conta os checkbox checados
            var cont = document.querySelectorAll("input[name='testeAdd[]']:checked").length;
            // ternário que verifica se há algum checado.
            // se não há, retorna 0 (false), logo desabilita o botão
            btAdd.disabled = cont ? false : true;
        }
    }

    var checaRemov = document.getElementsByName("testeRemov[]");
    var numElementosRemov = checaRemov.length;
    var btRm = document.getElementById("remover");
    for (var x = 0; x < numElementosRemov; x++) {
        checaRemov[x].onclick = function() {
            // "input[name='toggle']:checked" conta os checkbox checados
            var cont = document.querySelectorAll("input[name='testeRemov[]']:checked").length;
            // ternário que verifica se há algum checado.
            // se não há, retorna 0 (false), logo desabilita o botão
            btRm.disabled = cont ? false : true;
        }
    }

    function teste(checked, name) {
        var itens = document.getElementsByName(name);

        for (let i = 0; i < itens.length; i++) {
            itens[i].checked = checked;
        }
    }
</script>
<!-- /.content-wrapper -->