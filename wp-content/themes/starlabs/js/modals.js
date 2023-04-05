//Add new Question Modal
function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }
  
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  

//Delete question and answer  modal


// Delete Modal
function showModal() {
    document.getElementById("deleteModal").classList.remove("hidden");
}

function hideModal() {
    document.getElementById("deleteModal").classList.add("hidden");
}


let deleteButtons = document.querySelectorAll('.btn-delete');

for (var i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener('click', function(event) {
        var itemId = event.target.dataset.itemId;
        console.log("datasetId", itemId);
        var modal = document.querySelector('#deleteModal-' + itemId);
        modal.classList.remove('hidden');
    });
}


function hideModal(postId) {
    document.getElementById(`deleteModal-${postId}`).classList.add("hidden");
}


function deletePost() {

    hideModal();
}

