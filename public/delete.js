// Confirm Record Delete
function deleteStaff( id ) {
    const answer = confirm("Confirm Delete Record");
    // If confirmed pass ID to delete.php
    if(answer) {
        window.location = 'delete.php?id=' + id;
    }
}