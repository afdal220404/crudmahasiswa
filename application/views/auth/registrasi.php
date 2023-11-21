<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                    <form class="pt-3" action="<?= base_url('auth/registrasi'); ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" value="<?= set_value('nama');?>" class="form-control form-control-lg"  name="nama" id="nama"
                                        placeholder="Nama Lengkap"><?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" value="<?= set_value('email');?>" class="form-control form-control-lg"  name="email" id="email"
                                        placeholder="Alamat Email"><?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" value="<?= set_value('password');?>" class="form-control form-control-lg"
                                        name="password" id="password1" placeholder="Password"><?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                    name="password" id="password2" placeholder="Confirm Password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> I agree to all Terms &
                                            Conditions </label>
                                    </div>
                                </div>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Sign Up</button>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="<?= base_url('Auth'); ?>" class="text-primary">Login</a>
                                </div>
                            </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url('Auth'); ?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                </div>
</div>
</div>