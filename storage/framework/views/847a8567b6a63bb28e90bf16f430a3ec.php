
<?php $__env->startSection('content'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo e(route('home'), false); ?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Ruangan <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">Daftar Ruangan</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
          <div class="container-fluid px-md-0">
              <div class="row no-gutters">
              <?php $__currentLoopData = $data['rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $room_status = $room->status;
                    $borrower_status = [];

                    // Check if any borrow rooms
                    if ($room->borrow_rooms->isNotEmpty()) {
                        // Check each borrow_rooms
                        foreach ($room->borrow_rooms as $key => $borrow_room) {
                            // Show details if not finished yet by checking status first
                            if (
                                $borrow_room->returned_at == null
                                && $borrow_room->admin_approval_status == App\Enums\ApprovalStatus::Disetujui
                            ) {
                                $room_status = 1; // Set status room to Booked
                                $borrower_first_name = ucfirst(strtolower(explode(' ', Encore\Admin\Auth\Database\Administrator::find($borrow_room->borrower_id)->name)[0]));
                                // $borrow_at =    Carbon\Carbon::make($borrow_room->borrow_at)->format('d M Y');
                                // $until_at =     Carbon\Carbon::make($borrow_room->until_at)->format('d M Y');

                                $borrow_at = Carbon\Carbon::parse($borrow_room->borrow_at);
                                $until_at = Carbon\Carbon::parse($borrow_room->until_at);
                                $count_days = $borrow_at->diffInDays($until_at) + 1;

                                if ($count_days == 1)
                                    $borrower_status[] = $borrower_first_name . ' - ' . $borrow_at->format('d M Y');
                                else
                                    $borrower_status[] = $borrower_first_name . ' - ' . $borrow_at->format('d M Y') . ' s.d ' . $until_at->format('d M Y');
                            }
                        }
                    }
                ?>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img" style="background-image: url(<?php echo e(asset('vendor/technext/vacation-rental/images/room-'. rand(1, 6) . '.jpg'), false); ?>);"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0"><?php echo e($room->room_type->name, false); ?></p>
                                <h3 class="mb-3"><a href="rooms.html"><?php echo e($room->name, false); ?></a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Maks:</span> <?php echo e($room->max_people, false); ?> Orang</li>
                                    <li><span>Status:</span> <?php echo e(App\Enums\RoomStatus::getDescription($room_status), false); ?></li>
                                    <li><?php echo implode('<br>', $borrower_status); ?></li>
                                </ul>
                                <p class="pt-1"><a href="javascript:void(0)" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2" data-toggle="modal" data-target="#borrowRoomModal" data-room-id="<?php echo e($room->id, false); ?>" data-room-name="<?php echo e($room->name, false); ?>">Pinjam Ruang Ini <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          </div>
      </section>

      <!-- Modal -->
    <div class="modal fade" id="borrowRoomModal" tabindex="-1" role="dialog" aria-labelledby="borrowRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="borrowRoomModalLabel">Pinjam Ruang - Nama Ruang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('api.v1.borrow-room-with-college-student', []), false); ?>" class="appointment-form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <input id="room" name="room" type="hidden" value="<?php echo e(old('room'), false); ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                            <input name="full_name" type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-wrap">
                        <div class="icon"><span class="ion-md-calendar"></span></div>
                        <input name="borrow_at" type="text" class="form-control appointment_date-check-in" placeholder="Tgl Mulai">
                    </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-wrap">
                        <div class="icon"><span class="ion-md-calendar"></span></div>
                        <input name="until_at" type="text" class="form-control appointment_date-check-out" placeholder="Tgl Selesai">
                    </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <div class="form-field">
                          <div class="select-wrap">
                  <select name="lecturer" id="" class="form-control">
                      <option value="" selected disabled>Pilih dosen</option>
                    <?php $__empty_1 = true; $__currentLoopData = $data['lecturers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <option value="<?php echo e($lecturer->id, false); ?>">
                            <?php echo e($lecturer->name, false); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="" disabled>Belum ada dosen yang terdaftar</option>
                    <?php endif; ?>
                  </select>
                </div>
                  </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <input name="nim" type="text" class="form-control" placeholder="NIM">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-field">
                          <div class="select-wrap">
                  <select name="study_program" id="" class="form-control">
                      <option value="" selected disabled>Prodi</option>
                      <option value="teknik-informatika">Teknik Informatika (D3)</option>
                      <option value="teknik-multimedia-dan-jaringan">Teknik Multimedia & Jaringan (D4)</option>
                      <option value="teknik-geomatika">Teknik Geomatika (D3)</option>
                      <option value="animasi">Animasi (D4)</option>
                      <option value="rekayasa-keamanan-siber">Rekayasa Keamanan Siber (D4)</option>
                  </select>
                </div>
                  </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Pinjam Ruang Sekarang" class="btn btn-primary">
            </form>
            </div>
        </div>
        </div>
    </div>

    <?php $__env->startSection('scripts'); ?>
        <script>
            //triggered when modal is about to be shown
            $(document).on('click', '#buttonBorrowRoomModal', function() {

                var roomName = $(this).data('room-name');
                var roomId = $(this).data('room-id');

                // Change value room
                $('input[name="room"]').val(roomId);

                // change title modal
                $('#borrowRoomModalLabel').text('Pinjam Ruang - ' + roomName);

                // Rest form modal
                resetBorrowRoomModalForm()
            });

            function resetBorrowRoomModalForm(){
                $('#borrowRoomModal').find('input[name="full_name"]').val('');
                $('#borrowRoomModal').find('input[name="borrow_at"]').val('');
                $('#borrowRoomModal').find('input[name="until_at"]').val('');
                $('#borrowRoomModal').find('select[name="lecturer"]').val($('select[name="lecturer"] option:first').val());
                $('#borrowRoomModal').find('input[name="nim"]').val('');
                $('#borrowRoomModal').find('select[name="study_program"]').val($('select[name="study_program"] option:first').val());
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kirana\o\pinjam-ruang\resources\views/pages/rooms.blade.php ENDPATH**/ ?>