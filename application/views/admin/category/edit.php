<div class="card">
    <div class="card-header"><strong>Categorys</strong><small> Form</small></div>
    <div class="card-body card-block">
        <form action="<?= base_url("category/save/{$category->id}") ?>" method="post">
            <div class="form-group">
                <label for="company" class=" form-control-label">Category</label>
                <input type="text" id="categorys" name="categorys" value="<?= $category->categorys; ?>" placeholder="Enter your Categorys name" class="form-control">
                <?= form_error('categorys', '<div class="error text-danger">', '</div>') ?>

            </div>
            <input type="hidden" name="id" value="<?= $category->id; ?>">
            <input type="hidden" name="status" value="<?= $category->status; ?>">
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <span id="payment-button-amount">Update</span>
            </button>
        </form>

    </div>
</div>