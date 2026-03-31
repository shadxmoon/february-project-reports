import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';

Alpine.plugin(mask);

window.Alpine = Alpine;

Alpine.start();

const selectElements = document.querySelectorAll('.status-form#status_id');

for (let elem in selectElements){
    elem.addEventListener('change', function() {this.form.submit()});
    console.log('js работает')
}

const btnDelete = document.getElementById('btn-delete');

btnDelete.addEventListener('click', function btnDeleteAction() {
    alert('Вы уверены, что хотите удалить это заявление?');
    this.form.submit;
    console.log('алерт вызвался)')
}) 

