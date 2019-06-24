<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog .modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabelUpdate">Modifier un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form method="POST" id="update_product">
                    <div class="form-group">
                        <label for="modifBarcode">Code Barre</label>
                        <input type="text" class="form-control" id="modifBarcode"
                               aria-describedby="code-barre"
                               placeholder="Code Barre">
                        <small id="barcodeError" class="form-text text-muted">14 caractères nécessaires
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="modifQuantity">Quantité</label>
                        <input type="text" class="form-control" id="modifQuantity"
                               aria-describedby="quantite"
                               placeholder="Quantité">
                        <small id="quantityError" class="form-text text-muted">Nombre entier</small>
                    </div>
                    <div class="form-group">
                        <label for="modifDLC">Date limite de consommation</label>
                        <input type="date" class="form-control" id="modifDLC"
                               aria-describedby="emailHelp"
                               placeholder="">
                        <small id="DLCError" class="form-text text-muted">Date déjà passée</small>
                    </div>
                    <div class="form-group">
                        <label for="modifNStock">Stock</label>
                        <input type="text" class="form-control" id="modifNStock" placeholder="Stock">
                        <small id="stockError" class="form-text text-muted">Entre 0 et 10</small>
                    </div>
                    <input type="hidden" class="form-control" id="productId" value="">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>