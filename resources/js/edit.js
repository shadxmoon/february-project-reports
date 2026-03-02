'use strict'
document.addEventListener('DOMContentLoaded', function() {
    function openModal(id){
        fetch(`/reports/${id}/edit`)
            .then(res => res.text())
            .then(html => {
                document.querySelector('modalContent').innerHTML = html
                document.getElementById('modal').classList.remove('hidden')
            }
        )
    }
})
