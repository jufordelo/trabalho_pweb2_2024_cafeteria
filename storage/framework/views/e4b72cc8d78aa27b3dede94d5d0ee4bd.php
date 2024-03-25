<?php $__env->startSection('conteudo'); ?>
<?php $__env->startSection('titulo', 'Formulario Sugestao'); ?>

<body style="background-color:rgb(222, 198, 245);">

<h3> Listagem de Sugestões </h3>
<h5>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h5> <br>
<form action="<?php echo e(route('sugestao.search')); ?>" method="post">
    <div class="row">
        <?php echo csrf_field(); ?>
        <div class= "col-4">
            <label for=""> Assunto </label><br>
            <input type="text" name="assunto" class="form-control"><br>
        </div>
        <div class="col-4" style="">
            <button type="submit"class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></class=>
                </i> Buscar </button>

            <a href="<?php echo e(url('sugestao/create')); ?>" class="btn btn-dark"> <i class="fa-solid fa-pen-to-square" style="color: #a58eec;"></i> </i> Nova
                Sugestão</a>
        </div>
    </div>
</form>

<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Assunto</th>
            <th>Grau de atendimento</th>
            <th>Comentário</th>
            <th colspan="2">EDITAR</th>
            <th colspan="2">EXCLUIR</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->assunto); ?></td>
                <td><?php echo e($item->tipo); ?></td>
                <td><?php echo e($item->comentario); ?></td>
                <td><a href="<?php echo e(route('sugestao.edit', $item->id)); ?>"class="btn btn-dark"><i class="fa-solid fa-pencil" style="color: #f04c7d;"></i></a></td>

                <td><form action="<?php echo e(route('sugestao.destroy', $item)); ?>" method="post">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                             <button type="submit" class="btn btn-outline-danger" title="Deletar"
                            onclick="return confirm('Deseja realmente deletar esse registro?')">
                            <i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trabalho_pweb2_2024\resources\views/sugestao/lists.blade.php ENDPATH**/ ?>