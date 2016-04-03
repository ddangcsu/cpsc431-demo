var main = function () {
    "use strict";

    // Setup event handler when user click delete category
    $(".categoryDelete").on("click", function () {
        // Open modal
        var catName = $(this).siblings(".list-group-item-heading").text();
        var catId = $(this).attr("categoryId");

        var $modal = $("#deleteConfirm");
        var $modal_body = $modal.find(".modal-body");
        var $deleteButton = $modal.find(".modal-footer").children("#delete");
        var $cancelButton = $modal.find(".modal-footer").children("#cancel");
        var $msg;

        // Build the dynamic message
        $modal_body.empty();
        $msg = $("<p>").text("You selected to delete category " + catName);
        $modal_body.append($msg);
        $msg = $("<p>").text("Doing so will re-arrange all children categories to parent");
        $modal_body.append($msg);

        // Attach event trigger to Two buttons
        $deleteButton.on("click", function () {
            // Set the form to delete the Category
            var $form = $("#deleteForm");
            $form.find("input[name='categoryId']").val(catId);
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
    });
    // Initialize the tooltips
    $('[data-toggle="tooltip"]').tooltip();
};

$(document).ready(main);
