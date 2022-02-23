<?php require_once 'head.php'; ?>

<div class="container bg-light p-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="text-center mb-4">Ajax Crud</h3>
            <div class="row mb-3">
                <div class="col-4">
                    <button class="btn btn-outline-primary px-5" data-toggle="modal" data-target="#addModal"><i class="fa-solid fa-plus"></i>Add User</button>
                </div>
                <div class="col-8">
                    <input type="text" onkeyup="search(this.value);" class="form-control" placeholder="Search">
                </div>
            </div>

            <div id="displayDataTable">

            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
<?php require_once 'modals.php'; ?>