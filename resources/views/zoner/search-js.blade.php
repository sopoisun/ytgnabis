<script>
    $("#txtSearch").keypress(function(e){
        if(e.which == 13) {
            searchContent();
        }
    });

    $('#btnSearch').click(searchContent);

    function searchContent()
    {
        var txtSearch = $("#txtSearch").val();
        var urlSearch = $("#urlSearch").val();
        if( txtSearch != "" ){
            txtSearch = convertToSlug(txtSearch);
            window.location.href = "{{ url('/') }}/"+urlSearch+"?cari="+txtSearch;
        }
    }

    function convertToSlug(Text){
        return Text
            .toLowerCase()
                .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
    }
</script>
