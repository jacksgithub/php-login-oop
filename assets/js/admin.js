document.addEventListener('DOMContentLoaded', () => {

   // Delete user
    let deleteBtns = document.querySelectorAll('.show-users-delete button');
    deleteBtns.forEach(btn =>
        btn.addEventListener('click', function(){
            const id = this.id.match(/username-([a-zA-Z0-9]+)$/)[1];
            if(id) {
                if(id === 'admin') {
                    const parent = document.querySelector(`#username-admin`).parentNode.parentNode;
                    parent.innerHTML = `<div class="text-center col-12 alert alert-danger mb-0">Cannot delete admin!</div>`;        
                } else {
                    modalHandlers(id);
                }
            }
        })
    );

    // Remove id (and img filename) of user to delete from modal delete btn once modal is closed
    document.getElementById('deleteUserModal').addEventListener('hidden.bs.modal', function (e) {
        document.querySelector('#delete-btn').removeAttribute('data-id');
        document.querySelector('#delete-btn').removeAttribute('data-img');
    });

    // Modal buttons event handlers
    function modalHandlers(id) {
        document.getElementById('modal-username').innerText = id;
       
        const dBtn = document.getElementById('delete-btn');
        // Set id
        dBtn.setAttribute('data-id', id);

        // Get img if there is one
        const userRow = document.getElementById(`username-${id}`).parentElement.parentElement;
        let img = userRow.querySelector('.show-users-img img');
        let imgFile = '';
        if (img) {
            const src = img.getAttribute('src');
            imgFile = src.slice(src.lastIndexOf('/')+1);
        }
        // Set img filename
        dBtn.setAttribute('data-img', imgFile);

        // Delete user & img if delete btn clicked
        dBtn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const imgFile = this.getAttribute('data-img');
            deleteUser(id, imgFile);
        });
    }

    function deleteUser(id, imgFile) {
        const url = `proc/admin/deleteUser.php?dId=${id}&img=${imgFile}`;

        // console.log(id +' '+ imgFile);
        fetch(url)
            .then(res => res.text())
            .then(text => {
                deleteUserFeedback(text);
            })
            .catch(err => console.log(`Error: ${err}`))
    }

    function deleteUserFeedback(text) {
        if (text === 'false') {
            const error = document.createElement(`<div class="feedback">Cannot delete user ${text}!</div>`);
            document.getElementById('feedback-container').append(error);
        } else {
            const prent = document.getElementById(`username-${text}`).parentElement.parentElement;
            prent.innerHTML = `<div class="text-center col-12 alert alert-warning mb-0"><b>${text}</b>&nbsp;deleted.</div>`;
        }
    }
});