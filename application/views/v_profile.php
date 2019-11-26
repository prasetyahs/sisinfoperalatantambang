<div class="container-fluid bg-light">
    <div class="row">
       <div class="col-5 align-items-center">
       </div>
        <div class="col py-5">
            <div class="container ftco-animate">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h3 class="mb-4">Profile Saya</h3>
                    </div>
                </div>
                <form action="<?= base_url();?>pages/search_recommended" method="POST">
                    <div class="form-wrapper">
                        <label for="">Username</label>
                        <input type="text" readonly class="form-control">
                    </div>
                    <div class="form-wrapper">
                        <label for="">Nama Depan</label>
                        <input type="text" readonly class="form-control">
                    </div>
                    <div class="form-wrapper">
                        <label for="">Nama Belakang</label>
                        <input type="text" readonly class="form-control">
                    </div>
                    <div class="form-wrapper">
                        <label for="">Email</label>
                        <input type="text" readonly class="form-control">
                    </div>
                    <div class="form-wrapper">
                        <label for="">No Telepon</label>
                        <input type="text" readonly class="form-control">
                    </div>
                    <button type="submit" style="background:#f8a978;" name="register">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>