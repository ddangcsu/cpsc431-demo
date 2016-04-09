var main = function () {
    "use strict";

    // Function to handle event
    function handleDeleteEvent(event) {
        // Open modal
        var obj = event.currentTarget;
        var itemName = $(obj).siblings(".list-group-item-heading").text();
        var itemId = $(obj).attr("itemId");

        var $modal = $("#deleteConfirm");
        var $modal_body = $modal.find(".modal-body");
        var $deleteButton = $modal.find(".modal-footer").children("#delete");
        var $cancelButton = $modal.find(".modal-footer").children("#cancel");
        var $msg;

        // Build the dynamic message
        $modal_body.empty();
        $msg = $("<p>").text("Are you sure you want to delete " + itemName + " ?");
        $modal_body.append($msg);

        // Attach event trigger to Two buttons
        $deleteButton.on("click", function () {
            // Set the form to delete the Category
            var $form = $("#deleteForm");
            $form.find("#itemId").val(itemId);
            // Clear the modal
            $deleteButton.off();
            $cancelButton.off();
            $modal_body.empty();
            $modal.modal("hide");

            // Submit the form
            $form.submit();

        });

        $cancelButton.on("click", function () {
            $deleteButton.off();
            $cancelButton.off();
            $modal_body.empty();
            $modal.modal("hide");
        });

        // Display the modal
        $modal.modal("show");

        return false;
    }

    // Setup event handler when user click delete category
    $(".itemDelete").on("click", handleDeleteEvent);

    // Initialize the tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Inititalize CKEditor.  Replace textarea with CKEditor only if exists
    $('textarea#content').ckeditor();

    // Toggle the navigation button and change its class to active
    var path = location.pathname.split("/");
    if (path[2] === '' || path[2] === 'main') {
        $("#navHome").addClass("active");
    }else if (path[2] === 'tags') {
        $("#navTags").addClass("active");
    }else if (path[2] === 'categories') {
        $("#navCategories").addClass("active");
    }else if (path[2] === 'articles') {
        $("#navArticles").addClass("active");
    }

};

$(document).ready(main);
