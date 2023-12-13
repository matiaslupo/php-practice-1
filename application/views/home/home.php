<div class="container">
    <div class="row py-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nueva tarea</h5>
                    <form class="form-inline" method="post" action="<?php echo site_url('home/crear_tarea') ?>">
                        <label class="sr-only" for="inlineFormInputName2">Tarea</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="texto">
                        <button type="submit" class="btn btn-primary mb-2"><i
                                class="bi bi-plus-square-fill"></i></button>
                    </form>
                    <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; ?>
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
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Pendientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('home/completadas'); ?>">Completadas</a>
                        </li>
                    </ul>
                    <h5 class="card-title py-3 text-center">Lista de tareas pendientes de <?php echo $nick; ?></h5>
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
                                <a href="<?php echo site_url('home/completada/?id='.$p['id_tarea']); ?>"
                                    class="btn btn-success btn-sm mr-2"><i class="bi bi-check-lg"></i></a>
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