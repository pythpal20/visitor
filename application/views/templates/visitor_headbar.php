<div class="row border-bottom white-bg">
    <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">
        <?php
            if($lok == 'Joongla x Mr Kitchen') {
                $url = base_url('');
            } else if($lok == 'Showroom 75') {
                $url = base_url('showroom75');
            } else if($lok == 'Showroom 118') {
                $url = base_url('showroom118');
            }
        ?>
        <a href="<?= $url; ?>" class="navbar-brand"><?= $title; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-reorder"></i>
        </button>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav mr-auto">
                <li class="active">
                    <a aria-expanded="false" role="button" href="<?= $url ?>"><span class="fa fa-home"></span> Home</a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <button id="fullscreen-btn" class="btn btn-primary fullscreen" data-toggle="tootltip" title="Fullscreen Layar">
                        <i class="fa fa-light fa-expand"></i>
                    </button>
                    <button id="exit-fullscreen-btn" class="btn btn-info xfullscreen" data-toggle="tootltip" title="Fullscreen Layar">
                        <i class="fa fa-solid fa-down-left-and-up-right-to-center"></i>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>