<!-- Add Modal Start -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New User</h5>
                <button type="button" class="close btn btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="firstname" placeholder="Enter firstname" class="form-control mb-2 add">
                <input type="text" name="lastname" placeholder="Enter lastname" class="form-control mb-2 add">
                <input type="text" name="email" placeholder="Enter email" class="form-control mb-2 add">
                <input type="text" name="phone" placeholder="Enter phone" class="form-control mb-2 add">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addUser();" data-dismiss="modal">Add new</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal End -->

<!-- Edit Modal Start -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close btn btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_id" id="user_id" class="edit">
                <input type="text" name="firstname" id="firstname" placeholder="Enter firstname" class="form-control mb-2 edit">
                <input type="text" name="lastname" id="lastname" placeholder="Enter lastname" class="form-control mb-2 edit">
                <input type="text" name="email" id="email" placeholder="Enter email" class="form-control mb-2 edit">
                <input type="text" name="phone" id="phone" placeholder="Enter phone" class="form-control mb-2 edit">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="update();" data-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal End -->