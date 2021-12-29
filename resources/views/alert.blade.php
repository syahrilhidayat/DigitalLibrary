@if (session() ->has('success'))
        <div class="alert-sm alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> Data Berhasil Ditambahkan
        </div>
@endif

@if (session() ->has('update'))
        <div class="alert-sm alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> Data Berhasil Diupdate
        </div>
@endif

@if (session() ->has('delete'))
        <div class="alert-sm alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i> Data Berhasil Dihapus
        </div>
@endif

