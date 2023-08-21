<div class="modal fade" id="updateRemark">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" > Update Remark</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/update-result-remark" method="post" >@csrf
                    <div class="form-group">
                        <label>Principal Remark</label>
                        <input type="text" name="principal" class="form-control">
                        <input type="hidden" name="id">
                    </div>
                    <div class="form-group">
                        <label>Teacher Remark</label>
                        <input type="text" name="teacher" class="form-control">
                    </div>
                    <div class="form-group d-flex justify-content-end ">
                        <button class="btn btn-secondary mt-2">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
