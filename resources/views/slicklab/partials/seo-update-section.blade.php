<script>
$("#{{ isset($mainComponent) ? $mainComponent : 'name' }}").on("keypress", function(e) {
    if (e.keyCode == 13) {
        $("#site_title").focus();
        return false;
    } else {
        return e.keyCode != 13;
    }
});

$("#site_title").on("keypress", function(e) {
    if (e.keyCode == 13) {
        $("#description").focus();
        return false;
    } else {
        return e.keyCode != 13;
    }
});
</script>
