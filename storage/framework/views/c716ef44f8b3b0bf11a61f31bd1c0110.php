<style>
    .bg-cover {
        background-attachment: static;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron bg-cover"
            style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.6) 0%,rgba(255,255,255,0.9) 100%), url(https://picsum.photos/500/240)">
            <div class="container">
                <h1 class="display-4"><?php echo e($data['greetings'], false); ?>, <?php echo e($data['admin_user_first_name'], false); ?>!</h1>
                <p class="lead">Pinjam ruangan mudah dan cepat! Klik <a href="<?php echo e(route('admin.borrow-rooms.index'), false); ?>">disini</a> untuk lihat daftar pinjam ruang.</p>
                <hr class="my-4">
                <?php if($data['is_new_admin_user']): ?>
                    <p>
                        Sepertinya anda pengguna baru nih, ganti passwordnya dulu ya untuk alasan keamanan. Klik link dibawah
                    </p>
                    <a class="btn btn-danger btn-lg" href="<?php echo e(route('admin.setting'), false); ?>" role="button">Ganti Password</a>
                <?php endif; ?>

            </div>
            <!-- /.container   -->
        </div>

    </div>
</div>
<?php /**PATH D:\kirana\o\pinjam-ruang\resources\views/dashboard/admin_user_info.blade.php ENDPATH**/ ?>