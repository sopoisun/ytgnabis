<script>
$("#{{ isset($mainComponent) ? $mainComponent : 'name' }}").on('input', function(e) {
    $("#permalink").val(convertToSlug($(this).val()));
});

$("#{{ isset($mainComponent) ? $mainComponent : 'name' }}").blur(function() {
    $("#permalink").val(convertToSlug($(this).val()));
});

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

$("#permalink").dblclick(function() {
    var ori = $("#permalink").val();
    //var output = ori.substr(0, ori.lastIndexOf('.')) || ori; ==> bisa juga
    var output = ori.replace(/\.[^/.]+$/, ""); // ==> pake regex
    $("#permalink").val(output);
    $("#permalink").removeAttr("readonly");
});

$("#permalink").blur(function() {
    $("#permalink").val(convertToSlug($(this).val()));
    $("#permalink").attr("readonly", "readonly");
});

$("#permalink").on("keypress", function(e) {
    if (e.keyCode == 13) {
        $("#permalink").blur();
        return false;
    } else {
        return e.keyCode != 13;
    }
});

function convertToSlug(Text){
    return Text
        .toLowerCase()
            .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
}
</script>
