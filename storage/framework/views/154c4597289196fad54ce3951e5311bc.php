<?php $__env->startSection('conteudo'); ?>

    <body style="background-color:rgb(222, 198, 245);">
        <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
        <h3>Faça sua Sugestão abaixo:</h3>
        <?php
            if (!empty($dado->id)) {
                $route = route('sugestao.update', $dado->id);
            } else {
                $route = route('sugestao.store');
            }
        ?>
        <form action= "<?php echo e($route); ?>" method="post">

            <?php echo csrf_field(); ?>

            <?php if(!empty($dado->id)): ?>
                <?php echo method_field('put'); ?>
            <?php endif; ?>

            <input type="hidden" name="id"
                value="<?php if(!empty($dado->id)): ?> <?php echo e($dado->id); ?> <?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>


            <label for="">Assunto:</label> <br>
            <input type="text" name="assunto" class="form-control"
                value="<?php if(!empty($dado->resp)): ?> <?php echo e($dado->resp); ?>

     <?php elseif(!empty(old('assunto'))): ?> <?php echo e(old('assunto')); ?> else<?php echo e(''); ?> <?php endif; ?>">
            <br>

            <label for="">Tipo de atendimento:</label><br>
            <select name="tipo" class="form-select">
                <?php $__currentLoopData = $categoria_sugestao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->tipo); ?>"><?php echo e($item->tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label for="">Comentário:</label> <br>

            <textarea name="comentario" cols="100" rows="5">
                <?php if(!empty($dado->tel)): ?> <?php echo e($dado->tel); ?>

                    <?php elseif(!empty(old('comentario'))): ?> <?php echo e(old('comentario')); ?> else<?php echo e(''); ?> <?php endif; ?>
            </textarea>

            <br>


            <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
                Enviar</button>
            <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a
                    href="<?php echo e(url('sugestao')); ?> "></a>Voltar</a></button>


        </form>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trabalho_pweb2_2024\resources\views/sugestao/forms.blade.php ENDPATH**/ ?>