<div class="container">
                <form action="insert" method="post">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input class="form-control" id="title" name="input_title" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Titulo de la Tarea</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input class="form-control" id="description" name="input_description">
                    </div>
                    <div class="form-group">
                        <label for="priority">Prioridad</label>
                        <input type="number" class="form-control" id="priority"  name="input_priority">
                        </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="input_completed" name="input_completed">
                        <label class="form-check-label" for="completed">Completada</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>