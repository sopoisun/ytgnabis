<div class="search-box-wrapper">
    <div class="search-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="search-box map">
                        <form role="form" id="form-map" class="form-map form-search">
                            <h2>Cari Produk / Jasa</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtSearch"
                                    value="{{ isset($params) ? $params['q'] : '' }}"
                                        {!! isset($params) ? "readonly='readonly'" : '' !!}
                                            placeholder="Kata Kunci" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-default"
                                            {!! isset($params) ? "disabled='disabled'" : '' !!}
                                                id="btnSearch">Cari Sekarang</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-warning"
                                            {!! !isset($params) ? "disabled='disabled'" : '' !!}
                                                id="btnReset">Reset</button>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </div><!-- /.search-box.map -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.search-box-inner -->
</div>
