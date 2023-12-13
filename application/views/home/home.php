<div class="container">
    <div class="row py-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-body">                    
                    <h5 class="card-title">Nueva tarea</h5>
                    <form class="form-inline" method="post" action="<?php echo site_url('home/crear_tarea') ?>">
                        <label class="sr-only" for="inlineFormInputName2">Tarea</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="texto">
                        <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-plus-square-fill"></i></button>
                    </form>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-body">                    
                    <h5 class="card-title py-1 text-center">Lista de tareas de <?php echo $nick; ?></h5>
                    <?php if (isset($info)) { ?>
                        <div class="alert alert-info">
                            No hay tareas pendientes.
                        </div>
                    <?php } ?>
                    <ul class="list-group">
                        <?php if (isset($pendientes)) { 
                                foreach ($pendientes as $p) {
                        ?>
                        <li class="list-group-item">
                            <span class="mr-2"><?php echo $p['texto']; ?></span>
                            <span class="mr-2"><?php echo $p['fecha']; ?></span>
                            <span class="float-right">
                                <a href="#" class="btn btn-dark btn-sm mr-2"><i class="bi bi-eye-slash"></i></a>
                            </span>
                        </li>
                        <?php   }
                            }   ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>