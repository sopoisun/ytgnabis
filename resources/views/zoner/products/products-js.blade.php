<script>
$("#sortby").change(function(){
    {{--*/
        $sortParams = $params;
        unset($sortParams['sort']);
        unset($sortParams['page']);
        $sortParams = ( !empty($sortParams) ? '&'.http_build_query($sortParams) : '' );
    /*--}} /**/
    window.location.href = "{{ url($permalink) }}?sort="+$(this).val()+"{!! $sortParams !!}";
});
</script>
