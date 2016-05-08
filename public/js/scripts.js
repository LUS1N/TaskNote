var request;

$('#notesContent').on("click", ".editButton", function (event) {
    $row = $(this).parent().parent();
    $('.showNote', $row).hide();
    $('.editNote', $row).show();
    return false;
})

$('#notesContent').on("click", ".cancelEdit", function (event) {
    $row = $(this).parent().parent().parent();
    $('.showNote', $row).show();
    $('.editNote', $row).hide();
    return false;
})

$('#notesContent').on("click", ".remove_button", function (event) {
    RemoveNote(this); return false;
});

$('#notesContent').on("submit", ".editNoteForm", function (event) {
    $inputs = getInputs($(this));
    postNote($(this), $inputs);
    addNoteSuccessCallback();

    return false;
});


// action for submitting a note
$("#submitNote").submit(function (event) {

    // save inputs, so they can be disabled and enabled
    $inputs = getInputs($(this));
    postNote($(this), $inputs);
    addNoteSuccessCallback();
    addNoteFailCallback();
    addNoteAlwaysCallback($inputs);
    return false;
}
);

function getInputs($form) {
    return $form.find("input, button, textarea");
}

function addNoteSuccessCallback() {
    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
        addNewNoteToHtml(response);
    });
}

function addNoteFailCallback() {
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
}

function addNoteAlwaysCallback($inputs) {
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
        // clear fields
        $('#titleInput').val("");
        $('#contentInput').val("");
    });
}

function postNote($form, $inputs) {
    // http://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
    abortPendingRequest();

    // select and cache all the fields
    var serializedData = $form.serialize();
    // disable inputs
    $inputs.prop("disabled", true);
    prepareRequest(serializedData);
}

function addNewNoteToHtml(response) {
    note = $.parseJSON(response);
    // replace the old row with new
    removeRow(note.id);
    prependNewNote(note);
}

function prependNewNote(note) {
    template = $("#note_row_template").html();
    values = {
        'ID': note.id,
        'TITLE': note.title,
        'CONTENT': note.content
    };

    $("#notesContent").prepend(
        Mustache.render(template, values));
}

function RemoveNote(button) {

    postData = "action=delete&id=" + button.id;
    prepareRequest(postData);
    removeNoteSuccess(button);
    removeNoteFail();
}

function removeNoteFail() {
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // Log the error to the console
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
}
function removeNoteSuccess(button) {
    request.done(function (response, textStatus, jqXHR) {
        // remove from html 
        if (response == true)
            removeRow(button.id);
    });
}

function removeRow(id) {
    row = $("#row_" + id);
    if (row.length != 0)
        row.remove();
}
function prepareRequest(postData) {
    request = $.ajax({
        url: "actions.php",
        type: "post",
        data: postData
    });
}
function abortPendingRequest() {
    if (request) {
        request.abort();
    }
}

