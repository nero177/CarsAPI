let modalState = false;

document.querySelector('.open-modal').addEventListener('click', (e) => {
    let modalId = e.target.getAttribute('data-modal-id');
    const modal = document.querySelector('.modal[data-modal-id="'+modalId+'"]');

    modal.classList.remove('hidden');
});

document.querySelector('.close-modal').addEventListener('click', (e) => {
    let modalId = e.target.getAttribute('data-modal-id');
    const modal = document.querySelector('.modal[data-modal-id="'+modalId+'"]');

    modal.classList.add('hidden');
});

let xlsLinkEl = document.getElementById('xlsLink');
let urlObject = new URL(window.location.href);
urlObject.href = urlObject.href.replace('?', 'api/cars?');
urlObject.searchParams.set('dataType', 'excel');
document.getElementById('xlsLink').setAttribute('href', decodeURI(urlObject.href))

