<div class="container">
    <div class="row py-5">
        <div class="col-5 offset-4">
            <div class="card py-2">
                <h5 class="card-title text-center">Login</h5>
                <div class="card-body">
                    <?php if (isset($errors)) {?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <form method="post" action="<?php echo site_url('login/login'); ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de usuario</label>
                            <input type="text" class="form-control" name="nick">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Clave</label>
                            <input type="password" class="form-control" name="clave">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>