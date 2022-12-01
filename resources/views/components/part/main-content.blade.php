<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            {{ $slot }}
        </div>
        <div class="col-1"><a href="create">Add New</a></div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="confirmModalLabel">Confirm Deletion</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure delete the data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary" id="delleteConfirm">Confirm Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    //onclick="this.parentNode.submit(); return false;"
    let form;
    let btn = document.getElementById('delleteConfirm')

    function defineForm(id) {
        form = document.getElementById(id);
    }

    btn.addEventListener("click", function () {
        form.submit();
        document.getElementById('confirmModal').hide();
    });
</script>
