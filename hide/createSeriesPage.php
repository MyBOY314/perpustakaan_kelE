<?php
include '../component/sidebar.php';
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);" >
    <div class="body d-flex justify-content-between">
        <h4>CREATE SERIES</h4>
    </div>
    <div class="d-grid gap-2"> 
        <a class="btn btn-primary" style="width: 15%;background-color:red" href="../page/ListSeriesPage.php" role="button">CANCEL</a>
    </div>
    <hr>
    <table class="table ">
        <form action="../process/createSeriesProcess.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-
                label">Name</label>
                <input class="form-control" id="name" name="name"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-
                label">Genre</label>
                <input class="form-control"
                id="genre" name="genre">
            </div>
            <div class="mb-3">
                <label for="realease" class="form-
                label">Realease</label>
                <input class="form-control"
                id="realease" name="realease">
            </div>
            <div class="mb-3">
                <label for="episode" class="form-
                label">Episode</label>
                <input class="form-control"
                id="episode" name="episode">
            </div>
            <div class="mb-3">
                <label for="season" class="form-
                label">Season</label>
                <input class="form-control"
                id="season" name="season">
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-
                label">Synopsis</label>
                <input class="form-control"
                id="synopsis" name="synopsis">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary"
                name="save">SAVE</button>
            </div>
        </form>
    </table>
</div>
</aside>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>