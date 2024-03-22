<?php $__env->startSection('conteudo'); ?>

<body style="background-color:rgb(222, 198, 245);" > </body>

   <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
    <h4>Faça seu Pedido de Festa abaixo:</h4>
    <?php
        if (!empty($dado->id)) {
            $route = route('encomenda.update', $dado->id);
        } else {
            $route = route('encomenda.store');
        }
    ?>
    <form action= "<?php echo e($route); ?>" method="post">

        <?php echo csrf_field(); ?>

        <?php if(!empty($dado->id)): ?>
            <?php echo method_field('put'); ?>
        <?php endif; ?>

        <input type="hidden" name="id"
            value="<?php if(!empty($dado->id)): ?> <?php echo e($dado->id); ?> <?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>


        <label for="">Nome</label> <br>
        <input type="text" name="nome" class="form-control"
            value="<?php if(!empty($dado->nome)): ?> <?php echo e($dado->nome); ?>

     <?php elseif(!empty(old('nome'))): ?> <?php echo e(old('nome')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>

        <label for="">Contato</label> <br>
        <input type="text" name="contato" class="form-control"
            value="<?php if(!empty($dado->contato)): ?> <?php echo e($dado->contato); ?>

     <?php elseif(!empty(old('contato'))): ?> <?php echo e(old('contato')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>


        <label for="">Quantidade</label>
        <input type="text" name="qtn" class="form-control"
            value="<?php if(!empty($dado->qtn)): ?> <?php echo e($dado->qtn); ?>

     <?php elseif(!empty(old('qtn'))): ?> <?php echo e(old('qtn')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>


        <label for="">Categorias</label><br>

        <select name="categoria_id" class="form-select">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>



        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
Enviar</button>


        <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a href="<?php echo e(url('encomenda')); ?> "></a>Voltar</a></button>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trabalho_pweb2_2024\resources\views/encomenda/form.blade.php ENDPATH**/ ?>