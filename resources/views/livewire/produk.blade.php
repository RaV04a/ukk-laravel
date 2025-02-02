<div>
    <h1>Products</h1>

    <form wire:submit.prevent="store">
        <input type="text" wire:model="nama_produk" placeholder="Nama Produk">
        <input type="number" wire:model="harga" placeholder="Harga">
        <button type="submit">Add Product</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->harga }}</td>
                <td>
                    <button wire:click.prevent="edit({{ $product->id }})">Edit</button>

                    <button wire:click="destroy({{ $product->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model.defer="nama_produk" placeholder="Nama Produk">
                        <input type="number" wire:model.defer="harga" placeholder="Harga">
                        <button type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('showEditModal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('editModal'));
            myModal.show();
        });

        window.addEventListener('hideEditModal', () => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
            if (myModal) {
                myModal.hide();
            }
        });
    });
</script>
@livewireScripts
