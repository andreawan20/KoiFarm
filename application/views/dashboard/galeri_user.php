<div class="container-fluid">
    <div class="row">
        <? foreach ($koleksi as $kol) : ?>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $kol->nama_ikan; ?></h5>
                    <p class="card-text"><?php echo $kol->deskripsi; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        <? endforeach ?>
    </div>
</div>