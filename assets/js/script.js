$(document).ready(function() {
    $(".result").on("click auxclick", function(e) {
        let id = $(this).attr("data-linkId");
        let url = $(this).attr("href");

        // if(!id) alert("data-linkId attribute not found...");

        increaseLinkClicks(id, url, e.type);

        return false;
    });
});

function increaseLinkClicks(linkId, url, type) {
    $.post("ajax/updateLinkCount.php", {linkId: linkId})
    .done(function(result) {
        if(result != "") {
            alert(result);
            return;
        }

        if(type == "click") window.location.href = url;
    });
}
