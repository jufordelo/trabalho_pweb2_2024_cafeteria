<?php $__env->startSection('conteudo'); ?>
<body style="background-color:rgb(222, 198, 245);">
    <h3>BREKIEE COFFEE <i class="fa-solid fa-mug-hot" style="color: #f56bd0;"></i></h3> <br>
    <h3>Faça sua Reserva abaixo:</h3>
    <?php
        if (!empty($dado->id)) {
            $route = route('reserva.update', $dado->id);
        } else {
            $route = route('reserva.store');
        }
    ?>
    <form action= "<?php echo e($route); ?>" method="post">

        <?php echo csrf_field(); ?>

        <?php if(!empty($dado->id)): ?>
            <?php echo method_field('put'); ?>
        <?php endif; ?>

        <input type="hidden" name="id"
            value="<?php if(!empty($dado->id)): ?> <?php echo e($dado->id); ?> <?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>


        <label for=""> Responsável da Reserva</label> <br>
        <input type="text" name="resp" class="form-control"
            value="<?php if(!empty($dado->resp)): ?> <?php echo e($dado->resp); ?>

     <?php elseif(!empty(old('resp'))): ?> <?php echo e(old('resp')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>

        <label for="">Telefone </label> <br>
        <input type="text" name="tel" class="form-control"
            value="<?php if(!empty($dado->tel)): ?> <?php echo e($dado->tel); ?>

     <?php elseif(!empty(old('tel'))): ?> <?php echo e(old('tel')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>

        <label for="">Data da reserva</label> <br>
        <input type="text" name="data" class="form-control"
            value="<?php if(!empty($dado->data)): ?> <?php echo e($dado->data); ?>

     <?php elseif(!empty(old('data'))): ?> <?php echo e(old('data')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>

        <label for="">Horário da reserva</label> <br>
        <input type="text" name="hora" class="form-control"
            value="<?php if(!empty($dado->hora)): ?> <?php echo e($dado->hora); ?>

     <?php elseif(!empty(old('hora'))): ?> <?php echo e(old('hora')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>

        <label for=""> Quantidade de pessoas </label>
        <input type="text" name="pss" class="form-control"
            value="<?php if(!empty($dado->pss)): ?> <?php echo e($dado->pss); ?>

     <?php elseif(!empty(old('pss'))): ?> <?php echo e(old('pss')); ?> else<?php echo e(''); ?> <?php endif; ?>">
        <br>


        <label for=""> Escolha uma opção de reserva: </label><br>
        <select name="categoria_reserva_id" class="form-select">
            <?php $__currentLoopData = $categoria_reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->nome); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>


        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-square-check" style="color: #B197FC;"></i>
            Enviar</button>
            <button class="btn btn-dark"> <i class="fa-solid fa-rotate-left" style="color: #B197FC;"></i><a href="<?php echo e(url('encomenda')); ?> "></a>Voltar</a></button>


    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\trabalho_pweb2_2024\resources\views/reserva/formr.blade.php ENDPATH**/ ?>